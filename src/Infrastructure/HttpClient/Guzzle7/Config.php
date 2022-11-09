<?php

namespace Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\Guzzle7;

use Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\ConfigInterface;

class Config implements ConfigInterface
{
    /**
     * {@inheritdoc}
     */
    public static function fixConfig(array $config): array
    {
        if (isset($config['defaults'])) {
            if (isset($config['defaults']['timeout'])) {
                $config['timeout'] = $config['defaults']['timeout'];
            }

            if (isset($config['defaults']['exceptions'])) {
                $config['http_errors'] = $config['defaults']['exceptions'];
            }

            if (isset($config['defaults']['headers'])) {
                $config['headers'] = $config['defaults']['headers'];
            }

            if (isset($config['defaults']['query'])) {
                $config['query'] = $config['defaults']['query'];
            }

            unset($config['defaults']);
        }

        if (isset($config['base_url'])) {
            $config['base_uri'] = $config['base_url'];

            unset($config['base_url']);
        }

        return $config;
    }
}
