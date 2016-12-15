<?php

// Standard GPL and phpdocs
require_once(__DIR__ . '/../../../config.php');
//require_once($CFG->libdir.'/adminlib.php');

////admin_externalpage_setup('tooldemo');

//// Set up the page.
//$title = get_string('pluginname', 'facilitators');
//$pagetitle = $title;
//$url = new moodle_url("/admin/tool/demo/index.php");
//$PAGE->set_url($url);
//$PAGE->set_title($title);
//$PAGE->set_heading($title);

//$output = $PAGE->get_renderer('facilitators');

//echo $output->header();
//echo $output->heading($pagetitle);

//$renderable = new \tool_demo\output\index_page('Some text');
//echo $output->render($renderable);

//echo $output->footer();

$context = context_system::instance();

$PAGE->set_context($context);
$PAGE->set_url('/local/facilitators/demo/index.php');
$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('pluginname', 'local_facilitators'));
$PAGE->navbar->add(get_string('pluginname', 'local_facilitators'));

echo $OUTPUT->header(); ?>

<h1>Conteúdo da página.</h1>
