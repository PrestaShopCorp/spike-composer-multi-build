<?php

namespace Sbidault\ComposerMultiBuild\Infrastructure\HttpClient;

use Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\Guzzle7\Client as Guzzle7Client;
use Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\Guzzle7\Config as Guzzle7Config;
use Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\Guzzle5\Client as Guzzle5Client;
use Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\Guzzle5\Config as Guzzle5Config;

class ClientFactory
{
    /**
     * @var \Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\VersionDetection
     */
    private $versionDetection;

    public function __construct(VersionDetection $versionDetection = null)
    {
        $this->versionDetection = $versionDetection ?: new VersionDetection();
    }

    /**
     * @param array<string, mixed> $config
     *
     * @return \Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\HttpClientInterface
     */
    public function getClient(array $config = [])
    {
        return $this->initClient($config);
    }

    /**
     * @param array<string, mixed> $config
     *
     * @return \Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\HttpClientInterface
     */
    private function initClient(array $config = [])
    {
        if ($this->versionDetection->getGuzzleMajorVersionNumber() >= 7) {
            return Guzzle7Client::createWithConfig(
                Guzzle7Config::fixConfig($config)
            );
        }

        return Guzzle5Client::createWithConfig(
            Guzzle5Config::fixConfig($config)
        );
    }
}
