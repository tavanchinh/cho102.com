<?php
/* @var $this CustomersController */
/* @var $model Customers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customers-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'package_id'); ?>
		<?php echo $form->dropDownList($model,'package_id',CHtml::listData(Packages::model()->findAll(array('order' => 'id ASC')),'id','package_name')); ?>
		<?php echo $form->error($model,'package_id'); ?>
	</div>
   
	<div class="row">
		<?php echo $form->labelEx($model,'device_token'); ?>
		<?php echo $form->textArea($model,'device_token',array('size'=>60,'maxlength'=>512,'style' => 'width:500px;height:100px')); ?>
		<?php echo $form->error($model,'device_token'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'udid'); ?>
		<?php echo $form->textField($model,'udid',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'udid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'platform_id'); ?>
		<?php echo $form->dropDownList($model,'platform_id',CHtml::listData(Platforms::model()->findAll(array('order' => 'platform_name ASC')),'id','platform_name')); ?>
		<?php echo $form->error($model,'platform_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->checkBox($model,'status',array('checked' => 'checked')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->