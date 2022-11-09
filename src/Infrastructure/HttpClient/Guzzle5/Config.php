<?php

namespace Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\Guzzle5;

use Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\ConfigInterface;

class Config implements ConfigInterface
{
    /**
     * {@inheritdoc}
     */
    public static function fixConfig(array $config): array
    {
        if (isset($config['timeout'])) {
            $config['defaults']['timeout'] = $config['timeout'];
            unset($config['timeout']);
        }

        if (isset($config['headers'])) {
            $config['defaults']['headers'] = $config['headers'];
            unset($config['headers']);
        }

        if (isset($config['http_errors'])) {
            $config['defaults']['exceptions'] = $config['http_errors'];
            unset($config['http_errors']);
        }

        if (isset($config['query'])) {
            $config['defaults']['query'] = $config['query'];

            unset($config['query']);
        }

        if (isset($config['base_uri'])) {
            $config['base_url'] = $config['base_uri'];

            unset($config['base_uri']);
        }

        return $config;
    }
}
