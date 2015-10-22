<?php
/* @var $this MemberController */
/* @var $model Member */

$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Member', 'url'=>array('index')),
	array('label'=>'Create Member', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#member-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Members</h1>

<?php echo CHtml::link('Thêm mới',Yii::app()->request->baseUrl.'/admin/'.$this->id.'/create',array('class'=>'add-button')); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'member-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
         'name'=>'id',
         'htmlOptions'=>array('style'=>'width: 110px; text-align: center;'),
      ),
		'display_name',
		'user_name',
		'email',
      array(
         'name'=>'is_admin',
         'value' => '($data->is_admin == 1) ? \'Yes\' : \'No\' ',
         'filter'=> CHtml::dropDownList(
               'Member[is_admin]',
               $model->is_admin,
               array(0 => 'No',1 => 'Yes'),
               array(
                  'empty' => '-- Tất cả --',
                  'style' => 'width:200px'
               )),
      ),
      array(
         'name'=>'group_id',
         'value' => array($this,'gridGroup'),
         'filter'=> CHtml::dropDownList(
               'Member[group_id]',
               $model->group_id,
               CHtml::listData(Membergroup::model()->findAll(array('order' => 'group_name ASC')),'group_id','group_name'),
               array(
                  'empty' => '-- Tất cả --',
                  'style' => 'width:200px'
               )),
      ),
		/*
		'Mobile',
		'is_admin',
		'Address',
		'IsActive',
		'Gender',
		'Birthday',
		'CreateDate',
		'group_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?><strong></strong>
