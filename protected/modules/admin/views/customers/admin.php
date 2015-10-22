<?php
/* @var $this CustomersController */
/* @var $model Customers */

$this->breadcrumbs=array(
	'Customers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Customers', 'url'=>array('index')),
	array('label'=>'Create Customers', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#customers-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Customers</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<?php echo CHtml::link('Create',Yii::app()->request->baseUrl.'/admin/'.$this->id.'/create',array('class'=>'add-button')); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'customers-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
         'name'=>'id',
         'htmlOptions'=>array('style'=>'width: 60px; text-align: center;', 'class'=>'zzz'),
      ),
		'name',
      'email',
      array(
         'name' => 'platform_id',
         'value' => array($this,'gridPlatform'),
         'filter'=> CHtml::dropDownList(
               'Customers[platform_id]',
               $model->platform_id,
               CHtml::listData(Platforms::model()->findAll(array('order' => 'platform_name ASC')),'id','platform_name'),
               array(
                  'empty' => '-- All --',
                  'style' => 'width:120px'
               )),
      ),
		'create_date',
		'expire_date',
      'status',
		'package_id',
      array(
         'name' => 'package_id',
         'value' => array($this,'gridPackage'),
         'filter'=> CHtml::dropDownList(
               'Customers[package_id]',
               $model->package_id,
               CHtml::listData(Packages::model()->findAll(array('order' => 'id ASC')),'id','package_name'),
               array(
                  'empty' => '-- All --',
                  'style' => 'width:120px'
               )),
      ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
