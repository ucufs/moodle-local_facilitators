<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

<div class="container-fluid">
  <div class="row">
    <div class="span8 offset2">
      <h3 class="text-center">Alterar Edital</h3>

      <?php echo $view->render('edict/form-html.php', array('edict'=> $edict, 'url' => $url)) ?>

    </div>
  </div>
</div>

<?php $view['slots']->stop() ?>
