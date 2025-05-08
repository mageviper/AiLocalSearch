<?php
declare(strict_types=1);

namespace Mageviper\AiLocalSearch\Api;

/**
 * Interface EmbeddingServiceInterface
 *
 * Defines the contract for a service that generates embeddings for text.
 * This service will use a configured strategy (e.g., Ollama, external microservice)
 * to perform the actual embedding generation.
 * @api
 */
interface EmbeddingServiceInterface
{
    /**
     * Generates an embedding vector for the given text using the configured strategy.
     *
     * @param string $text The text to generate embeddings for.
     * @param string|null $modelName The specific model to use (optional, strategy-dependent).
     * @return float[] An array of floats representing the embedding vector.
     * @throws \Exception If an error occurs during embedding generation.
     */
    public function generateTextEmbedding(string $text, ?string $modelName = null): array;
}