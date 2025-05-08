<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Mageviper\AiLocalSearch\Model\Service;

use Mageviper\AiLocalSearch\Api\EmbeddingServiceInterface;
use Mageviper\AiLocalSearch\Api\EmbeddingStrategyInterface;
use Psr\Log\LoggerInterface;

/**
 * Class EmbeddingService
 *
 * Service responsible for generating text embeddings using a configured strategy.
 */
class EmbeddingService implements EmbeddingServiceInterface
{
    private EmbeddingStrategyInterface $embeddingStrategy;
    private LoggerInterface $logger;

    /**
     * @param EmbeddingStrategyInterface $embeddingStrategy
     * @param LoggerInterface $logger
     */
    public function __construct(
        EmbeddingStrategyInterface $embeddingStrategy,
        LoggerInterface $logger
    ) {
        $this->embeddingStrategy = $embeddingStrategy;
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function generateTextEmbedding(string $text, ?string $modelName = null): array
    {
        try {
            return $this->embeddingStrategy->generateEmbeddings($text, $modelName);
        } catch (\Exception $e) {
            $this->logger->error(
                '[EmbeddingService] Error generating text embedding: ' . $e->getMessage(),
                ['text' => $text, 'modelName' => $modelName, 'exception' => $e]
            );
            // Depending on the desired behavior, re-throw or return a default.
            // For now, returning an empty array to prevent breaking the flow.
            return [];
        }
    }
}