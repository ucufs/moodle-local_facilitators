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

global $DB;

$categoryid = 33;
$sql_courses = "SELECT id, fullname " .
"FROM {course} " .
"WHERE category=" . $categoryid . 
" ORDER BY fullname;";
$courses = $DB->get_recordset_sql($sql_courses);


$role_ids = "1,9,11,10,14,15,3";
$sql_roles = "SELECT id, name ".
"FROM {role} ".
"WHERE id in (". $role_ids . ") " .
"ORDER BY name;";
$roles = $DB->get_recordset_sql($sql_roles);

?>

  <div class="container">
    <div class="row">
      <div class="span4 offset4">
      
       <h3 class="text-center">Seleção de Facilitadores</h3>
        <div class="well">
          <form action="enrollment_form.php" method="POST">
            <div class="control-group">
              <label class="control-label" for="matricula_siape">Matrícula SIAPE</label>
              <div class="controls">
                <input type="number" name="matricula_siape" placeholder="Matrícula SIAPE" required="required" class="span12">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="CPF">CPF</label>
              <div class="controls">
                <?php $inscricao = new Enrollment(); ?>
                <input type="number" name="cpf" placeholder="CPF" class="span12" required="required" value="">
              </div>
            </div>
          </div>
            <div class="control-group">
              <label class="control-label" for="function_facilitator">Função</label>
              <div class="controls">
                <select name="function_facilitator" class="span12" required="required">
                  <option></option>
                  <?php foreach ($roles as $role) { ?>
                    <option value="<?= $role->id ?>"><?= $role->name; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
            <div class="control-group">
              <label class="control-label" for="course">Evento/Curso</label>
              <div class="controls">
                <select name="course" class="span12" required="required">
                  <option></option>
                  <?php foreach ($courses as $course) { ?>
                    <option value="<?= $course->id ?>"><?= $course->fullname; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
            <div class="control-group">
              <div class="controls">
                <label>
                  <input type="checkbox" onchange="document.getElementById('nextstap').disabled = !this.checked;"> 
                  <b>Li e aceito os termos do <a href="#">Edital</a></b>
                </label>
              </div>
            </div>
          </div>
            <div class="control-group">
              <div class="controls text-center">
                <button type="submit" id="nextstap" class="btn btn-primary" disabled="disabled">Realizar Inscrição</button>
              </div>
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
