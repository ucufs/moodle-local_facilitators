<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>
<?php var_dump($_SESSION['last_request']); ?>
	
	<h3 class="text-center">Seleção de Facilitadores</h3>

	<div class="row-fluid">
    <div class="span12">
      <div class="alert alert-error">
        <small>
        <b>Ops!</b>
        <p align="justify">Não é possível utilizar o recurso do navegador para atualizar ou voltar a página. Seus dados foram perdidos e será necessário iniciar o processo de inscrição novamente.
				Clique <a href="<?php echo URL_BASE ?>"><b>aqui</b></a> para retornar para a página inicial de inscrição.</p>
        </small>
      </div>
    </div>
  </div>	

<?php $view['slots']->stop() ?>
