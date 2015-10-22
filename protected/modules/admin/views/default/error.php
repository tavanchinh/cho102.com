<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
$error_data = array(
   404 => 'Trang bạn tìm kiếm không tồn tại',
   403 => 'Bạn không có quyền thực hiện hành động này',
   );
?>
<div class="text-error">
   <h2>Lỗi: <?php echo $code; ?></h2>
   
   <div class="error">
   <?php echo isset($error_data[$code]) ? CHtml::encode($error_data[$code]) : CHtml::encode($message); ?>
   </div>
</div>