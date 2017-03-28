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
      <dt>Função/Campus</dt>
      <dd><?= $inscript->role_name ?></dd>
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
  <dt>Requisito base</dt>
  <dd>
    <ul class="thumbnails">
      <li class="span12">
        <?php if (preg_split('/;/', $applicant->base_requisite_src)[0] == 'data: application/pdf'){ ?>
          <object data="<?= $applicant->base_requisite_src ?>"></object>
          <embed width="600" height="250" name="plugin" src="<?= $applicant->base_requisite_src ?>" type="application/pdf">
        <?php } else {?>
          <a href="<?= $applicant->base_requisite_src ?>" class="thumbnail" target="_blank" title="Clique para abrir a imagem em outra aba">
            <img src="<?= $applicant->base_requisite_src ?>" alt="">
          </a>
        <?php } ?>
      </li>
    </ul>
  </dd>
</dl>

<dl>
  <dt>Requisito adicional</dt>
  <dd>
    <ul class="thumbnails">
      <li class="span12">
        <?php if (preg_split('/;/', $applicant->additional_requisite_src)[0] == 'data: application/pdf'){ ?>
          <object data="<?= $applicant->additional_requisite_src ?>"></object>
          <embed width="600" height="250" name="plugin" src="<?= $applicant->additional_requisite_src ?>" type="application/pdf">
        <?php } else {?>
          <a href="<?= $applicant->additional_requisite_src ?>" class="thumbnail" target="_blank" title="Clique para abrir a imagem em outra aba">
            <img src="<?= $applicant->additional_requisite_src ?>" alt="">
          </a>
        <?php } ?>
      </li>
    </ul>
  </dd>
</dl>

<hr class="split">

<h4>Currículo</h4>
<?php if (count($curriculum) == 0): ?>
  O currículo não foi cadastrado.
<?php else: ?>
<?php foreach ($curriculum as $cur) { ?>
  <h5><?= $cur->name ?></h5>
  <dl>
    <dt>Item</dt>
    <dd><?= $cur->criteria ?></dd>
  </dl>
  <dl>
    <dt>Título</dt>
    <dd><?= $cur->title ?></dd>
  </dl>
  <dl>
    <dt>Carga Horária</dt>
    <dd><?= $cur->workload ?></dd>
  </dl>
  <dl>
    <dt>Data de Início</dt>
    <dd><?= date("d/m/Y", $cur->dt_start) ?></dd>
  </dl>
  <dl>
    <dt>Data de Término</dt>
    <dd><?= date("d/m/Y", $cur->dt_end) ?></dd>
  </dl>
  <dl>
    <dt>Instituição</dt>
    <dd><?= $cur->institution ?></dd>
  </dl>
  <dl>
    <dt>Comprovante</dt>
    <dd>
      <ul class="thumbnails">
        <li class="span12">
        <?php if (preg_split('/;/', $cur->document_src)[0] == 'data: application/pdf'){ ?>
          <object data="<?= $cur->document_src ?>"></object>
          <embed width="600" height="250" name="plugin" src="<?= $cur->document_src ?>" type="application/pdf">
        <?php } else {?>
          <a href="<?= $cur->document_src ?>" class="thumbnail" target="_blank" title="Clique para abrir a imagem em outra aba">
            <img src="<?= $cur->document_src ?>" alt="">
          </a>
        <?php } ?>
        </li>
      </ul>
    </dd>
  </dl>
<?php } ?>
<?php endif; ?>

<?php $view['slots']->stop() ?>
