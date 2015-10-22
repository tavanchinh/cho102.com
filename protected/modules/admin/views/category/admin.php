<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Tạo danh mục', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Categories</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<?php echo CHtml::link('Create',Yii::app()->request->baseUrl.'/admin/'.$this->id.'/create',array('class'=>'add-button')); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
      array(
         'name' => 'id',
         'htmlOptions' => array('style' => 'width:60px')
      ),
		'name',
      array(
         'name' => 'parent_id',
         'value' => array($this,'gridParent'),
         'filter'=> CHtml::dropDownList(
               'Category[parent_id]',
               $model->parent_id,
               CHtml::listData(Category::model()->findAll(array('order' => 'name ASC')),'id','name'),
               array(
                  'empty' => '-- Không chọn --',
               )),
      ),
      array(
         'name' => 'position',
         'htmlOptions' => array('style' => 'text-align:center'),
      ),
      array(
         'name'=>'active',
         'value' => '($data->active == 1) ? \'Có\' : \'Không\'',
         'htmlOptions' => array('style' => 'text-align:center'),
         'type' => 'raw',
         'filter'=> CHtml::dropDownList(
               'Category[active]',
               $model->active,
               array(0 => 'No',1 => 'Yes'),
               array(
                  'empty' => '-- Tất cả --',
                  'style' => 'width:100px'
               )),
      ),
      
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
