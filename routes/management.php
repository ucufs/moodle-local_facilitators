<?php

$controller = psf\controllers\management_controller::class;

$app->get('/management', "$controller::index");
$app->get('/management/new_edict', "$controller::new_edict");
$app->post('/management/create', "$controller::create");
$app->get('/management/edit/{id}', "$controller::edit");
$app->post('/management/update/{id}', "$controller::update");
$app->get('/management/change_status/{id}', "$controller::change_status");

unset($controller);