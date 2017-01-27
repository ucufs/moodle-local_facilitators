<?php
// The PhpEngine class is the entry point of the component templating.
// It needs a template name parser 
// to convert a template name to a template reference.
// It also needs a template loader which uses the
// template reference to actually find and load the template.
// If the component Templating is standalone, the SlotsHelper must be registered

use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\Helper\SlotsHelper;

// Project Base URL
define('URL_BASE', $CFG->wwwroot . '/local/psf');

// The global variable $templating is called on the controllers to render pages
$loader = new FilesystemLoader(__DIR__.'/views/%name%');
$engine = new PhpEngine(new TemplateNameParser(), $loader);
$GLOBALS['templating'] = $engine;
$templating->set(new SlotsHelper());
