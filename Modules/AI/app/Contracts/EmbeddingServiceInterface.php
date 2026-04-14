<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\AI\Contracts;

use Illuminate\Support\Collection;
use Modules\AI\Models\KnowledgeChunk;

interface EmbeddingServiceInterface
{
    public function embed(string $text): array;

    public function embedBatch(array $texts): array;

    public function cosineSimilarity(array $a, array $b): float;

    /**
     * @return Collection<int, array{chunk: KnowledgeChunk, similarity: float}>
     */
    public function findSimilar(array $queryEmbedding, int $limit = 5, ?int $tenantId = null): Collection;

    /**
     * @return Collection<int, KnowledgeChunk>
     */
    public function findSimilarFulltext(string $query, int $limit = 5, ?int $tenantId = null): Collection;
}
