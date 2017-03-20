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
 * upgrade processes for this module.
 *
 * @package   local_psf
 * @copyright 2016 UFS - Universidade Federal de Sergipe <didep@ufs.br>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
function xmldb_local_psf_upgrade($oldversion=0)
{
    global $DB;
    $dbman = $DB->get_manager(); // Loads ddl manager and xmldb classes.

    if ($oldversion < 2017032000) {

        // Define field base_requisite to be added to local_psf_applicant.
        $table = new xmldb_table('local_psf_applicant');
        $field = new xmldb_field('base_requisite', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, null, 'state');

        // Conditionally launch add field base_requisite.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017032000, 'local', 'psf');
    }

    if ($oldversion < 2017032000) {

        // Define field additional_requisite to be added to local_psf_applicant.
        $table = new xmldb_table('local_psf_applicant');
        $field = new xmldb_field('additional_requisite', XMLDB_TYPE_TEXT, null, null, null, null, null, 'base_requisite');

        // Conditionally launch add field additional_requisite.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017032000, 'local', 'psf');
    }

    if ($oldversion < 2017032000) {

        // Define field status to be added to local_psf_inscript.
        $table = new xmldb_table('local_psf_inscript');
        $field = new xmldb_field('status', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1', 'inscription_number');

        // Conditionally launch add field status.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017032000, 'local', 'psf');
    }
}