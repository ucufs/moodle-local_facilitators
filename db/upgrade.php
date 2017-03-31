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
        $field = new xmldb_field('base_requisite', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, '-', 'state');

        // Conditionally launch add field base_requisite.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        
        // Define field additional_requisite to be added to local_psf_applicant.
        $table = new xmldb_table('local_psf_applicant');
        $field = new xmldb_field('additional_requisite', XMLDB_TYPE_TEXT, null, null, null, null, '-', 'base_requisite');

        // Conditionally launch add field additional_requisite.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        
        $table = new xmldb_table('local_psf_inscript');
        $field = new xmldb_field('status', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1', 'inscription_number');

        // Conditionally launch add field status.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017032000, 'local', 'psf');
    }
    if ($oldversion < 2017032001) {

        $table = new xmldb_table('local_psf_inscript');
        $field = new xmldb_field('status', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1', 'inscription_number');

        // Conditionally launch add field status.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017032001, 'local', 'psf');
    }

    if ($oldversion < 2017032900) {

        // Changing type of field rg on table local_psf_applicant to char.
        $table = new xmldb_table('local_psf_applicant');
        $field = new xmldb_field('rg', XMLDB_TYPE_CHAR, '15', null, XMLDB_NOTNULL, null, '-', 'cellular');

        // Launch change of type for field rg.
        $dbman->change_field_type($table, $field);

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017032900, 'local', 'psf');
    }

    if ($oldversion < 2017033000) {

        // Define field valid to be added to local_psf_curriculum.
        $table = new xmldb_table('local_psf_curriculum');
        $field = new xmldb_field('valid', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'document');

        // Conditionally launch add field valid.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field observation to be added to local_psf_curriculum.
        $table = new xmldb_table('local_psf_curriculum');
        $field = new xmldb_field('observation', XMLDB_TYPE_TEXT, null, null, null, null, null, 'valid');

        // Conditionally launch add field observation.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field valid to be added to local_psf_applicant.
        $table = new xmldb_table('local_psf_applicant');
        $field = new xmldb_field('valid', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'additional_requisite');

        // Conditionally launch add field valid.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field observation to be added to local_psf_applicant.
        $table = new xmldb_table('local_psf_applicant');
        $field = new xmldb_field('observation', XMLDB_TYPE_TEXT, null, null, null, null, null, 'valid');

        // Conditionally launch add field observation.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017033000, 'local', 'psf');
    }

}
