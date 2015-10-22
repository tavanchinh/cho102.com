<?php
/* @var $this PackagesController */
/* @var $model Packages */

$this->breadcrumbs=array(
	'Packages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Packages', 'url'=>array('index')),
	array('label'=>'Create Packages', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#packages-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Packages</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<?php echo CHtml::link('Create',Yii::app()->request->baseUrl.'/admin/'.$this->id.'/create',array('class'=>'add-button')); ?>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'packages-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
         'name'=>'id',
         'htmlOptions'=>array('style'=>'width: 60px; text-align: center;', 'class'=>''),
      ),
		'package_name',
		'charge_value',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
