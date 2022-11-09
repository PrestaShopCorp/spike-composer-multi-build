<?php

namespace Sbidault\ComposerMultiBuild\Infrastructure\App;

use Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\HttpClient;

abstract class App implements AppInterface
{
    /**
     * Application name
     * 
     * @var string
     */
    public const APP_NAME = 'Spike multi-build';

    /**
     * Application version
     * 
     * @var string
     */
    protected $appVersion;

    /**
     * Application feature manager
     * 
     * @var \Sbidault\ComposerMultiBuild\Infrastructure\App\FeatureManager
     */
    public $featureManager;

    /**
     * Http client
     * 
     * @var \Sbidault\ComposerMultiBuild\Infrastructure\HttpClient\HttpClient
     */
    public $httpClient;

    public function __construct()
    {
        $this->featureManager = new FeatureManager($this::class);
        $this->httpClient = new HttpClient();
    }

    /**
     * Echo message to fake starting the application
     * 
     * @return void
     */
    public function start()
    {
        echo 'Démarrage de l\'application "' . self::APP_NAME . '" en mode "' . strtoupper($this->appVersion) . '"' . PHP_EOL . PHP_EOL;
    }

    public function commonFeature1()
    {
        return 'Feature commune n°1' . PHP_EOL;
    }

    public function commonFeature2()
    {
        return 'Feature commune n°2' . PHP_EOL;
    }
}
