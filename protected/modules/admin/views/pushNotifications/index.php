<?php
/* @var $this PushNotificationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Push Notifications',
);

$this->menu=array(
	array('label'=>'Create PushNotifications', 'url'=>array('create')),
	array('label'=>'Manage PushNotifications', 'url'=>array('admin')),
);
?>

<h1>Push Notifications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
