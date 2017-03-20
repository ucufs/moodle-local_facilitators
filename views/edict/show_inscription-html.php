<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>


<h3 class="text-center">Visualizar Inscrição</h3>

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
  <dt>Cidade</dt>
  <dd><?= $applicant->city ?></dd>
</dl>
<dl>
  <dt>Estado</dt>
  <dd><?= $applicant->state ?></dd>
</dl>
<dl>
  <dt>Requisito base</dt>
  <dd>
    <ul class="thumbnails">
      <li class="span4">
        <a href="#" class="thumbnail">
          <img data-src="<?= $applicant->base_requisite ?>" alt="">
        </a>
      </li>
    </ul>
  </dd>
</dl>
<dl>
  <dt>Requisito adicional</dt>
  <dd>
    <ul class="thumbnails">
      <li class="span4">
        <a href="#" class="thumbnail">
          <img data-src="<?= $applicant->additional_requisite ?>" alt="">
        </a>
      </li>
    </ul>
  </dd>
</dl>

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
        <li class="span4">
          <a href="#" class="thumbnail">
            <img data-src="<?= $cur->document ?>" alt="">
          </a>
        </li>
      </ul>
    </dd>
  </dl>
<?php } ?>
<?php endif; ?>

<?php $view['slots']->stop() ?>
