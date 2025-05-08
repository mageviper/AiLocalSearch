<?php
declare(strict_types=1);

namespace Mageviper\AiLocalSearch\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class DistanceMetric implements OptionSourceInterface
{
    /**
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'Cosine', 'label' => __('Cosine')],
            ['value' => 'Dot', 'label' => __('Dot Product')],
            ['value' => 'Euclid', 'label' => __('Euclidean')]
        ];
    }
}