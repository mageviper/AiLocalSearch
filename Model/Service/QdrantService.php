<?php
declare(strict_types=1);

namespace Mageviper\AiLocalSearch\Model\Service;

use Mageviper\AiLocalSearch\Api\QdrantServiceInterface;
use Mageviper\AiLocalSearch\Model\Adapter\Qdrant\ClientAdapterInterface as QdrantClientAdapterInterface;
use Psr\Log\LoggerInterface;

class QdrantService implements QdrantServiceInterface
{
    private QdrantClientAdapterInterface $qdrantClientAdapter;
    private LoggerInterface $logger;

    /**
     * @param QdrantClientAdapterInterface $qdrantClientAdapter
     * @param LoggerInterface $logger
     */
    public function __construct(
        QdrantClientAdapterInterface $qdrantClientAdapter,
        LoggerInterface $logger
    ) {
        $this->qdrantClientAdapter = $qdrantClientAdapter;
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function ensureCollectionExists(string $collectionName, int $vectorSize, string $distanceMetric): bool
    {
        $this->logger->info('QdrantService: ensureCollectionExists called', ['collectionName' => $collectionName]);
        // try {
        //     if (!$this->qdrantClientAdapter->collectionExists($collectionName)) {
        //         return $this->qdrantClientAdapter->createCollection($collectionName, $vectorSize, $distanceMetric);
        //     }
        //     return true;
        // } catch (\Exception $e) {
        //     $this->logger->error('Qdrant API error ensuring collection exists: ' . $e->getMessage());
        //     return false;
        // }
        throw new \LogicException(__METHOD__ . ' not implemented yet.');
    }

    /**
     * {@inheritdoc}
     */
    public function upsertPoints(string $collectionName, array $points): bool
    {
        $this->logger->info('QdrantService: upsertPoints called', ['collectionName' => $collectionName, 'point_count' => count($points)]);
        // try {
        //     return $this->qdrantClientAdapter->upsertPoints($collectionName, $points);
        // } catch (\Exception $e) {
        //     $this->logger->error('Qdrant API error upserting points: ' . $e->getMessage());
        //     return false;
        // }
        throw new \LogicException(__METHOD__ . ' not implemented yet.');
    }

    /**
     * {@inheritdoc}
     */
    public function searchPoints(string $collectionName, array $vector, int $limit, array $filter = [], ?float $scoreThreshold = null): array
    {
        $this->logger->info('QdrantService: searchPoints called', ['collectionName' => $collectionName, 'limit' => $limit]);
        // try {
        //     return $this->qdrantClientAdapter->searchPoints($collectionName, $vector, $limit, $filter, $scoreThreshold);
        // } catch (\Exception $e) {
        //     $this->logger->error('Qdrant API error searching points: ' . $e->getMessage());
        //     return [];
        // }
        throw new \LogicException(__METHOD__ . ' not implemented yet.');
    }

    /**
     * {@inheritdoc}
     */
    public function deletePoints(string $collectionName, array $pointIds): bool
    {
        $this->logger->info('QdrantService: deletePoints called', ['collectionName' => $collectionName, 'ids_count' => count($pointIds)]);
        // try {
        //     return $this->qdrantClientAdapter->deletePoints($collectionName, $pointIds);
        // } catch (\Exception $e) {
        //     $this->logger->error('Qdrant API error deleting points: ' . $e->getMessage());
        //     return false;
        // }
        throw new \LogicException(__METHOD__ . ' not implemented yet.');
    }

    /**
     * {@inheritdoc}
     */
    public function getPoint(string $collectionName, $pointId): ?array
    {
        $this->logger->info('QdrantService: getPoint called', ['collectionName' => $collectionName, 'pointId' => $pointId]);
        // try {
        //     return $this->qdrantClientAdapter->getPoint($collectionName, $pointId);
        // } catch (\Exception $e) {
        //     $this->logger->error('Qdrant API error getting point: ' . $e->getMessage());
        //     return null;
        // }
        throw new \LogicException(__METHOD__ . ' not implemented yet.');
    }
}