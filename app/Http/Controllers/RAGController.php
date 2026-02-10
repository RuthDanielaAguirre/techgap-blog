<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\RAGService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RAGController extends Controller
{
    public function __construct(
        private RAGService $ragService
    ) {}

    /**
     * Get related posts for a specific post
     * 
     * @param Post $post
     * @param Request $request
     * @return JsonResponse
     */
    public function getRelatedPosts(Post $post, Request $request): JsonResponse
    {
        // Validar parámetros
        $request->validate([
            'limit' => 'integer|min:1|max:10'
        ]);
        
        $limit = $request->get('limit', 6);
        
        // Cache para mejor performance (senior thinking!)
        $cacheKey = "related_posts_{$post->id}_{$limit}";
        
        $relatedPosts = Cache::remember($cacheKey, 3600, function () use ($post, $limit) {
            return $this->ragService->getRelatedPosts($post, $limit);
        });
        
        return response()->json([
            'success' => true,
            'data' => [
                'source_post' => [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug
                ],
                'related_posts' => $relatedPosts->map(fn($post) => [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'excerpt' => $post->excerpt,
                    'category' => $post->category->name ?? null,
                    'relevance_score' => round($post->relevance_score ?? 0, 3),
                    'published_at' => $post->published_at?->format('Y-m-d H:i:s')
                ]),
                'count' => $relatedPosts->count()
            ]
        ]);
    }

    /**
     * Search posts using RAG methodology
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function searchPosts(Request $request): JsonResponse
    {
        // Validación estricta (senior practice)
        $request->validate([
            'q' => 'required|string|min:3|max:100',
            'limit' => 'integer|min:1|max:20'
        ]);
        
        $query = $request->get('q');
        $limit = $request->get('limit', 10);
        
        // Cache búsquedas populares
        $cacheKey = "search_" . md5($query) . "_{$limit}";
        
        $results = Cache::remember($cacheKey, 1800, function () use ($query, $limit) {
            return $this->ragService->searchPosts($query, $limit);
        });
        
        return response()->json([
            'success' => true,
            'data' => [
                'query' => $query,
                'results' => $results->map(fn($post) => [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'excerpt' => $post->excerpt,
                    'category' => $post->category->name ?? null,
                    'tags' => $post->tags->pluck('name')->toArray(),
                    'author' => $post->user->name ?? null,
                    'relevance_score' => round($post->relevance_score ?? 0, 3),
                    'published_at' => $post->published_at?->format('Y-m-d H:i:s')
                ]),
                'count' => $results->count(),
                'cached' => Cache::has($cacheKey)
            ]
        ]);
    }
}
