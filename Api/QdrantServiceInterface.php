<?php
declare(strict_types=1);

namespace Mageviper\AiLocalSearch\Api;

interface QdrantServiceInterface
{
    /**
     * Ensure a Qdrant collection exists.
     *
     * @param string $collectionName
     * @param int $vectorSize
     * @param string $distanceMetric
     * @return bool
     */
    public function ensureCollectionExists(string $collectionName, int $vectorSize, string $distanceMetric): bool;

    /**
     * Upsert points into a Qdrant collection.
     *
     * @param string $collectionName
     * @param array $points
     * @return bool
     */
    public function upsertPoints(string $collectionName, array $points): bool;

    /**
     * Search for points in a Qdrant collection.
     *
     * @param string $collectionName
     * @param array $vector
     * @param int $limit
     * @param array $filter
     * @param float|null $scoreThreshold
     * @return array
     */
    public function searchPoints(string $collectionName, array $vector, int $limit, array $filter = [], ?float $scoreThreshold = null): array;

    /**
     * Delete points from a Qdrant collection.
     *
     * @param string $collectionName
     * @param array $pointIds
     * @return bool
     */
    public function deletePoints(string $collectionName, array $pointIds): bool;

    /**
     * Get a specific point from a Qdrant collection.
     *
     * @param string $collectionName
     * @param int|string $pointId
     * @return array|null
     */
    public function getPoint(string $collectionName, $pointId): ?array;
}