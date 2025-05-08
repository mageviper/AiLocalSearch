<?php

declare(strict_types=1);

namespace Mageviper\AiLocalSearch\Model\Service;

use Mageviper\AiLocalSearch\Api\OllamaServiceInterface;
use Mageviper\AiLocalSearch\Model\Adapter\Http\ClientAdapterInterface;
use Psr\Log\LoggerInterface;
use SebastianBergmann\CodeCoverage\Driver\Xdebug2Driver;

class OllamaService implements OllamaServiceInterface
{
    private ClientAdapterInterface $httpClientAdapter;
    private \Mageviper\AiLocalSearch\Model\Config\OllamaConfig $config;
    private LoggerInterface $logger;

    /**
     * @param ClientAdapterInterface $httpClientAdapter
     * @param LoggerInterface $logger
     */
    public function __construct(
        ClientAdapterInterface $httpClientAdapter,
        \Mageviper\AiLocalSearch\Model\Config\OllamaConfig $config,
        LoggerInterface $logger
    ) {
        $this->httpClientAdapter = $httpClientAdapter;
        $this->config = $config;
        $this->logger = $logger;
    }


    private function ollamaClientCreate(): \ArdaGnsrn\Ollama\Ollama
    {
        $this->logger->info('OllamaService: ollamaClientCreate called');
        $apiEndpoint = (string) $this->config->getApiEndpoint();
        $client = \ArdaGnsrn\Ollama\Ollama::client($apiEndpoint);
        return $client;
    }

    public function getAvailableModels(): array
    {
        $this->logger->info('OllamaService: getAvailableModels called');
        $client = $this->ollamaClientCreate();
        $models = $client->models()->list()->toArray();
        return $models;
    }

    /**
     * {@inheritdoc}
     */
    public function generateText(string $prompt, array $modelOptions = [], ?string $modelName = null): string
    {
        // TODO: Implement Ollama API call for text generation
        // Consider configuration for endpoint, default model, timeout
        $this->logger->info('OllamaService: generateText called', ['prompt' => $prompt, 'modelName' => $modelName]);
        // Example structure for API call:
        // $endpoint = $this->config->getOllamaEndpoint() . '/api/generate';
        // $payload = ['model' => $modelName ?? $this->config->getDefaultOllamaModel(), 'prompt' => $prompt, 'stream' => false];
        // $payload = array_merge($payload, $modelOptions);
        // try {
        //     $response = $this->httpClientAdapter->post($endpoint, ['json' => $payload]);
        //     $data = json_decode((string)$response->getBody(), true);
        //     return $data['response'] ?? '';
        // } catch (\Exception $e) {
        //     $this->logger->error('Ollama API error during text generation: ' . $e->getMessage());
        //     return ''; // Or throw a custom exception
        // }
        throw new \LogicException(__METHOD__ . ' not implemented yet.');
    }

    /**
     * {@inheritdoc}
     */
    public function getEmbeddings(string $textToEmbed, ?string $modelName = null): array
    {
        // TODO: Implement Ollama API call for embeddings
        $this->logger->info('OllamaService: getEmbeddings called', ['text' => $textToEmbed, 'modelName' => $modelName]);
        // Example structure for API call:
        // $endpoint = $this->config->getOllamaEndpoint() . '/api/embeddings';
        // $payload = ['model' => $modelName ?? $this->config->getDefaultOllamaEmbeddingModel(), 'prompt' => $textToEmbed];
        // try {
        //     $response = $this->httpClientAdapter->post($endpoint, ['json' => $payload]);
        //     $data = json_decode((string)$response->getBody(), true);
        //     return $data['embedding'] ?? [];
        // } catch (\Exception $e) {
        //     $this->logger->error('Ollama API error during embedding generation: ' . $e->getMessage());
        //     return []; // Or throw a custom exception
        // }
        throw new \LogicException(__METHOD__ . ' not implemented yet.');
    }

    /**
     * {@inheritdoc}
     */
    public function listLocalModels(): array
    {
        // TODO: Implement Ollama API call to list local models
        $this->logger->info('OllamaService: listLocalModels called');
        // Example structure for API call:
        // $endpoint = $this->config->getOllamaEndpoint() . '/api/tags';
        // try {
        //     $response = $this->httpClientAdapter->get($endpoint);
        //     $data = json_decode((string)$response->getBody(), true);
        //     return $data['models'] ?? [];
        // } catch (\Exception $e) {
        //     $this->logger->error('Ollama API error listing local models: ' . $e->getMessage());
        //     return [];
        // }
        throw new \LogicException(__METHOD__ . ' not implemented yet.');
    }

    /**
     * {@inheritdoc}
     */
    public function checkModelAvailability(string $modelName): bool
    {
        // TODO: Implement logic to check model availability, possibly using listLocalModels
        $this->logger->info('OllamaService: checkModelAvailability called', ['modelName' => $modelName]);
        // Example:
        // $models = $this->listLocalModels();
        // foreach ($models as $model) {
        //     if ($model['name'] === $modelName || strpos($model['name'], $modelName . ':') === 0) {
        //         return true;
        //     }
        // }
        // return false;
        throw new \LogicException(__METHOD__ . ' not implemented yet.');
    }
}
