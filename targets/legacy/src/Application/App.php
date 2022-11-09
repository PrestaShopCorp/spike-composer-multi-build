<?php

namespace Sbidault\ComposerMultiBuild\Application;

use Sbidault\ComposerMultiBuild\Infrastructure\App\App as AppCore;

class App extends AppCore
{
    public function __construct()
    {
        parent::__construct();

        $this->appVersion = 'legacy';
    }

    public function oldLegacyFeature()
    {
        return 'Ancienne feature legacy' . PHP_EOL;
    }
}
