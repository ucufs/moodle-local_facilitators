<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/../../config.php';

// URL Base do projeto
define('URL_BASE', $CFG->wwwroot . '/local/facilitators');

$app = new Silex\Application();
$app['debug'] = true;

require __DIR__ . '/routes.php';

$app->run();