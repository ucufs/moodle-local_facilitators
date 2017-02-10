<?php include __DIR__ . '../../../lib.php'; ?>

<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

<div class="container-fluid">
  <div class="row">
    <div class="span8 offset2">
    
      <h3 class="text-center">Gerenciar Vagas</h3>

      <div class="well well-small">
        <p>
          <b>Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></b><br/>
          <?= $edict->title ?>
        </p>
      </div>

        <p class="pull-right">
          <a href="<?php echo URL_BASE . '/management/vacancy/new_vacancy/' . $edict->id ?>" class="btn btn-default">
          <i class="fa fa-file-text" aria-hidden="true"></i> Adicionar item</a>
        </p>

      <?php if (count($vacancies) == 0): ?>
      <p>Ainda não há vagas cadastradas.</p>
      <?php else: ?>
      <small>
      <table class="table table-condensed table-hover">
        <tr>
          <th style="width: 300px;">Evento</th>
          <th>Função</th>
          <th>Vagas</th>
          <th>Requisitos</th>
          <th>Campi</th>
          <th colspan="2" class="center">Ações</th>
        </tr>
        <?php foreach ($vacancies as $vacancy) { ?>   
        <tr>
          <td><?= local_psf_get_course_name($vacancy->courseid); ?></td>
          <td><?= local_psf_get_role_name($vacancy->roleid); ?></td>
          <td><?= $vacancy->quantity; ?></td>
          <td><?= $vacancy->get_requisites ?></td>
          <td><?= $vacancy->campus ?></td>
          <td>
            <a href="<?php echo URL_BASE . '/management/vacancy/edit/' . $vacancy->edictid . '/' . $vacancy->id ?>" title="Alterar informações">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
            </a>            
            <a href="<?php echo URL_BASE . '/management/vacancy/destroy/' . $vacancy->edictid . '/' . $vacancy->id ?>" title="Excluir" onclick="confirm('Deseja excluir o item?')">
              <i class="fa fa-times" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
        <?php }; ?>
      </table>
      </small>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php $view['slots']->stop() ?>
