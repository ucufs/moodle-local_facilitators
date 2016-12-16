<?php

require_once(__DIR__ . '/../../../config.php');

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url('/local/facilitators/demo/index.php');
$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout('base');
$PAGE->set_title(get_string('pluginname', 'local_facilitators'));
$PAGE->navbar->add(get_string('pluginname', 'local_facilitators'));
echo $OUTPUT->header();
?>

  <div class="container">
    <div class="row">
      <div class="span4 offset4">
      
       <h3 class="text-center">Seleção de Facilitadores</h3>
        <div class="well">
          <form>
            <div class="control-group">
              <label class="control-label" for="matricula_siape">Matrícula SIAPE</label>
              <div class="controls">
                <input type="text" id="matricula_siape" placeholder="Matrícula SIAPE" class="span12">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="CPF">CPF</label>
              <div class="controls">
                <input type="text" id="cpf" placeholder="CPF" class="span12">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="function_facilitator">Função</label>
              <div class="controls">
                <select name="function_facilitator" class="span12">
                  <option>Selecione</option>
                  <option>Função 1</option>
                  <option>Função 2</option>
                  <option>Função 3</option>
                  <option>Função 4</option>
                  <option>Função 5</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="course">Evento/Curso</label>
              <div class="controls">
                <select name="course" class="span12">
                  <option>Selecione</option>
                  <option>Curso 1</option>
                  <option>Curso 2</option>
                  <option>Curso 3</option>
                  <option>Curso 4</option>
                  <option>Curso 5</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <div class="controls">
                <label>
                  <input type="checkbox"> <b>Li e aceito os termos do <a href="#">Edital</a></b>
                </label>
              </div>
            </div>

            <div class="control-group">
              <div class="controls text-center">
                <button type="button" class="btn btn-primary">Realizar Inscrição</button>
              </div>
            </div>


          </form>
        </div>

      </div>
    </div>
  </div>

<?php
echo $OUTPUT->footer();
?>
