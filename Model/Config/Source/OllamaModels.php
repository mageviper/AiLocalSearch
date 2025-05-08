<?php

declare(strict_types=1);

namespace Mageviper\AiLocalSearch\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Mageviper\AiLocalSearch\Api\OllamaServiceInterface;
use Psr\Log\LoggerInterface;

class OllamaModels implements OptionSourceInterface
{
    private OllamaServiceInterface $ollamaService;
    private LoggerInterface $logger;

    public function __construct(
        OllamaServiceInterface $ollamaService,
        LoggerInterface $logger
    ) {
        $this->ollamaService = $ollamaService;
        $this->logger = $logger;
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function toOptionArray(): array
    {
        $options = [];
        try {
            $modelsAv = $this->ollamaService->getAvailableModels();
            
            foreach ($modelsAv as $modelsAv) {
                foreach ($modelsAv as $model) {
                    if (isset($model['name'])) {
                        $options[] = ['value' => $model['name'], 'label' => $model['name']];
                    }
                }
                // Assuming the model data structure has a 'name' key
                // Adjust if the structure from ardagnsrn/ollama-php is different
                
            }
        } catch (\Exception $e) {
            $this->logger->error('Error fetching Ollama models for admin config: ' . $e->getMessage());
            // Provide a default or empty option in case of an error
            $options[] = ['value' => '', 'label' => __('Could not retrieve models')];
        }

        if (empty($options)) {
            $options[] = ['value' => '', 'label' => __('No models available or error fetching models')];
        }

        return $options;
    }
}