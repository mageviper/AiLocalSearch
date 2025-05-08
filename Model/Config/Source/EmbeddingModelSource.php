<?php
declare(strict_types=1);

namespace Mageviper\AiLocalSearch\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class EmbeddingModelSource implements OptionSourceInterface
{
    /**
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'ollama', 'label' => __('Ollama')],
            ['value' => 'external', 'label' => __('External Microservice')]
        ];
    }
}