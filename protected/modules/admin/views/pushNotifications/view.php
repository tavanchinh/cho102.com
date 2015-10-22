<?php
/* @var $this PushNotificationsController */
/* @var $model PushNotifications */

$this->breadcrumbs=array(
	'Push Notifications'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PushNotifications', 'url'=>array('index')),
	array('label'=>'Create PushNotifications', 'url'=>array('create')),
	array('label'=>'Update PushNotifications', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PushNotifications', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PushNotifications', 'url'=>array('admin')),
);
?>

<h1>View PushNotifications #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'device_id',
		'content',
	),
)); ?>
