<?php

use Sbidault\ComposerMultiBuild\Application\App;

require __DIR__ . '/../../vendor/autoload.php';

$app = new App();

$app->start();
$app->featureManager->display();

echo $app->httpClient->call('GET', 'products');
echo $app->httpClient->call(
    'GET',
    'products/search',
    [
        'query' => [
            'q' => 'phone',
        ],
    ]
);
