<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Quản lý danh mục'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Cập nhật',
);

$this->menu=array(
	array('label'=>'Tạo danh mục', 'url'=>array('create')),
	array('label'=>'Chi tiết', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Quản lý', 'url'=>array('admin')),
);
?>

<h1>Cập nhật danh mục <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>