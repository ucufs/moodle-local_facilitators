<?php

require_once(__DIR__ . '/../../../config.php');
require_once('registration_form.php');
require_once('../classes/enrollment.php');

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url('/local/facilitators/demo/index.php');
$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout('base');
$PAGE->set_title(get_string('pluginname', 'local_facilitators'));
$PAGE->navbar->add(get_string('pluginname', 'local_facilitators'));
echo $OUTPUT->header();

$inscricao = new Enrollment();
?>

  <div class="container">
  <h3 class="text-center">Inscrição</h3>
    <div class="row">

      <div class="span8 offset2">

        <div class="well well-small">
          <p><b>Inscrição: </b><?= $inscricao->get_enrollment_number() ?></p>
          <p><b>Função: </b><?= $inscricao->get_role_name($_POST["function_facilitator"]) ?></p>
          <p><b>Curso/Evento: </b><?= $inscricao->get_course_name($_POST["course"]) ?></p>
        </div>

        <form action="#" method="POST">
        <fieldset>
          <legend>Dados de Identificação</legend>
        </fieldset>
        
        <div class="row">
          <button type="confirm" class="btn btn-default">Cancelar</button>
          <button type="confirm" class="btn btn-success pull-right">Finalizar inscrição</button>
        </div>

        <br/>

      </div> <!-- col-md-8 -->

    </div><!-- initial row -->

  </div> <!-- container -->
