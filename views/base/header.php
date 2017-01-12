<?php
global $PAGE, $OUTPUT, $SITE;

$PAGE->set_context(context_system::instance());
$PAGE->set_url('/local/psf/');
$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout('base');
$PAGE->set_title(get_string('pluginname', 'local_psf'));
echo $OUTPUT->header();