<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mageviper\AiLocalSearch\Model\Service\Strategy\Embedding;

use Mageviper\AiLocalSearch\Api\EmbeddingStrategyInterface;
use Mageviper\AiLocalSearch\Api\OllamaServiceInterface;
use Psr\Log\LoggerInterface;

/**
 * Class OllamaEmbeddingStrategy
 *
 * Generates embeddings using the Ollama service.
 */
class OllamaEmbeddingStrategy implements EmbeddingStrategyInterface
{
    private OllamaServiceInterface $ollamaService;
    private LoggerInterface $logger;

    /**
     * @param OllamaServiceInterface $ollamaService
     * @param LoggerInterface $logger
     */
    public function __construct(
        OllamaServiceInterface $ollamaService,
        LoggerInterface $logger
    ) {
        $this->ollamaService = $ollamaService;
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function generateEmbeddings(string $text, ?string $modelName = null): array
    {
        try {
            return $this->ollamaService->getEmbeddings($text, $modelName);
        } catch (\Exception $e) {
            $this->logger->error(
                '[OllamaEmbeddingStrategy] Error generating embeddings: ' . $e->getMessage(),
                ['text' => $text, 'modelName' => $modelName, 'exception' => $e]
            );
            // Depending on the desired behavior, you might re-throw the exception,
            // return an empty array, or a specific error indicator.
            // For now, returning an empty array to prevent breaking the flow.
            return [];
        }
    }
}