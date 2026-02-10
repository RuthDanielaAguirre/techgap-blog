<?php

namespace App\Traits;

use App\Services\RAGService;
use Illuminate\Database\Eloquent\Collection;

/**
 * SearchableContent Trait
 * 
 * Makes models searchable using RAG functionality
 */
trait SearchableContent
{
    /**
     * Get related content using RAG service
     *
     * @param int $limit Maximum number of related items
     * @return Collection Related content
     */
    public function getRelatedContent(int $limit = 6): Collection
    {
        $ragService = app(RAGService::class);
        return $ragService->getRelatedPosts($this, $limit);
    }

    /**
     * Check if model has searchable content
     *
     * @return bool
     */
    public function hasSearchableContent(): bool
    {
        return !empty($this->title) || !empty($this->content);
    }

    /**
     * Get searchable text for indexing
     *
     * @return string Combined searchable text
     */
    public function getSearchableText(): string
    {
        $searchableFields = $this->getSearchableFields();
        $text = '';
        
        foreach ($searchableFields as $field) {
            if (isset($this->$field)) {
                $text .= ' ' . strip_tags($this->$field);
            }
        }
        
        return trim($text);
    }

    /**
     * Get fields that should be included in search
     *
     * @return array Searchable fields
     */
    protected function getSearchableFields(): array
    {
        return ['title', 'content', 'excerpt'];
    }
}