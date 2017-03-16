<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/../../config.php';

$app = new Silex\Application();
$app['debug'] = false;

// Dependencies registers
require __DIR__ . '/register.php';
// Routes
require __DIR__ . '/routes.php';

$app->run();
