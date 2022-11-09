<?php

namespace Sbidault\ComposerMultiBuild\Infrastructure\App;

class FeatureManager
{
    /**
     * Application features
     * 
     * @var array
     */
    public $features;

    /**
     * @param string $app App class name
     */
    public function __construct($app)
    {
        $this->setFeatures($app);
    }

    /**
     * Set application features list
     * 
     * @param string $app App class name
     * 
     * @return void
     */
    private function setFeatures($app)
    {
        $features = get_class_methods($app);

        foreach ($features as $key => $feature) {
            if ($feature === '__construct' || $feature === 'start' || $feature === 'getFeatures') {
                unset($features[$key]);
            }
        }

        $this->features = $features;
    }

    /**
     * Display application features list
     * 
     * @return void
     */
    public function display()
    {
        echo 'Liste des features disponibles pour cette version : ' . PHP_EOL;

        foreach ($this->features as $feature) {
            echo '  - ' . $feature . PHP_EOL;
        }

        echo PHP_EOL;
    }
}
