<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/../../config.php';

$app = new Silex\Application();
$app['debug'] = true;

require __DIR__ . '/routes.php';

$app->run();