<?php
$this->pageTitle=Yii::app()->name . ' - Đăng nhập';
$this->breadcrumbs=array(
	'Đăng nhập',
);
?>
   <?php $form=$this->beginWidget('CActiveForm', array(
   	'id'=>'login-form',
   	'enableClientValidation'=>true,
   	'clientOptions'=>array(
   		'validateOnSubmit'=>true,
   	),
      'htmlOptions' => array(
         'class' => 'form-horizontal'
      ),
   )); ?>
   	<div class="control-group">
   		<?php echo $form->labelEx($model,'username'); ?>
   		<?php echo $form->textField($model,'username'); ?>
   		<?php echo $form->error($model,'username'); ?>
   	</div>
   
   	<div class="control-group">
   		<?php echo $form->labelEx($model,'password'); ?>
   		<?php echo $form->passwordField($model,'password'); ?>
   		<?php echo $form->error($model,'password'); ?>
   		
   	</div>
      
   	<div class="control-group buttons">
   		<?php echo CHtml::submitButton('Đăng nhập',array('class' => 'btn btn-info submit')); ?>
   	</div>
   
   <?php $this->endWidget(); ?>