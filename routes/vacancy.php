<?php

$controller = psf\controllers\vacancy_controller::class;

$app->get('/vacancy/edit/{id}', "$controller::edit");
$app->get('/vacancy/new_vacancy/{id}', "$controller::new_vacancy");
// $app->get('/management/new_edict', "$controller::new_edict");
// $app->post('/management/create', "$controller::create");
// $app->get('/management/edit/{id}', "$controller::edit");
// $app->post('/management/update/{id}', "$controller::update");
// $app->get('/management/change_status/{id}', "$controller::change_status");

unset($controller);