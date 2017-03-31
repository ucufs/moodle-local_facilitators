<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

	
	<h3 class="text-center">Seleção de Facilitadores</h3>

	<div class="row-fluid">
    <div class="span12">
      <div class="alert alert-warning">
        <small>
        <p align="justify"><b><?= $msg ?></b></p>
				<p>Clique <a href="<?php echo URL_BASE ?>"><b>aqui</b></a> para inscrever-se novamente.</p>
        </small>
        
      </div>
    </div>
  </div>	

<?php $view['slots']->stop() ?>
