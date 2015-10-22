<?php
/* @var $this PlatformsController */
/* @var $model Platforms */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'platforms-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'platform_name'); ?>
		<?php echo $form->textField($model,'platform_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'platform_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'platform_code_identifer'); ?>
		<?php echo $form->textField($model,'platform_code_identifer',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'platform_code_identifer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'api_key'); ?>
		<?php echo $form->textField($model,'api_key',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'api_key'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->