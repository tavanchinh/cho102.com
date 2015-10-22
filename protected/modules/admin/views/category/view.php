<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Quản lý danh mục'=>array('admin'),
	$model->name,
);

$this->menu=array(
	
	array('label'=>'Tạo danh mục', 'url'=>array('create')),
	array('label'=>'Cập nhật', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Xóa danh mục', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Quản lý danh mục', 'url'=>array('admin')),
);
?>

<h1>View Category #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'parent_id',
		'position',
      array(
         'label' => 'Trạng thái',
         'value' => ($model->active == 1) ? 'Hiển thị' : 'Không hiển thị',
      ),
	),
)); ?>
