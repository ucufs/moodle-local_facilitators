<?php $view->extend('template-html.php') ?>

<?php $view['slots']->start('body') ?>

<h3 class="text-center">Seleção de Facilitadores</h3>

<?php foreach ($edicts as $edict) { ?>
<fieldset>
<legend>Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></legend>
	<p><?= $edict->title ?><br /> 
	Período de inscrição: <?= date("d/m/Y H:i", $edict->opening) ?> a <?= date("d/m/Y H:i", $edict->closing) ?></p>
  <?php if (($edict->has_vacancies || ($edict->has_criterias)) && ($edict->has_opened)): ?>
  	<p><a href="https://capacitese.ufs.br/pluginfile.php/23/mod_forum/attachment/13809/Manual_Inscricao_PSF.pdf">Manual de Inscrição</a></p>
    <p><a href="<?php echo URL_BASE . '/inscricao/' . $edict->id ?>">Inscrição</a></p>
    <p style="font-size: smaller; font-weight: bold;">O sistema de inscrição é melhor visualizado utilizando o <a href="https://www.google.com.br/chrome/browser/desktop/" alt="Clique aqui para fazer o download do navegador" target="_blank">Google Chrome</a>.</p>
    <p class="text-error"><b>Importante: o candidato deve iniciar a inscrição com os documentos disponíveis para serem anexados no sistema.</b></p>
  <?php endif; ?>
  <p><a href="http://progep.ufs.br/uploads/page_attach/path/2404/Formul_rio_de_Recurso_Edital_01_17.docx" target="_blank">Formulário para Recurso</a></p>
  <p><a href="http://progep.ufs.br/uploads/page_attach/path/2406/Resultado_da_selecao_Edital_01_17.pdf" target="_blank">Resultado</a></p>
  <p><a href="http://progep.ufs.br/uploads/page_attach/path/2312/Retifica__o_02_Edital_01-17.pdf" target="_blank">Retificação n° 02 do Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></a></p>
  <p><a href="http://progep.ufs.br/uploads/page_attach/path/2311/Retifica__o_01_Edital_01-17.pdf" target="_blank">Retificação n° 01 do Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></a></p>
  <p><a href="<?= $edict->file ?>" target="_blank">Edital n° <?= $edict->edict_number ?>/<?= $edict->validity_year ?></a></p>
</fieldset>
<?php }; ?>

<?php $view['slots']->stop() ?>
