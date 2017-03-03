<?php
global $PAGE, $OUTPUT, $SITE;

require_once(dirname(__FILE__) . '/../../../../config.php');
$PAGE->set_context(context_system::instance());
$PAGE->set_url('/local/psf/');
$PAGE->set_heading($SITE->fullname);
$PAGE->set_title(get_string('pluginname', 'local_psf'));
$PAGE->set_pagelayout('admin');
$PAGE->requires->js('/local/psf/js/main.js', true);
$PAGE->requires->js('/local/psf/js/sorttable.js', true);
$PAGE->requires->js('/local/psf/js/jquery.filer.min.js', true);
$PAGE->requires->css('/local/psf/css/jquery.filer.css', true);

echo $OUTPUT->header();