<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>


<h3 class="text-center">Visualizar Inscrição</h3>

<h4>Detalhes da Inscrição</h4>

<div class="row-fluid">
  <div class="span6">
    <dl>
      <dt>Inscrição</dt>
      <dd><?= $inscript->inscription_number ?></dd>
    </dl>

    <dl>
      <dt>Data da Inscrição</dt>
      <dd><?= date("d/m/Y H:i", $inscript->inscription_date) ?></dd>
    </dl>
  </div>
  <div class="span6">
    <dl>
      <dt>Função / Campus</dt>
      <dd><?= $inscript->role_name ?> / <?= $inscript->campus ?></dd>
    </dl>

    <dl>
      <dt>Curso</dt>
      <dd><?= $inscript->course_name ?></dd>
    </dl>
  </div>
</div>

<hr class="split">

<div class="row-fluid">
  <div class="span6">
    <h4>Dados de Identificação</h4>
    <dl>
      <dt>Nome</dt>
      <dd><?= $applicant->name ?></dd>
    </dl>
    <dl>
      <dt>CPF</dt>
      <dd><?= $applicant->cpf ?></dd>
    </dl>
    <dl>
      <dt>SIAPE</dt>
      <dd><?= $applicant->siape ?></dd>
    </dl>
    <dl>
      <dt>RG</dt>
      <dd><?= $applicant->rg ?></dd>
    </dl>
    <dl>
      <dt>Órgão emissor</dt>
      <dd><?= $applicant->agent ?></dd>
    </dl>
    <dl>
      <dt>E-mail</dt>
      <dd><?= $applicant->email ?></dd>
    </dl>
    <dl>
      <dt>Telefone</dt>
      <dd><?= $applicant->telephone ?></dd>
    </dl>
    <dl>
      <dt>Celular</dt>
      <dd><?= $applicant->cellular ?></dd>
    </dl>
  </div>
  <div class="span6">
    <dl>
      <dt>Departamento</dt>
      <dd><?= $applicant->department ?></dd>
    </dl>
    <dl>
      <dt>Telefone do Departamento</dt>
      <dd><?= $applicant->department_telephone ?></dd>
    </dl>
    <dl>
      <dt>Horário de Trabalho</dt>
      <dd><?= $applicant->work_schedule ?></dd>
    </dl>
    <dl>
      <dt>Cargo</dt>
      <dd><?= $applicant->role ?></dd>
    </dl>
    <dl>
      <dt>Endereço</dt>
      <dd><?= $applicant->address ?></dd>
    </dl>
    <dl>
      <dt>Número</dt>
      <dd><?= $applicant->number ?></dd>
    </dl>
    <dl>
      <dt>Complemento</dt>
      <dd><?= $applicant->complement ?></dd>
    </dl>
    <dl>
      <dt>Bairro</dt>
      <dd><?= $applicant->neighborhood ?></dd>
    </dl>
    <dl>
      <dt>Cidade/Estado</dt>
      <dd><?= $applicant->city ?>/<?= $applicant->state ?></dd>
    </dl>
  </div>
</div>

<hr class="split">

<dl>
  <dt>Requisito base
    <p class="text-warning"><small><?= $inscript->base_requisite ?></small></p>
  </dt>
  <dd>
    <ul class="thumbnails">
      <li class="span12">
        <?#php if (preg_split('/;/', $applicant->base_requisite_src)[0] == 'data: application/pdf'){ ?>
          <a href="<?#= $applicant->base_requisite_src ?>" target="_blank">Visualizar arquivo</a>
          <!--<object data="<?#= $applicant->base_requisite_src ?>"></object>
          <embed width="600" height="250" name="plugin" src="<?#= $applicant->base_requisite_src ?>" type="application/pdf">-->
        <?#php } else {?>
          <a href="<?#= $applicant->base_requisite_src ?>" class="thumbnail" target="_blank" title="Clique para abrir a imagem em outra aba">
            <img src="<?#= $applicant->base_requisite_src ?>" alt="">
          </a>
        <?#php } ?>
      </li>
    </ul>
  </dd>
</dl>

<dl>
  <dt>Requisito adicional
  <p class="text-warning"><small><?= $inscript->additional_requisite ?></small></p>
  </dt>
  <dd>
    <ul class="thumbnails">
      <li class="span12">
        <?#php if (preg_split('/;/', $applicant->additional_requisite_src)[0] == 'data: application/pdf'){ ?>
          <a href="<?#= $applicant->additional_requisite_src ?>" target="_blank">Visualizar arquivo</a>
          <!-- <object data="<?#= $applicant->additional_requisite_src ?>"></object>
          <embed width="600" height="250" name="plugin" src="<?#= $applicant->additional_requisite_src ?>" type="application/pdf"> -->
        <?#php } else {?>
          <a href="<?#= $applicant->additional_requisite_src ?>" class="thumbnail" target="_blank" title="Clique para abrir a imagem em outra aba">
            <img src="<?#= $applicant->additional_requisite_src ?>" alt="">
          </a>
        <?#php } ?>
      </li>
    </ul>
  </dd>
