<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

	
	<h3 class="text-center">Seleção de Facilitadores</h3>
	<div class="row-fluid">
    <div class="span12">
      <div class="alert alert-error">
        <small>
        <b>Erro</b>
        <p align="justify"><b><?= $msg ?></b></p>
				<p>Clique <a href="<?php echo URL_BASE ?>"><b>aqui</b></a> para retornar para a página inicial de inscrição.</p>
        </small>
        
        <?php if (isset($cancelation_option)) { ?>
          <p style="color: black;"><small>
          Caso deseje cancelar a inscrição existente para que possa inscrever-se novamente, informe o e-mail cadastrado e clique no botão 'Cancelar inscrição'</small></p>
          <form action="<?php echo URL_BASE . '/enrollment/cancel_inscription/' . current($has_equal_inscription)->id ?>" method="POST">
            <div class="row-fluid">
              <div class="span4">
                <input type="text" name="email" class="span12" placeholder="Informe o e-mail cadastrado" required>
              </div>
              <div class="span6">
                <button class="btn btn-default" type="submit">Cancelar inscrição</button>
                <a class="btn btn-default" href="<?= URL_BASE ?>">Voltar para a página de inscrição</a>
              </div>
            </div>
          </form>
        <?php } ?>
        
      </div>
    </div>
  </div>	

<?php $view['slots']->stop() ?>
