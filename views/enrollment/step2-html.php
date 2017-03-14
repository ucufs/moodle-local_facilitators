<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

  <h3 class="text-center">Inscrição</h3>
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
      <fieldset>
        <legend>Educação Formal</legend>
      </fieldset>
    </div>
  </div>

<form action="<?php echo URL_BASE . '/enrollment/completion/' . $inscript->id ?>" method="POST" enctype="multipart/form-data">
  <p><b>Informe sua titulação de maior nível</b></p>

  <?php foreach ($edu_formal as $ef){ ?>
    <label>
      <input type="radio" value="<?= $ef->id?>" name="criteria_id[]" value="" checked>
      <?= $ef->criteria ?>
    </label><br/>        
  <?php };?>
  <br />
  <div class="row-fluid">
    <div class="span6">
      <label>Nome do curso</label>
      <input type="text" name="title[]" class="span12" placeholder="Digite o nome do curso" required>
    </div>
    <div class="span6">
      <label>Instituição</label>
      <input type="text" name="institution[]" class="span12" value="" placeholder="Digite o nome da Instituição" required>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span3">
      <label>Data de Início
        <small class="text-warning">dd/mm/yyyy</small>
      </label>
      <input type="date" name="dt_start[]" class="span12" value="" placeholder="Data de Início" required>
    </div>
    <div class="span3">
      <label>Data de Término
      <small class="text-warning">dd/mm/yyyy</small>
      </label>
      <input type="date" name="dt_end[]" class="span12" value="" placeholder="Data de Término" required>
    </div>
    <input type="hidden" name="workload[]" value="-">
    <div class="span6">
      <label>Comprovante de titulação
        <a href="#" data-toggle="tooltip" data-placement="right" title="diplomas, certificados, certidões e ata/declaração de aprovação sem restrição e diplomas estrangeiros revalidados no Brasil" 
        data-original-title="Insira aqui o comprovante de Educação Formal"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
      </label>
      <input type="file" class="span12 filer_input" name="document[]" data-jfiler-limit="1" data-jfiler-extensions="pdf,jpg,jpeg,png" data-jfiler-maxSize="5" required>
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
    <div class="span6">
      <label>Título da capacitação</label>
      <input type="text" name="title[]" class="span12" placeholder="Digite o título da capacitação" required>
    </div>
    <div class="span6">
      <label>Instituição</label>
      <input type="text" name="institution[]" class="span12" value="" placeholder="Digite o nome da Instituição" required>
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
      <label>Carga Horária</label>
      <input type="number" name="workload[]" class="span12" value="" placeholder="Carga horária" required>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span3">
      <label>Data de Início
        <small class="text-warning">dd/mm/yyyy</small>
      </label>
      <input type="date" name="dt_start[]" class="span12" value="" placeholder="Data de Início" required>
    </div>
    <div class="span3">
      <label>Data de Término
      <small class="text-warning">dd/mm/yyyy</small>
      </label>
      <input type="date" name="dt_end[]" class="span12" value="" placeholder="Data de Término" required>
    </div>
    <div class="span6 input_filer">
      <label>Comprovante de capacitação
        <a href="#" data-toggle="tooltip" data-placement="right" title="certificados de conclusão ou declaração de aprovação" 
        data-original-title="Insira aqui o comprovante"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
      </label>
      <div id="group_1">
      <input type="file" class="filer_input span12" name="document[]" id="cap_1" data-jfiler-limit="1" data-jfiler-extensions="pdf,jpg,jpeg,png" data-jfiler-maxSize="5" required>
      </div>
    </div>
  </div>
</div>

<div id="nova_capacitacao">  
</div>
<div class="row-fluid">
  <a class="btn btn-primary btn-small pull-right" onclick="add_input('capacitacao', 'nova_capacitacao');"> Nova Capacitação </a>  
</div>

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
    <div class="span6">
      <label>Título</label>
      <input type="text" name="title[]" class="span12" placeholder="Digite o título" required>
    </div>
    <div class="span6">
      <label>Empresa/Instituição</label>
      <input type="text" name="institution[]" class="span12" value="" placeholder="Digite o nome da Empresa/Instituição" required>
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
  </div>
  <input type="hidden" name="workload[]" value="-">
  <div class="row-fluid">
    <div class="span3">
      <label>Data de Início
        <small class="text-warning">dd/mm/yyyy</small>
      </label>
      <input type="date" name="dt_start[]" class="span12" value="" placeholder="Data de Início" required>
    </div>
    <div class="span3">
      <label>Data de Término
      <small class="text-warning">dd/mm/yyyy</small>
      </label>
      <input type="date" name="dt_end[]" class="span12" value="" placeholder="Data de Término" required>
    </div>    
    <div class="span6">
      <label>Comprovante de experiência profissional
        <a href="#" data-toggle="tooltip" data-placement="right" title="carteira profissional de trabalho, certificado de atuação e declaração expedida por Órgão ou Empresa Pública ou Privada na qual o candidato tenha desempenhado as atividades"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
      </label>
      <div id="group_1">
      <input type="file" class="span12 filer_input" name="document[]" data-jfiler-limit="1" data-jfiler-extensions="pdf,jpg,jpeg,png" data-jfiler-maxSize="5" required>
      </div>
    </div>
  </div>
</div>

<div id="nova_exp_prof">  
</div>
<div class="row-fluid">
  <a class="btn btn-primary btn-small pull-right" onclick="add_input('exp_prof', 'nova_exp_prof');"> Nova Experiência Profissional </a>  
</div>

 <br />
  <div class="row-fluid">
    <div class="span12">
      <button type="submit" class="btn btn-success pull-right">Finalizar inscrição</button>
      <a href="<?php echo URL_BASE ?>" class="btn btn-default">Cancelar</a>
    </div>
  </div>

</form>
<?php $view['slots']->stop() ?>
