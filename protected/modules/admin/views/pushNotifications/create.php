<?php
/* @var $this PushNotificationsController */
/* @var $model PushNotifications */

$this->breadcrumbs=array(
	'Push Notifications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PushNotifications', 'url'=>array('index')),
	array('label'=>'Manage PushNotifications', 'url'=>array('admin')),
);
?>

<h1>Create PushNotifications</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>