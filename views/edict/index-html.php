<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

<div class="container">
  <div class="row">
    <div class="span10 offset2">
    
      <h3 class="text-center">Gerenciar Editais</h3>

      <div class="well well-small">
        <p class="pull-right">
	  <a href="<?php echo URL_BASE . '/management/edict/new_edict' ?>" class="btn btn-default">
          <i class="fa fa-file-text" aria-hidden="true"></i> Novo Edital</a>
        </p>
        <small>
        <table class="table table-bordered table-condensed">
          <tr>
            <td colspan="6"><center><b>Legenda</b></center></td>
          </tr>
          <tr>
            <td><center><i class="fa fa-cog" aria-hidden="true"></i></center></td>
            <td>Gerenciar (Vagas ou Critérios de Seleção)</td>
            <td><center><i class="fa fa-thumbs-down" aria-hidden="true"></i></center></td>
            <td>Ativar edital</td>
            <td><center><i class="fa fa-eye" aria-hidden="true"></i></center></td>
            <td>Visualizar edital</td>
          </tr>
          <tr>
            <td><center><i class="fa fa-pencil-square-o" aria-hidden="true"></i></center></td>
            <td>Alterar informações do edital</td>
            <td><center><i class="fa fa-thumbs-up" aria-hidden="true"></i></center></td>
            <td>Desativar edital</td>
            <td><center><span class="label label-important">Inativo</span></center></td>
            <td>Informa quando o edital está inativo</td>
          </tr>
          <tr>
            <td style="background-color: #dff0d8"></td>
            <td colspan="3">Indica que o edital já possui vagas ou critérios de seleção cadastrados</td>
            <td style="background-color: #f2dede"></td>
            <td colspan="3">Indica que o edital ainda não possui vagas ou critérios de seleção cadastrados</td>
          </tr>
        </table>
        </small>
      </div>

      <table class="table table-condensed table-bordered sortable">
        <tr>          
          <th><small>Título</small></th>
          <th><small>Número</small></th>
          <th><small>Ano</small></th>
          <th><small>Início das Inscrições</small></th>
          <th><small>Fim das Inscrições</small></th>
          <th colspan="2"><small>Ações</small></th>
        </tr>
        <?php foreach ($results as $result) { ?>      
        <tr>
          <td style="vertical-align: middle"><?= $result->title; ?></td>
          <td style="vertical-align: middle"><?= $result->edict_number; ?></td>
          <td style="vertical-align: middle"><?= $result->validity_year; ?></td>
          <td style="vertical-align: middle"><?= date("d/m/Y", $result->opening); ?></td>
          <td style="vertical-align: middle"><?= date("d/m/Y", $result->closing); ?></td>
          <td>
            <small>
              <table style="padding: 4px">
                <tr class="<?= ($edict->has_vacancies($result->id)) ? 'success' : 'error' ?>">
                  <td>Vagas</td>
                  <td>
                    <a href="<?php echo URL_BASE . '/management/vacancy/' . $result->id ?>" title="Gerenciar vagas ofertadas"><i class="fa fa-cog" aria-hidden="true"></i></a>
                  </td>
                </tr>
                <tr class="<?= true ? 'success' : 'error' ?>">
                  <td>Critérios</td>
                  <td>
                      <a href="<?= URL_BASE.'/management/criteria/' . $result->id ?>" title="Gerenciar critérios de seleção"><i class="fa fa-cog" aria-hidden="true"></i></a>
                  </td>
                </tr>
              </table>
            </small>
          </td>
          <td style="vertical-align: middle">
            <?php if ($result->status == 0) : ?>
            <span class="label label-important">Inativo</span><br/>
            <?php endif; ?>
            <a href="<?php echo URL_BASE . '/management/edict/edit/' . $result->id ?>" title="Alterar informações do edital">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
            <a href="<?php echo URL_BASE . '/management/edict/change_status/' . $result->id ?>" title="<?= ($result->status==1) ? 'Desativar' : 'Ativar' ?> Edital" onclick="confirm('Deseja alterar o status do edital?')">
              <i class="fa fa-thumbs-<?= ($result->status==1) ? 'up' : 'down' ?>" aria-hidden="true"></i>
            </a>
            <a href="#" title="Visualizar edital">
              <i class="fa fa-eye" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
        <?php } ?>
      </table>
          

    </div>
  </div>
</div>

<?php $view['slots']->stop() ?>
