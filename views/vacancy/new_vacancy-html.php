<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

<div class="container-fluid">
  <div class="row">
    <div class="span8 offset2">
    
      <h3 class="text-center">Adicionar item</h3>

      <?php echo $view->render('vacancy/form-html.php', array('vacancy' => $vacancy, 'courses' => $courses, 'roles' => $roles, 'url' => $url)) ?>

    </div>
  </div>
</div>

<?php $view['slots']->stop() ?>
