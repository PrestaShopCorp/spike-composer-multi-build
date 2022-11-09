<?php

namespace Sbidault\ComposerMultiBuild\Application;

use Sbidault\ComposerMultiBuild\Infrastructure\App\App as AppCore;

class App extends AppCore
{
    public function __construct()
    {
        parent::__construct();

        $this->appVersion = 'v3';
    }

    public function newV3Feature()
    {
        return 'Nouvelle feature V3' . PHP_EOL;
    }
}
