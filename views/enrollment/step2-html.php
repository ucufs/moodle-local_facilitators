<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

<div class="text-center" style="margin-top: 10px; margin-bottom: 25px">
  <img src="<?= URL_BASE ?>/imgs/Etapa4.png">
</div>

  <div class="well well-small">
    <p>
      <b>Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></b><br/>
      <?= $edict->title ?>
    </p>
    <p><b>Função: </b><?= $vacancy->role_name ?></p>
    <p><b>Evento: </b><?= $vacancy->course_name ?></p>
  </div>

  <div class="row-fluid">
    <div class="span12">
      <div class="alert alert-block" style="color: #004984">
        <small>
        <b>Insira o comprovante para cada item informado (Educação Formal, Capacitação, Experiência Profissional).</b>
        <ul class="unstyled">
          <li>Orientações para envio:</li>
          <li>- Tamanho máximo do arquivo: 2MB.</li>
          <li><b>- Formatos permitidos: PDF, JPG, JPEG, PNG.</b></li>
        </ul>
        </small>
      </div>
    </div>
  </div>

  <div class="row-fluid">
    <div class="span12">
      <fieldset>
        <legend>Educação Formal</legend>
      </fieldset>
    </div>
  </div>

<form action="<?php echo URL_BASE . '/enrollment/completion/' . $inscript->id ?>" method="POST" enctype="multipart/form-data">
  <p><b>Informe sua titulação de maior nível</b></p>

  <?php foreach ($edu_formal as $ef){ ?>
    <label>
      <input type="radio" value="<?= $ef->id?>" name="criteria_id[]" value="" autofocus checked>
      <?= $ef->criteria ?>
    </label><br/>
  <?php };?>
  <br />
  <div class="row-fluid">
    <div class="span6">
      <label>Nome do curso</label>
      <input type="text" name="title[]" class="span12" placeholder="Digite o nome do curso" maxlength="100" required>
    </div>
    <div class="span6">
      <label>Instituição</label>
      <input type="text" name="institution[]" class="span12" value="" placeholder="Informe o nome completo da Instituição" maxlength="100" required>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span3">
      <label>Data de Início
        <small class="text-warning">dd/mm/yyyy</small>
      </label>
      <input type="date" name="dt_start[]" class="span12" value="" placeholder="Data de Início" maxlength="10" required>
    </div>
    <div class="span3">
      <label>Data de Término
      <small class="text-warning">dd/mm/yyyy</small>
      </label>
      <input type="date" name="dt_end[]" class="span12" value="" placeholder="Data de Término" maxlength="10" required>
    </div>
    <input type="hidden" name="workload[]" value="-">
    <div class="span6">
      <label>Comprovante de titulação
        <a href="#" data-toggle="tooltip" data-placement="right" title="diplomas, certificados, certidões e ata/declaração de aprovação sem restrição e diplomas estrangeiros revalidados no Brasil" 
        data-original-title="Insira aqui o comprovante de Educação Formal"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
      </label>
      <input type="file" class="span12 filer_input" name="document[]" data-jfiler-limit="1" data-jfiler-extensions="pdf,jpg,jpeg,png" data-jfiler-maxSize="2" data-jfiler-showThumbs="true" required>
    </div>
  </div>

<div id="capacitacao" class="clone_capacitacao">
  <div class="row-fluid">
    <div class="span12">
      <fieldset>
        <legend>Capacitação
        <div>
        <ul class="options unstyled">
          <li class="delete"><a href="#" onClick="deleteItem(this, 'clone_capacitacao');return false" title="Remover">Remover</a></li>
        </ul>
        </div>
        </legend>
      </fieldset>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span8">
      <label>Tipo de capacitação</label>
      <select name="criteria_id[]" class="span12">
        <option></option>
        <?php foreach ($capacitacao as $cap){ ?>
          <option value="<?= $cap->id?>"><?= $cap->criteria ?></option>
        <?php };?>
      </select>
    </div>
    <div class="span4">
      <label>Carga Horária
      <a href="#" data-toggle="tooltip" data-placement="right" title="Informe a carga horária da capacitação"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
      </label>
      <input type="number" name="workload[]" class="span12" value="" placeholder="Carga horária" maxlength="5" required>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
      <label>Título da capacitação</label>
      <input type="text" name="title[]" class="span12" placeholder="Digite o título da capacitação" maxlength="100" required>
    </div>
    <div class="span6">
      <label>Instituição</label>
      <input type="text" name="institution[]" class="span12" value="" placeholder="Informe o nome completo da Instituição" maxlength="100" required>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span3">
      <label>Data de Início
        <small class="text-warning">dd/mm/yyyy</small>
      </label>
      <input type="date" name="dt_start[]" class="span12" value="" placeholder="Data de Início" maxlength="10" required>
    </div>
    <div class="span3">
      <label>Data de Término
      <small class="text-warning">dd/mm/yyyy</small>
      </label>
      <input type="date" name="dt_end[]" class="span12" value="" placeholder="Data de Término" maxlength="10" required>
    </div>
    <div class="span6 input_filer">
      <label>Comprovante de capacitação
        <a href="#" data-toggle="tooltip" data-placement="right" title="certificados de conclusão ou declaração de aprovação" 
        data-original-title="Insira aqui o comprovante"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
      </label>
      <div id="group_1_capacitacao">
      <input type="file" class="filer_input span12" name="document[]" id="cap_1" data-jfiler-limit="1" data-jfiler-extensions="pdf,jpg,jpeg,png" data-jfiler-maxSize="2" data-jfiler-showThumbs="true" required>
      </div>
    </div>
  </div>
