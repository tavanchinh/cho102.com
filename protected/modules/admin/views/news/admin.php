<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'Quản lý tin',
);

$this->menu=array(
	array('label'=>'Quản lý tin', 'url'=>array('admin')),
	array('label'=>'Đăng tin', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#news-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage News</h1>

<?php echo CHtml::link('Tìm kiếm nâng cao','#',array('class'=>'search-button')); ?>
<?php echo CHtml::link('Đăng tin',Yii::app()->request->baseUrl.'/admin/'.$this->id.'/create',array('class'=>'add-button')); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
         'name' => 'id',
         'htmlOptions' => array('style' => 'width:60px')
      ),
      array(
         'header' => '<a href="javascript:void(0)">Tiêu đề</a>',
         'value' => array($this,'gridContent'),
         'htmlOptions' => array('style' => 'width:600px'),
         'type' => 'raw',
         'filter' => CHtml::textField('News[title]',$model->title),
      ),
      array(
         'name' => 'cat_id',
         'value' => array($this,'gridCate'),
         'filter'=> CHtml::dropDownList(
               'News[cat_id]',
               $model->cat_id,
               Category::model()->getTree(Category::model()->getAll()),
               array(
                  'empty' => '-- Tất cả --',
               )),
      ),
      array(
         'name'=>'active',
         'value' => array($this,'gridActive'),
         'htmlOptions' => array('style' => 'text-align:center'),
         'type' => 'raw',
         'filter'=> CHtml::dropDownList(
               'News[active]',
               $model->active,
               array(0 => 'No',1 => 'Yes'),
               array(
                  'empty' => '-- Tất cả --',
                  'style' => 'width:100px'
               )),
      ),
      
      array(
         'name'=>'hot',
         'value' => array($this,'gridHot'),
         'htmlOptions' => array('style' => 'text-align:center'),
         'type' => 'raw',
         'filter'=> CHtml::dropDownList(
               'News[hot]',
               $model->hot,
               array(0 => 'No',1 => 'Yes'),
               array(
                  'empty' => '-- Tất cả --',
                  'style' => 'width:100px'
               )),
      ),
		array(
         'name' => 'create_date',
         'value' => 'date("d/m/Y - H:i:s",strtotime($data->create_date))',
      ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<script>
   function check_hot(obj){
      status = $(obj).attr('data-status');
      id = $(obj).attr('data-id');
      var data = {'id':id,'status':status};
      var success_fnc = function(result){
         if(status == 0){
            $(obj).removeClass('checked');
         }else{
            $(obj).addClass('checked');
         }
         $(obj).attr('data-status',Math.abs(status-1));
      }
      handleAjax('/admin/news/checkhot','POST','',data,success_fnc);
   }
   
   function check_active(obj){
      status = $(obj).attr('data-status');
      id = $(obj).attr('data-id');
      var data = {'id':id,'status':status};
      var success_fnc = function(result){
         if(status == 0){
            $(obj).removeClass('checked');
         }else{
            $(obj).addClass('checked');
         }
         $(obj).attr('data-status',Math.abs(status-1));
      }
      handleAjax('/admin/news/checkactive','POST','',data,success_fnc);
   }
</script>
