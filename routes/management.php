<?php

$controller = psf\controllers\enrollment_controller::class;

$app->get('/management', "$controller::index");

unset($controller);