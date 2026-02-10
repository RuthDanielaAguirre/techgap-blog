<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Facades\DB;

/**
 * RAG (Retrieval-Augmented Generation) Service
 * 
 * Implements semantic search and content retrieval for related posts
 * using MySQL full-text search with custom relevance scoring.
 */
class RAGService
{
    /**
     * Minimum relevance score for related content
     */
    private const MIN_RELEVANCE_SCORE = 0.1;
    
    /**
     * Maximum number of related posts to return
     */
    private const MAX_RELATED_POSTS = 6;

    /**
     * Find related posts using RAG methodology
     *
     * @param Post $post The source post to find related content for
     * @param int $limit Maximum number of related posts to return
     * @return Collection Related posts ranked by relevance
     */
    public function getRelatedPosts(Post $post, int $limit = self::MAX_RELATED_POSTS): Collection
    {
        // Combine multiple search strategies for better results
        $semanticResults = $this->semanticSearch($post);
        $categoryResults = $this->categoryBasedSearch($post);
        $tagResults = $this->tagBasedSearch($post);
        
        // Merge and score all results
        $allResults = collect([
            ...$semanticResults,
            ...$categoryResults,
            ...$tagResults
        ]);
        
        // Remove duplicates and exclude source post
        $uniqueResults = $allResults
            ->unique('id')
            ->reject(fn($relatedPost) => $relatedPost->id === $post->id)
            ->sortByDesc('relevance_score')
            ->take($limit);
            
        return $uniqueResults;
    }

    /**
     * Semantic search using full-text matching
     *
     * @param Post $post Source post
     * @return EloquentCollection Posts with semantic similarity
     */
    private function semanticSearch(Post $post): EloquentCollection
    {
        // Extract keywords from title and content
        $searchTerms = $this->extractKeywords($post->title . ' ' . strip_tags($post->content));
        
        if (empty($searchTerms)) {
            return collect();
        }
        
        $searchQuery = implode(' ', $searchTerms);
        
        $results = Post::whereRaw('MATCH(title, content, excerpt) AGAINST(? IN BOOLEAN MODE)', [$searchQuery])
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->with(['user', 'category', 'tags']) // Cargar relaciones necesarias
            ->select([
                '*',
                DB::raw('MATCH(title, content, excerpt) AGAINST("' . addslashes($searchQuery) . '") as relevance_score')
            ])
            ->having('relevance_score', '>', self::MIN_RELEVANCE_SCORE)
            ->orderBy('relevance_score', 'desc')
            ->limit(self::MAX_RELATED_POSTS)
            ->get();
            
        return $results;
    }

    /**
     * Category-based content retrieval
     *
     * @param Post $post Source post
     * @return EloquentCollection Posts from same category
     */
    private function categoryBasedSearch(Post $post): EloquentCollection
    {
        if (!$post->category_id) {
            return new EloquentCollection();
        }
        
        $results = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->with(['user', 'category', 'tags']) // Cargar relaciones necesarias
            ->latest()
            ->limit(4)
            ->get();
            
        // Add category-based relevance score
        $results->each(function ($relatedPost) {
            $relatedPost->relevance_score = 0.7; // High relevance for same category
        });
        
        return $results;
    }

    /**
     * Tag-based content retrieval
     *
     * @param Post $post Source post
     * @return EloquentCollection Posts with shared tags
     */
    private function tagBasedSearch(Post $post): EloquentCollection
    {
        $postTags = $post->tags->pluck('id')->toArray();
        
        if (empty($postTags)) {
            return new EloquentCollection();
        }
        
        $results = Post::whereHas('tags', function ($query) use ($postTags) {
                $query->whereIn('tag_id', $postTags);
            })
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->with(['user', 'category', 'tags']) // Cargar relaciones necesarias
            ->withCount(['tags' => function ($query) use ($postTags) {
                $query->whereIn('tag_id', $postTags);
            }])
            ->orderBy('tags_count', 'desc')
            ->limit(4)
            ->get();
            
        // Calculate tag-based relevance score
        $results->each(function ($relatedPost) use ($postTags) {
            $sharedTagsCount = $relatedPost->tags_count;
            $totalTagsCount = count($postTags);
            $relatedPost->relevance_score = $sharedTagsCount / max($totalTagsCount, 1) * 0.6;
        });
        
        return $results;
    }

    /**
     * Extract meaningful keywords from text
     *
     * @param string $text Input text
     * @return array Keywords
     */
    private function extractKeywords(string $text): array
    {
        // Remove common Spanish stop words
        $stopWords = [
            'el', 'la', 'de', 'que', 'y', 'a', 'en', 'un', 'es', 'se', 'no', 'te', 'lo', 'le',
            'da', 'su', 'por', 'son', 'con', 'para', 'del', 'las', 'al', 'una', 'como', 'si',
            'ya', 'todo', 'está', 'más', 'muy', 'pero', 'sin', 'sobre', 'ser', 'tener', 'puede'
        ];
        
        // Clean and tokenize text
        $text = strtolower($text);
        $text = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $text);
        $words = array_filter(explode(' ', $text), fn($word) => strlen($word) > 3);
        
        // Remove stop words
        $keywords = array_diff($words, $stopWords);
        
        // Return unique keywords
        return array_unique(array_slice($keywords, 0, 10));
    }

    /**
     * Search posts by query string (for API/frontend)
     *
     * @param string $query Search query
     * @param int $limit Results limit
     * @return EloquentCollection Matching posts
     */
    public function searchPosts(string $query, int $limit = 10): EloquentCollection
    {
        $searchTerms = $this->extractKeywords($query);
        
        if (empty($searchTerms)) {
            return new EloquentCollection();
        }
        
        $searchQuery = implode(' ', array_map(fn($term) => "+{$term}*", $searchTerms));
        
        return Post::whereRaw('MATCH(title, content, excerpt) AGAINST(? IN BOOLEAN MODE)', [$searchQuery])
            ->where('status', 'published')
            ->with(['category', 'tags', 'user']) // Cambiar 'author' por 'user'
            ->select([
                '*',
                DB::raw('MATCH(title, content, excerpt) AGAINST("' . addslashes($searchQuery) . '") as relevance_score')
            ])
            ->orderBy('relevance_score', 'desc')
            ->limit($limit)
            ->get();
    }
}