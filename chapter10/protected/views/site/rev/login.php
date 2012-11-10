<?php
$this->pageTitle='Nigol';
$this->breadcrumbs=array(
	'Nigol',
);
?>

<h1>Nigol</h1>

<p>Slaitnederc nigol ruoy htiw mrof gniwollof eht tuo llif esaelp:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Deriuqer era <span class="required">*</span> htiw sdleif.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			.<tt>nimda\nimda</tt> ro <tt>omed\omed</tt> htiw nigol yam uoy :tnih
		</p>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Nigol'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
