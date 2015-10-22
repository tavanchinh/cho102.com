<?php
/* @var $this PlatformsController */
/* @var $data Platforms */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('platform_name')); ?>:</b>
	<?php echo CHtml::encode($data->platform_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('platform_code_identifer')); ?>:</b>
	<?php echo CHtml::encode($data->platform_code_identifer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('api_key')); ?>:</b>
	<?php echo CHtml::encode($data->api_key); ?>
	<br />


</div>