</div>

<div id="nova_capacitacao">  
</div>
<div class="row-fluid">
  <a class="btn btn-primary btn-small" onclick="add_input('capacitacao', 'nova_capacitacao');"> Adicionar nova capacitação </a>  
</div>
<hr class="split">

<div id="exp_prof" class="clone_exp_prof">
  <div class="row-fluid">
    <div class="span12">
      <fieldset>
        <legend>Experiência Profissional
        <div>
        <ul class="options unstyled">
          <li class="delete"><a href="#" onClick="deleteItem(this, 'clone_exp_prof');return false" title="Remover">Remover</a></li>
        </ul>
        </div>
        </legend>
      </fieldset>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span8">
      <label>Tipo de experiência</label>
      <select name="criteria_id[]" class="span12">
        <option></option>
        <?php foreach ($exp_prof as $xp){ ?>
          <option value="<?= $xp->id?>"><?= $xp->criteria ?></option>
        <?php };?>
      </select>
    </div>
    <div class="span4">
      <label>Carga Horária
      <a href="#" data-toggle="tooltip" data-placement="right" title="Informe a carga horária, quando houver necessidade (instrutoria ou tutoria em cursos)"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
      </label>
      <input type="number" name="workload[]" class="span12" value="" placeholder="Carga horária" maxlength="5">
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
      <label>Função</label>
      <input type="text" name="title[]" class="span12" placeholder="Digite a função" maxlength="100" required>
    </div>
    <div class="span6">
      <label>Empresa/Instituição</label>
      <input type="text" name="institution[]" class="span12" value="" placeholder="Informe o nome completo da Empresa/Instituição" maxlength="100" required>
    </div>
  </div>  
  <div class="row-fluid">
    <div class="span3">
      <label>Data de Início
        <small class="text-warning">dd/mm/yyyy</small>
      </label>
      <input type="date" name="dt_start[]" class="span12" value="" placeholder="Data de Início" maxlength="10" required>
    </div>
    <div class="span3">
      <label>Data de Término
      <small class="text-warning">dd/mm/yyyy</small>
      </label>
      <input type="date" name="dt_end[]" class="span12" value="" placeholder="Data de Término" maxlength="10" required>
    </div>    
    <div class="span6">
      <label>Comprovante de experiência profissional
        <a href="#" data-toggle="tooltip" data-placement="right" title="carteira profissional de trabalho, certificado de atuação e declaração expedida por Órgão ou Empresa Pública ou Privada na qual o candidato tenha desempenhado as atividades"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
      </label>
      <div id="group_1_exp_prof">
      <input type="file" class="span12 filer_input" name="document[]" data-jfiler-limit="1" data-jfiler-extensions="pdf,jpg,jpeg,png" data-jfiler-maxSize="2" data-jfiler-showThumbs="true" required>
      </div>
    </div>
  </div>
</div>

<div id="nova_exp_prof">  
</div>
<div class="row-fluid">
  <a class="btn btn-primary btn-small" onclick="add_input('exp_prof', 'nova_exp_prof');"> Adicionar nova experiência profissional </a>  
</div>
<hr class="split">
 <br />
  <div class="row-fluid">
    <div class="span12">
      <button type="submit" class="btn btn-success pull-right">Finalizar inscrição</button>
      <a href="<?php echo URL_BASE . '/enrollment/cancel_inscription/' . $inscript->id ?>" class="btn btn-default">Cancelar</a>
    </div>
  </div>

</form>
<?php $view['slots']->stop() ?>
