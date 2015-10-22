<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array(
         'size'=>60,
         'maxlength'=>255,
         'style' => 'width:400px',
      )); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
      <?php 
         $all_cate = Category::model()->getAll();
         $tree_cate = Category::model()->getTree($all_cate);   
      ?>
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->dropDownList($model,'parent_id',$tree_cate); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>
   
   <div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->checkBox($model,'active',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->