<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

   <div class="form-group">
   
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
      <?php echo $form->error($model,'email'); ?>
   
	</div>
   
   <div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'city_id'); ?>
		<?php echo $form->dropDownList($model,'city_id',$list_city,array(
         'class' => 'form-control',
         'style' => 'width:180px'
      )); ?>
		<?php echo $form->error($model,'city_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'district_id'); ?>
		<?php echo $form->dropDownList($model,'district_id',array(),array('class' => 'form-control','style' => 'width:250px')); ?>
		<?php echo $form->error($model,'district_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'street'); ?>
		<?php echo $form->textField($model,'street',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		<?php echo $form->error($model,'street'); ?>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255,'class' => 'form-control','style' => 'width:200px')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
   
	<div class="form-group">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->radioButtonList($model,'gender',array(1 => 'Nam',0 => 'Nữ'),array('separator' => '')); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
   var city_id = $("#User_city_id").val();
   loadDistrictByCity(city_id);
   
   $("#User_city_id").change(function(){
      loadDistrictByCity($(this).val());
   })
   
   function loadDistrictByCity(city_id){
      var data = {'city_id':city_id}; 
      var success_function = function(data){
         $("#User_district_id").html(data);
      }
      handleAjax('/district/loadDistrictByCity','POST','',data,success_function);
   }
   
   
</script>