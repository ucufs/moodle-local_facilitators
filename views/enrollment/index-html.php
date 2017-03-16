<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

<h3 class="text-center">Seleção de Facilitadores</h3>

<?php foreach ($edicts as $edict) { ?>
<fieldset>
<legend>Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></legend>
	<p><?= $edict->title ?><br /> 
	Período de inscrição: <?= date("d/m/Y H:i", $edict->opening) ?> a <?= date("d/m/Y H:i", $edict->closing) ?></p>
  <?php if (($edict->has_vacancies || ($edict->has_criterias)) && ($edict->has_opened)): ?>
    <p><a href="<?php echo URL_BASE . '/inscricao/' . $edict->id ?>">Inscrição</a></p>
  <?php endif; ?>
  <p><a href="<?= $edict->file ?>" target="_blank">Edital</a></p>
</fieldset>
<?php }; ?>

<?php $view['slots']->stop() ?>
