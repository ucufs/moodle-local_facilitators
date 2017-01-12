<?php include __DIR__ . '/../base/header.php';?>
<?php $PAGE->navbar->add('Inscrição');?>

  <div class="container">
    <div class="row">
      <div class="span4 offset4">
      
       <h3 class="text-center">Seleção de Facilitadores</h3>
        <div class="well">

          <form action="<?php echo URL_BASE . '/enrollment/register' ?>" method="POST">

            <div class="control-group">
              <label class="control-label" for="matricula_siape">Matrícula SIAPE</label>
              <div class="controls">
                <input type="text" name="matricula_siape" placeholder="Matrícula SIAPE" required="required" class="span12">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="CPF">CPF</label>
              <div class="controls">
                <input type="text" name="cpf" placeholder="CPF" class="span12" required="required" value="">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="function_facilitator">Função</label>
              <div class="controls">
                <select name="function_facilitator" class="span12" required="required">
                  <option></option>
                  <?php foreach ($roles as $key => $role) { ?>
                    <option value="<?= $key ?>"><?= $role; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="course">Evento/Curso</label>
              <div class="controls">
                <select name="course" class="span12" required="required">
                  <option></option>
                  <?php foreach ($courses as $key => $course) { ?>
                    <option value="<?= $key ?>"><?= $course ?></option>
                  <?php } ?>
                </select>
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

            <div class="control-group">
              <div class="controls text-center">
                <button type="submit" id="nextstap" class="btn btn-primary" disabled="disabled">Realizar Inscrição</button>
              </div>
            </div>

        </form>

      </div>
    </div>
  </div>
</div>