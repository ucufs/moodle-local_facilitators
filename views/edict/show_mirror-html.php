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
      <p class="text-warning"><small>Exigência do edital: <?= $inscript->base_requisite ?></small></p>
    </dt>
<!--     <dd>
      <ul class="thumbnails">
        <li class="span12">          
          <a href="<?= $applicant->base_requisite_src ?>" target="_blank">Visualizar arquivo</a>
        </li>
      </ul>
    </dd> -->
  </dl>

  <dl>
    <dt>Requisito adicional
    <p class="text-warning"><small>Exigência do edital: <?= $inscript->additional_requisite ?></small></p>
    </dt>
<!--     <dd>
      <ul class="thumbnails">
        <li class="span12">
          <a href="<?#= $applicant->additional_requisite_src ?>" target="_blank">Visualizar arquivo</a>
        </li>
      </ul>
    </dd> -->
  </dl>

<div class="row-fluid">
  <div class="span12 well">
    <dl>
      <dt>Requisitos apresentados são válidos?: <?= ($applicant->valid == 1) ? 'SIM' : 'NÃO' ?></dt>
    </dl>
    <b>Observações para os requisitos apresentados pelo candidato</b>
    <p class="text-<?= ($applicant->valid == 1) ? 'success' : 'error' ?>"><?= $applicant->observation ?></p>
    <?php if ($applicant->valid == 0) { ?>
      <p><b>Atenção! Os demais itens não foram analisados, pois os requisitos para a função não foram atendidos.</b></p>
    <?php } ?>
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
        <dd><?= date("d/m/Y", $cur->dt_start); ?></dd>
      </dl>
    </div>
    <div class="span4">
      <dl>
        <dt>Data de Término</dt>
        <dd><?= date("d/m/Y", $cur->dt_end); ?></dd>
      </dl>
    </div>
  </div>

<!--   <dl>
    <dt>Comprovante</dt>
    <dd>
      <ul class="thumbnails">
        <li class="span12">
          <a href="<?#= $cur->document_src ?>" target="_blank">Visualizar arquivo</a>
        </li>
      </ul>
    </dd>
  </dl> -->

  <div class="row-fluid">
    <div class="span12 well">
      <dl>
        <dt>O comprovante apresentado é válido?: <?= ($cur->valid == 1) ? 'SIM' : 'NÃO' ?></dt>
      </dl>
      <b>Observações para o comprovante inserido pelo candidato: </b>
      <p class="text-<?= ($applicant->valid == 1) ? 'success' : 'error' ?>">
        <?= ($cur->observation == '') ? '-' : $cur->observation ?>
      </p>
    </div>
  </div>
  
<hr class="split">
<?php $i++; ?>
<?php } ?>
<?php endif; ?>

<?php $view['slots']->stop() ?>
