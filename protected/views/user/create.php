<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Đăng ký thành viên</h1>

<?php $this->renderPartial('_form', array(
'model'=>$model,
'list_city' => $list_city,
)); ?>