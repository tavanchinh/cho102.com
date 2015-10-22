<?php
/* @var $this PushNotificationsController */
/* @var $model PushNotifications */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'push-notifications-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
   <div class="row">
      <?php 
         echo CHtml::label('Chọn nền tảng','platform');
         echo CHtml::dropDownList('platform','',CHtml::listData(Platforms::model()->findAll(array('order' => 'platform_name ASC')),'id','platform_name'),array(
            'onchange' => 'loadDevices(this)',
         ));
      ?>
   </div>
	<div class="row">
		<?php echo $form->labelEx($model,'device_id'); ?>
		<?php echo $form->checkBoxList($model,'device_id',CHtml::listData(Devices::model()->findAll(),'id','udid'),array(
         'separator'=>'',
         'template'=>'<div class="column input-label">{input}&nbsp;{label}</div>'
      )); ?>
		<?php echo $form->error($model,'device_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
   function loadDevices(obj){
      var succes_fn = function(data){
         $("#PushNotifications_device_id").html(data);
      }
      handleAjax('/admin/devices/getDeviceByPlatform','POST','',{'id':$(obj).val()},succes_fn);
   }
</script>