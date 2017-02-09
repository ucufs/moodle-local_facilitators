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
 * Routes archive
 *
 * This archive will begin to define many controllers controlling the routes in plugin and
 * directing for respective controllers and offering  secure  trough  "$management"  block
 * depriving access not authorized.
 *
 * @package    local_psf
 * @category   backup
 * @copyright  2017 Divisão de Desenvolvimento de Pessoal - Fundação Universidade Federal de Sergipe
 * @author     José Eduardo (zeduardu@ufs.br)
 * @author     Jéssica de Jesus (jessicajpinto@ufs.br)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Set of controllers that management the internal data and need authentication
$management = $app['controllers_factory'];

// *******Place file routes here***********
require __DIR__ . '/routes/enrollment.php';
require __DIR__ . '/routes/edict.php';
require __DIR__ . '/routes/vacancy.php';
require __DIR__ . '/routes/criteria.php';
// ****************************************

// Allows that any functionality be it requested before the controller is executed
$management->before(function () {
    global $USER, $CFG;

    // Force the user be logged
    require_login();
    // This plugin works in the system context
    $context = context_module::instance($USER->id);
    // If no have capability return the main page of moodle trough redirect
    if (!has_capability('local/psf:manage', $context))
        redirect($CFG->wwwroot);
});

// Mounts controllers under the given route prefix.
$app->mount('management', $management);