</dl>

<form action="<?php echo URL_BASE . '/management/edict/validate_inscription/' . $inscript->id ?>" method="POST">

<div class="row-fluid">
  <div class="span12">
    <label>Observações para requisitos base e adicional
    <small class="text-warning">Insira aqui as observações para os requisitos base e adicional, quando houver</small>
    </label>
    <textarea name="applicant_observation" class="span12" rows="4"><?= $applicant->observation ?></textarea>
  </div>
</div>
<div class="row-fluid">
  <div class="span6">
    <label class="text-error">
      <b>Os requisitos acima são válidos?</b>  
      <input style="zoom: 2; margin-top: 1px;" name="applicant_valid" type="checkbox" <?= ($applicant->valid == 1) ? 'checked' : '' ?> value="1">
    </label>
  </div>
</div>

<hr class="split">

<h4>Currículo</h4>
<?php if (count($curriculum) == 0): ?>
  O currículo não foi cadastrado.
<?php else: ?>
<? $i = 0; ?>
<?php foreach ($curriculum as $cur) { ?>
  <h5><?= $cur->name ?></h5>  
  <input type="hidden" name="id[]" value="<?= $cur->id ?>">
  <dl>
    <dt>Item</dt>
    <dd><?= $cur->criteria ?></dd>
  </dl>
  <div class="row-fluid">
    <div class="span3">
      <dl>
        <dt>Pontuação unitária</dt>
        <dd><?= $cur->points/10 ?></dd>
      </dl>
    </div>
    <div class="span3">
      <dl>
        <dt>Pontuação máxima</dt>
        <dd><?= $cur->maximum_points ?></dd>
      </dl>
    </div>
    <div class="span4">
      <dl>
        <dt>Unidade de medida</dt>
        <dd><?= $cur->measurement ?></dd>
      </dl>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
      <dl>
        <dt>Título</dt>
        <dd><?= $cur->title ?></dd>
      </dl>
    </div>
    <div class="span6">
      <dl>
        <dt>Instituição</dt>
        <dd><?= $cur->institution ?></dd>
      </dl>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span4">
      <dl>
        <dt>Carga Horária</dt>
        <dd><?= $cur->workload ?></dd>
      </dl>
    </div>
    <div class="span4">
      <dl>
        <dt>Data de Início</dt>
        <dd><?#= date("d/m/Y", $cur->dt_start) ?></dd>
      </dl>
    </div>
    <div class="span4">
      <dl>
        <dt>Data de Término</dt>
        <dd><?#= date("d/m/Y", $cur->dt_end) ?></dd>
      </dl>
    </div>
  </div>
  <dl>
    <dt>Comprovante</dt>
    <dd>
      <ul class="thumbnails">
        <li class="span12">
        <?#php if (preg_split('/;/', $cur->document_src)[0] == 'data: application/pdf'){ ?>
          <a href="<?#= $cur->document_src ?>" target="_blank">Visualizar arquivo</a>
          <!-- <object data="<?#= $cur->document_src ?>"></object>
          <embed width="600" height="250" name="plugin" src="<?#= $cur->document_src ?>" type="application/pdf"> -->
        <?#php } else {?>
          <a href="<?#= $cur->document_src ?>" class="thumbnail" target="_blank" title="Clique para abrir a imagem em outra aba">
            <img src="<?#= $cur->document_src ?>" alt="">
          </a>
        <?php } ?>
        </li>
      </ul>
    </dd>
  </dl>

  <div class="row-fluid">
    <div class="span12">
      <label>Observações para o item inserido pelo candidato
      <small class="text-warning">Insira aqui as observações para o item inserido pelo candidato, quando houver</small>
      </label>
      <textarea name="observation[]" class="span12" rows="4"><?= $cur->observation ?></textarea>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
      <label class="text-error">
        <b>O item acima é válido?</b>
        <input name="valid[<?= $i ?>]" style="zoom: 2; margin-top: 1px;" type="checkbox" value="1" <?= ($cur->valid == 1) ? 'checked' : '' ?> >
      </label>
    </div>
  </div>
<hr class="split">
<?php $i++; ?>
<?php } ?>
<?php endif; ?>

  <div class="row-fluid">
    <div class="span12">
      <button type="submit" class="btn btn-primary pull-right">Salvar</button>
      <a href="<?php echo URL_BASE . '/management/edict/show_inscripts/' . $inscript->edictid ?>" class="btn btn-default">Cancelar</a>      
    </div>
  </div>

</form>

<?php $view['slots']->stop() ?>
