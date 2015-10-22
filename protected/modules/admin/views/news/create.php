<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'Quản lý tin'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Quản lý tin', 'url'=>array('admin')),
);
?>

<h1>Create News</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>