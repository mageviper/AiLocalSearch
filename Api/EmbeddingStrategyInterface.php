<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mageviper\AiLocalSearch\Api;

/**
 * Interface EmbeddingStrategyInterface
 *
 * Defines the contract for generating embeddings from text.
 * @api
 */
interface EmbeddingStrategyInterface
{
    /**
     * Generates embeddings for the given text using a specific model.
     *
     * @param string $text The text to generate embeddings for.
     * @param string|null $modelName The specific model to use for embedding generation (optional).
     * @return float[] An array of floats representing the embedding vector.
     * @throws \Exception If an error occurs during embedding generation.
     */
    public function generateEmbeddings(string $text, ?string $modelName = null): array;
}