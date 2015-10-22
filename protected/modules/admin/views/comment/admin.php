<?php
/* @var $this CommentController */
/* @var $model Comment */
$this->breadcrumbs=array(
	'Bình luận',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<h1>Bình luận đang chờ duyệt</h1>
<?php 
   //Đếm tất cả bình luận đang chờ duyệt (bảng comment)
   $count_pending = Comment::model()->countByAttributes(array('status' => 0));
   $count_publish = CommentPublish::model()->count();
?>
<ul class="subsubsub">
	<li class="moderated"><a href="<?php echo Yii::app()->request->baseUrl.'/admin/comment/admin'?>"  class="current">Đang chờ duyệt <span class="count">(<span class="pending-count"><?php echo $count_pending?></span>)</span></a> |</li>
	<li class="approved"><a href="<?php echo Yii::app()->request->baseUrl.'/admin/commentpublish/admin'?>">Đã duyệt <span class="count">(<span class="approved-count"><?php echo $count_publish?></span>)</span></a></li>
</ul>
<?php echo CHtml::beginForm(); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comment-grid',
	'dataProvider'=>$model->search(),
   
   'rowHtmlOptionsExpression' => 'array("id"=>"comment-".$data->id)',
	//'filter'=>$model,
	'columns'=>array(
      /*
      array(
         'header' => '<a href="javascript:void(0)">User</a>',
         'value'=> array($this,'gridUser'),
         'type' => 'raw',
         'htmlOptions' => array('style' => 'width:250px'),
         'filter' => false,
      ),
      */
      array(
         'id' => 'selectedIds',
         'class' => 'CCheckBoxColumn',
         'selectableRows' => 2,
      ),
      array(
         'header' => '<a href="javascript:void(0)">Nội dung</a>',
         'value'=> array($this,'gridContent'),
         'type' => 'raw',
         'htmlOptions' => array('style' => 'width:750px'),
         'filter' => false,
      ),
      array(
         'header' => '<a href="javascript:void(0)">Bài viết</a>',
         'value'=> array($this,'gridWebsite'),
         'type' => 'raw',
         'htmlOptions' => array('style' => 'width:150px'),
         'filter' => false,
      ),
	),
)); ?>
<div>
<?php echo CHtml::submitButton('Phê duyệt', array('name' => 'ApproveButton','class' => 'btn btn-success','style' => 'margin-right:10px')); ?>
<?php echo CHtml::submitButton('Xóa', 
array(
   'name' => 'DeleteButton',
   'confirm' => 'Bạn có chắc chắn muốn xóa những bình luận đã chọn',
   'class' => 'btn btn-danger'
));
?>
</div>
<?php echo CHtml::endForm(); ?>

<script>
   function approve_cmt(id){
      if(id > 0){
         var url = '<?php echo Yii::app()->request->baseUrl;?>/admin/comment/handle';
         var success_fnc = function(result){
            if(result.error_code == 200){
               $("#comment-"+id).remove();
               $(".pending-count").text(parseInt($(".pending-count").text()) - 1);
               $(".approved-count").text(parseInt($(".approved-count").text()) + 1);
               //var html = '<td colspan="3"><span>Bình luận này đã đánh dấu được gỡ xuống</span></td>'
            }
         }
         handleAjax(url,'POST','json',{'action':'approve','id':id},success_fnc);
      }else{
         alert('id invalid');
      }
   }
   
   function delete_cmt(id){
      if(id > 0){
         var url = '<?php echo Yii::app()->request->baseUrl;?>/admin/comment/handle';
         var success_fnc = function(result){
            if(result.error_code == 200){
               $("#comment-"+id).remove();
               $(".pending-count").text(parseInt($(".pending-count").text()) - 1);
               //$(".approved-count").text(parseInt($(".approved-count").text()) + 1);
               //var html = '<td colspan="3"><span>Bình luận này đã đánh dấu được gỡ xuống</span></td>'
            }
         }
         var conf = confirm("Bạn có chắc chắn muốn xóa bình luận này ?");
         if(conf)
            handleAjax(url,'POST','json',{'action':'delete','id':id},success_fnc);
      }else{
         alert('id invalid');
      }
   }
   
   $(document).ready(function(){
      var $gridView = $('#comment-grid');

      
   })
   
   
</script>
