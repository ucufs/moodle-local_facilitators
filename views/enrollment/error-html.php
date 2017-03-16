<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

	
	<h3 class="text-center">Seleção de Facilitadores</h3>

	<div class="row-fluid">
    <div class="span12">
      <div class="alert alert-error">
        <small>
        <b>Erro</b>
        <p align="justify"><?= $msg ?>
				<br />Clique <a href="<?php echo URL_BASE ?>"><b>aqui</b></a> para retornar para a página inicial de inscrição.</p>
        </small>
      </div>
    </div>
  </div>	

<?php $view['slots']->stop() ?>
