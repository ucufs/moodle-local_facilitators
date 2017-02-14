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

    if ($oldversion < 2017011804)
    {

        // Changing type of field validity_year on table local_psf_edict to char.
        $table = new xmldb_table('local_psf_edict');
        $field = new xmldb_field('validity_year', XMLDB_TYPE_CHAR, '4', null, XMLDB_NOTNULL, null, '-', 'id');

        // Launch change of type for field validity_year.
        $dbman->change_field_type($table, $field);

        // Changing type of field edict_number on table local_psf_edict to char.
        $table = new xmldb_table('local_psf_edict');
        $field = new xmldb_field('edict_number', XMLDB_TYPE_CHAR, '4', null, XMLDB_NOTNULL, null, '-', 'title');

        // Launch change of type for field edict_number.
        $dbman->change_field_type($table, $field);

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017011804, 'local', 'psf');
    }

    if ($oldversion < 2017011901)
    {
        // Define field status to be added to local_psf_edict.
        $table = new xmldb_table('local_psf_edict');
        $field = new xmldb_field('status', XMLDB_TYPE_CHAR, '4', null, XMLDB_NOTNULL, null, '1', 'edict_number');

        // Conditionally launch add field status.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017011901, 'local', 'psf');
    }

    if ($oldversion < 2017011902) {

        // Changing type of field status on table local_psf_edict to int.
        $table = new xmldb_table('local_psf_edict');
        $field = new xmldb_field('status', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1', 'edict_number');

        // Launch change of type for field status.
        $dbman->change_field_type($table, $field);

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017011902, 'local', 'psf');
    }

    if ($oldversion < 2017012001) {

        // Define field quantity to be added to local_psf_vacancy.
        $table = new xmldb_table('local_psf_vacancy');
        $field = new xmldb_field('quantity', XMLDB_TYPE_INTEGER, '2', null, XMLDB_NOTNULL, null, '0', 'roleid');

        // Conditionally launch add field quantity.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        $key = new xmldb_key('parentid', XMLDB_KEY_FOREIGN, array('parentid'), 'local_psf_vacancy', array('id'));

        // Launch drop key roleid.
        $dbman->drop_key($table, $key);

        $field_parentid = new xmldb_field('parentid');

        // Conditionally launch drop field roleid.
        if ($dbman->field_exists($table, $field_parentid)) {
            $dbman->drop_field($table, $field_parentid);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017012001, 'local', 'psf');

    }
    if ($oldversion < 2017012301) {
        // Define field module to be added to local_psf_vacancy.
        $table = new xmldb_table('local_psf_vacancy');
        $field = new xmldb_field('module', XMLDB_TYPE_CHAR, '100', null, XMLDB_NOTNULL, null, 'single', 'quantity');

        // Conditionally launch add field module.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017012301, 'local', 'psf');
    }

    if ($oldversion < 2017012302) {

        // Define field campus to be added to local_psf_vacancy.
        $table = new xmldb_table('local_psf_vacancy');
        $field = new xmldb_field('campus', XMLDB_TYPE_CHAR, '80', null, null, null, '-', 'module');

        // Conditionally launch add field campus.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017012302, 'local', 'psf');
    }

    if ($oldversion < 2017012401) {

        // Define field status to be added to local_psf_vacancy.
        $table = new xmldb_table('local_psf_vacancy');
        $field = new xmldb_field('status', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1', 'campus');

        // Conditionally launch add field status.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017012401, 'local', 'psf');
    }

    if ($oldversion < 2017013001) {

        // Define field file to be added to local_psf_edict.
        $table = new xmldb_table('local_psf_edict');
        $field = new xmldb_field('file', XMLDB_TYPE_TEXT, null, null, null, null, null, 'closing');

        // Conditionally launch add field file.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017013001, 'local', 'psf');
    }

    if ($oldversion < 2017020200) {

        // Define field status to be added to local_psf_criteria.
        $table = new xmldb_table('local_psf_criteria');
        $field = new xmldb_field('status', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'measurement');

        // Conditionally launch add field status.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017020200, 'local', 'psf');
    }

    if ($oldversion < 2017020601) {

        // Define field base_requisite to be added to local_psf_vacancy.
        $table = new xmldb_table('local_psf_vacancy');
        $field = new xmldb_field('base_requisite', XMLDB_TYPE_CHAR, '50', null, XMLDB_NOTNULL, null, '-', 'status');

        // Conditionally launch add field base_requisite.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field additional_requisite to be added to local_psf_vacancy.
        $field = new xmldb_field('additional_requisite', XMLDB_TYPE_CHAR, '150', null, XMLDB_NOTNULL, null, '-', 'base_requisite');

        // Conditionally launch add field additional_requisite.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017020601, 'local', 'psf');
    }

    if ($oldversion < 2017021301) {

        // Define field base_requisite to be added to local_psf_applicant.
        $table = new xmldb_table('local_psf_applicant');
        $field = new xmldb_field('base_requisite', XMLDB_TYPE_CHAR, '150', null, XMLDB_NOTNULL, null, '-', 'work_schedule');

        // Conditionally launch add field base_requisite.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

         // Define field additional_requisite to be added to local_psf_applicant.
        $table = new xmldb_table('local_psf_applicant');
        $field = new xmldb_field('additional_requisite', XMLDB_TYPE_CHAR, '400', null, XMLDB_NOTNULL, null, '-', 'base_requisite');

        // Conditionally launch add field additional_requisite.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Psf savepoint reached.
        upgrade_plugin_savepoint(true, 2017021301, 'local', 'psf');
    }


}