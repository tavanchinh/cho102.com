<?php
/* @var $this MemberController */
/* @var $model Member */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
   
   
	<div class="row">
		<?php echo $form->labelEx($model,'group_id'); ?>
		<?php echo $form->dropDownList($model,'group_id',CHtml::listData(Membergroup::model()->findAll(array('order' => 'group_name ASC')),'id','group_name'),array('style' =>'width:180px')); ?>
		<?php echo $form->error($model,'group_id'); ?>
	</div>
   
	<div class="row">
		<?php echo $form->labelEx($model,'display_name'); ?>
		<?php echo $form->textField($model,'display_name',array('size'=>50,'maxlength'=>50,'style' => 'width:180px')); ?>
		<?php echo $form->error($model,'display_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_name'); ?>
		<?php echo $form->textField($model,'user_name',array('size'=>50,'maxlength'=>50,'style' => 'width:180px')); ?>
		<?php echo $form->error($model,'user_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32,'style' => 'width:180px')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
   
   <div class="row">
		<?php echo $form->labelEx($model,'repeat_password'); ?>
		<?php echo $form->passwordField($model,'repeat_password',array('size'=>32,'maxlength'=>32,'style' => 'width:180px')); ?>
		<?php echo $form->error($model,'repeat_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50,'style' => 'width:180px')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>20,'maxlength'=>20,'style' => 'width:180px')); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>150,'style' => 'width:380px')); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>
   
   <div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->dropDownList($model,'gender',array(1 => "Nam", 0 => "Nữ")); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>
   
   <div class="row">
		<?php echo $form->labelEx($model,'is_admin'); ?>
		<?php echo $form->checkBox($model,'is_admin',array('checked' => 1)); ?>
		<?php echo $form->error($model,'is_admin'); ?>
	</div>
   
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->checkBox($model,'status',array('checked' => 1)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthday'); ?>
		<?php echo $form->textField($model,'birthday',array('class' => 'datetimepicker','style' => 'width:180px')); ?>
		<?php echo $form->error($model,'birthday'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->