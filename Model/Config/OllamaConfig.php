<?php
declare(strict_types=1);

namespace Mageviper\AiLocalSearch\Model\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class OllamaConfig
{
    private const XML_PATH_OLLAMA_API_ENDPOINT = 'ailocalsearch/ollama_service/api_endpoint';
    private const XML_PATH_OLLAMA_DEFAULT_MODEL = 'ailocalsearch/ollama_service/default_model';
    private const XML_PATH_OLLAMA_REQUEST_TIMEOUT = 'ailocalsearch/ollama_service/request_timeout';

    private ScopeConfigInterface $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function getApiEndpoint(?int $storeId = null): ?string
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_OLLAMA_API_ENDPOINT,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    public function getDefaultModel(?int $storeId = null): ?string
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_OLLAMA_DEFAULT_MODEL,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    public function getRequestTimeout(?int $storeId = null): ?int
    {
        $timeout = $this->scopeConfig->getValue(
            self::XML_PATH_OLLAMA_REQUEST_TIMEOUT,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
        return $timeout ? (int)$timeout : null;
    }
}