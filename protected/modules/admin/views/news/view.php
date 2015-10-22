<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'Quản lý tin'=>array('admin'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Đăng tin', 'url'=>array('create')),
	array('label'=>'Cập nhật', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Xóa tin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Quản lý tin', 'url'=>array('admin')),
);
?>

<h1>View News #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
      array(
         'value' => '<span style="color:#ED0075;font-size:1.2em">'.$model->title.'</span>',
         'type' => 'raw',
         'label' => 'Tiêu đề',
      ),
      array(
         'value' => (Category::model()->findByPk($model->cat_id) != null ) ? Category::model()->findByPk($model->cat_id)->name : 'Chưa chọn',
         'label' => 'Danh mục',
      ),
      array(
         'value' => '<img src="'.Yii::app()->request->baseUrl.'/uploads/pictures/news/s_'.$model->image.'"/>',
         'label' => 'Ảnh',
         'type' => 'raw'
      ),
		'sapo',
      array(
         'value' => $model->content,
         'label' => 'Nội dung',
         'type' => 'raw',
      ),
      array(
         'label' => 'Trạng thái',
         'value' => ($model->active == 1) ? 'Hiển thị' : 'Không hiển thị',
      ),
      array(
         'label' => 'Tin hot',
         'value' => ($model->hot == 1) ? 'Tin hot' : 'Tin thường',
      ),		
      array(
         'label' => 'Ngày tạo',
         'value' => date('d/m/Y - H:i:s',strtotime($model->create_date)),
      ),
      array(
         'label' => 'Ngày cập nhật',
         'value' => ($model->modify_date != null) ? date('d/m/Y - H:i:s',strtotime($model->create_date)) : '<span class="null">Not set </span>',
         'type' => 'raw',
      ),
	),
)); ?>
