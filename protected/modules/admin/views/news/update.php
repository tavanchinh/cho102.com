<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Đăng tin', 'url'=>array('create')),
	array('label'=>'Chi tiết', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Quản lý tin', 'url'=>array('admin')),
);
?>

<h1>Update News <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>