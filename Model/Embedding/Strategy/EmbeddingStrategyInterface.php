<?php
declare(strict_types=1);

namespace Mageviper\AiLocalSearch\Model\Embedding\Strategy;

interface EmbeddingStrategyInterface
{
    /**
     * Generate an embedding for the given text using a specific strategy.
     *
     * @param string $text
     * @return array
     */
    public function generateEmbedding(string $text): array;
}