<?php

namespace Sbidault\ComposerMultiBuild\Infrastructure\App;

interface AppInterface
{
    /**
     * Echo message to fake starting the application
     * 
     * @return void
     */
    public function start();

    public function commonFeature1();
    public function commonFeature2();
}
