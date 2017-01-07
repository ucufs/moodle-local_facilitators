<?php
global $PAGE, $OUTPUT, $SITE;

$PAGE->set_context(context_system::instance());
$PAGE->set_url('/local/facilitators/');
$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout('base');
$PAGE->set_title(get_string('pluginname', 'local_facilitators'));
$PAGE->navbar->add(get_string('pluginname', 'local_facilitators'));
echo $OUTPUT->header();