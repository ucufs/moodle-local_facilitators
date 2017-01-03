<?php

function xmldb_local_facilitators_upgrade($oldversion)
{

    global $CFG, $THEME, $DB;
    $dbman = $DB->get_manager();

    $result = TRUE;

    if ($oldversion < 2016122100)
    {

        // Define table attendant to be created.
        $table = new xmldb_table('attendant');

        // Adding fields to table attendant.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('siape', XMLDB_TYPE_CHAR, '10', null, XMLDB_NOTNULL, null, null);
        $table->add_field('cpf', XMLDB_TYPE_CHAR, '11', null, XMLDB_NOTNULL, null, null);
        $table->add_field('funcao', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table->add_field('curso', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);

        // Adding keys to table attendant.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Conditionally launch create table for attendant.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Facilitators savepoint reached.
        upgrade_plugin_savepoint(true, 2016122100, 'local', 'facilitators');
    }


    return $result;
}
?>