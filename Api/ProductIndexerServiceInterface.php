<?php
declare(strict_types=1);

namespace Mageviper\AiLocalSearch\Api;

use Magento\Catalog\Api\Data\ProductInterface;

interface ProductIndexerServiceInterface
{
    /**
     * Index a single product.
     *
     * @param ProductInterface $product
     * @return bool
     */
    public function indexProduct(ProductInterface $product): bool;

    /**
     * Delete a product from the index.
     *
     * @param int|string $productId
     * @return bool
     */
    public function deleteProductFromIndex($productId): bool;
}