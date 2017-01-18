<?php

$controller = psf\controllers\management_controller::class;

$app->get('/management', "$controller::index");
$app->get('/management/new_edict', "$controller::new_edict");
$app->post('/management/create', "$controller::create");
$app->get('/management/edit/{id}', "$controller::edit");

unset($controller);