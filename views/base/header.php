<?php
global $PAGE, $OUTPUT, $SITE;

require_once(dirname(__FILE__) . '/../../../../config.php');
$PAGE->set_context(context_system::instance());
$PAGE->set_url('/local/psf/');
$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout('base');
$PAGE->set_title(get_string('pluginname', 'local_psf'));
$PAGE->requires->js('/local/psf/javascript/main.js', true);
$PAGE->requires->js('/local/psf/javascript/sorttable.js', true);
#$PAGE->requires->js_init_call('hello');

echo $OUTPUT->header();
