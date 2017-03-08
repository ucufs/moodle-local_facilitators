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
 * Criteria Routes Archive
 *
 * This archive define methods that access the fisic adress and define the url
 *
 * @package    local_psf
 * @category   local
 * @copyright  2017 Divis�o de Desenvolvimento de Pessoal - Funda��o Universidade Federal de Sergipe
 * @author     Jos� Eduardo (zeduardu@ufs.br)
 * @author     J�ssica de Jesus (jessicajpinto@ufs.br)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Returns complete string of namespace and class (Shorten call to method).
$controller = psf\controllers\criteria_controller::class;

// ********** Route Mapping ********** //

$management->get('/criteria/{edict_id}', "$controller::local_psf_view_index_criteria");
$management->get('/criteria/{criteria_id}/{edict_id}/{role_id}/{item_id}/',"$controller::local_psf_view_form_criteria");
$management->get('/criteria/item/form/new', "$controller::local_psf_view_form_item");
$management->get('/criteria/item/form/update/{id}', "$controller::local_psf_view_form_item")

$management->post('/criteria/createorupdate', "$controller::local_psf_create_or_update_criteria");
$management->get('/criteria/update/status/{status}/{criteria_id}/{edict_id}', "$controller::local_psf_update_status");
$management->post('/criteria/item/populate', "$controller::local_psf_item_populate");

// *********************************** //

unset($controller);