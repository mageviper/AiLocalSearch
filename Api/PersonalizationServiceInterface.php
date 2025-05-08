<?php
declare(strict_types=1);

namespace Mageviper\AiLocalSearch\Api;

use Magento\Catalog\Api\Data\ProductInterface;

// As UserContext is not defined yet, we'll comment it out or use a placeholder.
// For now, let's assume it might be a more complex object later.
// interface UserContextInterface {}

interface PersonalizationServiceInterface
{
    /**
     * Find products based on a semantic query.
     *
     * @param string $queryText
     * @param int $limit
     * @param array $filters
     * @return array Returns an array of product IDs or hydrated product objects.
     */
    public function findProductsBySemanticQuery(string $queryText, int $limit, array $filters = []): array;

    /**
     * Get semantically related products for a given product.
     *
     * @param ProductInterface $product
     * @param int $limit
     * @param array $filters
     * @return array
     */
    public function getSemanticallyRelatedProducts(ProductInterface $product, int $limit, array $filters = []): array;

    /**
     * Generate a personalized product description.
     *
     * @param ProductInterface $product
     * @param mixed|null $userContext 
     * @return string
     */
    public function generatePersonalizedProductDescription(ProductInterface $product, $userContext = null): string;

    /**
     * Answer a product-specific question.
     *
     * @param ProductInterface $product
     * @param string $question
     * @return string
     */
    public function answerProductQuestion(ProductInterface $product, string $question): string;
}