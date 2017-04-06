<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Enrollment Routes Archive
 *
 * This archive define methods that access the fisic adress and define the url
 *
 * @package    local_psf
 * @category   backup
 * @copyright  2017 Divisão de Desenvolvimento de Pessoal - Fundação Universidade Federal de Sergipe
 * @author     José Eduardo (zeduardu@ufs.br)
 * @author     Jéssica de Jesus (jessicajpinto@ufs.br)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Returns complete string of namespace and class (Shorten call to method).
$controller = psf\controllers\enrollment_controller::class;

// ********** Route Mapping ********** //

$app->get('/', "$controller::index");
$app->get('/358c811ef60b3e28bb49e910f55ff473/{id}', "$controller::enrollment");
$app->post('/enrollment/step/{edict_id}', "$controller::step");
$app->post('/enrollment/step1/{inscript_id}', "$controller::step1");
$app->post('/enrollment/step2/{inscript_id}', "$controller::step2");
$app->post('/enrollment/completion/{inscript_id}', "$controller::completion");
$app->get('/enrollment/receipt/{inscript_id}', "$controller::receipt");
$app->get('/enrollment/cancel_inscription/{inscript_id}', "$controller::cancel_inscription");
$app->post('/enrollment/cancel_inscription/{inscript_id}', "$controller::cancel_inscription");

// *********************************** //

unset($controller);