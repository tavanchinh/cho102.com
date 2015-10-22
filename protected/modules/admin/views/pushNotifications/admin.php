<?php
/* @var $this PushNotificationsController */
/* @var $model PushNotifications */

$this->breadcrumbs=array(
	'Push Notifications'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Danh sách Notifications', 'url'=>array('index')),
	array('label'=>'Tạo Notifications', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#push-notifications-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Push Notifications</h1>
<?php echo CHtml::link('Tìm kiếm nâng cao','#',array('class'=>'search-button')); ?>
<?php echo CHtml::link('Thêm mới',Yii::app()->request->baseUrl.'/admin/'.$this->id.'/create',array('class'=>'add-button')); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'push-notifications-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'device_id',
		'content',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
