<?php

$controller = psf\controllers\edict_controller::class;

$app->get('/edict', "$controller::index");
$app->get('/edict/new_edict', "$controller::new_edict");
$app->post('/edict/create', "$controller::create");
$app->get('/edict/edit/{id}', "$controller::edit");
$app->post('/edict/update/{id}', "$controller::update");
$app->get('/edict/change_status/{id}', "$controller::change_status");

unset($controller);