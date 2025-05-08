<?php
declare(strict_types=1);

namespace Mageviper\AiLocalSearch\Api;

interface OllamaServiceInterface
{
    /**
     * Get available LLM models from Ollama.
     *
     * @return array<int, array<string, mixed>>
     * @throws \Exception
     */
    public function getAvailableModels(): array;
    /**
     * Generate text using Ollama.
     *
     * @param string $prompt
     * @param array $modelOptions
     * @param string|null $modelName
     * @return string
     */
    public function generateText(string $prompt, array $modelOptions = [], ?string $modelName = null): string;

    /**
     * Get embeddings for text using Ollama.
     *
     * @param string $textToEmbed
     * @param string|null $modelName
     * @return array
     */
    public function getEmbeddings(string $textToEmbed, ?string $modelName = null): array;

    /**
     * List local Ollama models.
     *
     * @return array
     */
    public function listLocalModels(): array;

    /**
     * Check if a specific Ollama model is available.
     *
     * @param string $modelName
     * @return bool
     */
    public function checkModelAvailability(string $modelName): bool;
}