<?php
/* @var $this PluginController */

$this->breadcrumbs=array(
	'Plugin'=>array('/plugin'),
	'Comment',
);

?>

<div class="comment-container">
   <div class="heading hide">
      <span>Bình luận</span>
   </div>
   <div class="form">
   
   <?php $form=$this->beginWidget('CActiveForm', array(
       'id'=>'comment_form',
       'action' => Yii::app()->request->baseUrl.'/plugin/addcomment',
       // Please note: When you enable ajax validation, make sure the corresponding
       // controller action is handling ajax validation correctly.
       // There is a call to performAjaxValidation() commented in generated controller code.
       // See class documentation of CActiveForm for details on this.
       'enableAjaxValidation'=>false,
       'htmlOptions' => array('class' => 'form-inline'),
   )); ?>
      <?php echo CHtml::hiddenField('url',$url);?>
      <?php echo $form->errorSummary($model,'Vui lòng kiểm tra lại những lỗi dưới đây.')?>
      <div class="control-group">
         <div class="content-container">
           <?php echo $form->textArea($model,'content',array(
            'placeholder' => 'Ý kiến của bạn',
            'style' => 'resize:none',
            'class' => 'form-control',
            'data-toggle' => 'tooltip',
            'title' => 'Ý kiến của bạn',
           )); ?>
         </div>
      </div>
      <div class="form-group">
         <div class="input-group">
           <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></i></div> 
           <?php echo $form->textField($model,'user_name',array(
            'class' => 'form-control',
            'placeholder' => 'Họ tên',
            'title' => 'Họ tên',
            'data-toggle' => 'tooltip',
           )); ?>
         </div>
      </div>
   
      <div class="form-group">
      <div class="input-group">
         <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div> 
         <?php echo $form->emailField($model,'email',array(
         'class' => 'form-control',
         'placeholder' => 'Email',
         'title' => 'Email',
         'data-toggle' => 'tooltip',
         )); ?>
         </div>
      </div>
      <div class="form-group">
      <div class="input-group"> 
         <div class="captcha-container">
            <?php $this->widget('CCaptcha', array(
               'buttonLabel' =>'<span class="glyphicon glyphicon-refresh" title="Lấy mã mới"></span>',
               
            ));?>
         </div>
         <div class="input-captcha">
            <?php echo $form->textField($model,'verifyCode',array(
            'class' => 'form-control',
            'placeholder' => 'Mã xác nhận',
            'title' => 'Mã xác nhận',
            'data-toggle' => 'tooltip',
            )); ?>
         </div>
         </div>
      </div>
      
       <div class="form-group buttons">
           <span class="btn btn-success" onclick="submit_cmt();">Gửi</span> 
           
       </div>
   
   <?php $this->endWidget(); ?>
   </div><!-- form -->
   <?php if(Yii::app()->user->hasFlash('error')){?>
      <div class="has-error">
         <span class="help-block"><?php echo Yii::app()->user->getFlash('error');?></span>
      </div>
   <?php }else{?>
   <ul class="list-comment">
      <?php $count_cmt = count($list_comment);?>
      <?php foreach($list_comment as $item){
         ?>
      <li class="comment-item">
         
         <div class="text">
            <a class="user-name" href="#"><?php echo $item->user_name?></a>
            <span class="date-time">
               <?php 
                  $time_stamp = strtotime($item->create_date);
                  echo MyDatetime::getTimeAgo($time_stamp);
               ?>
            </span>
            <div class="cmt-content">
               <span><?php echo $item->content?></span>
            </div>
         </div>
      </li>
      <?php }?>
   </ul>
   <?php }?>
</div> 
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-1.9.1.min.js');?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/bootstrap/js/bootstrap.min.js');?>
<script>

   function resizeIframe(id) {
      var iframeWin = parent.document.getElementById(id);
      iframeWin.height = document.body.scrollHeight;
   }
   $(document).ready(function(){
      $(".form-control").tooltip();
   });
   
   function submit_cmt(){
      var input_content = $("#Comment_content");
      var input_user_name = $("#Comment_user_name");
      var input_email = $("#Comment_email");
      var input_verifyCode = $("#Comment_verifyCode");
      if(input_content.val() == ''){
         input_content.addClass('error');
         input_content.focus();
         return false;
      }
      else if(input_user_name.val() == ''){
         input_user_name.addClass('error');
         input_user_name.focus();
         return false;
      }
      /*
      else if(input_email.val() == ''){
         input_email.addClass('error');
         input_email.focus();
         return false;
      }
      
      else if(input_verifyCode.val() == ''){
         input_verifyCode.addClass('error');
         input_verifyCode.focus();
         return false;
      }*/
      else{
         $.ajax({
            type: "post",
            dataType:"json",
            url: $("#comment_form").attr('action'),
            data: $("#comment_form").serialize(),
            success: function(result) {
               if(result.error_code == 200){
                  $(".form-control").removeClass('error');
                  var html = '<li class="comment-item fade-cmt" style="display:none"><div class="text"><a class="user-name" href="#">'+input_user_name.val()+'</a><span class="date-time">Vừa xong</span><div class="cmt-content"><span>'+input_content.val()+'</span></div></div></li>'
                  $(".form-control").val('');
                  $(".list-comment").prepend(html).find('.fade-cmt').fadeIn('slow');
                  resizeIframe("box_cmt_sys");
                  //alert("Cám ơn bạn đã gửi bình luận !");
                  $("#yw0_button").click();
               }else{
                  $("#yw0_button").click();
                  if(typeof(result.message.content) != 'undefined'){
                     input_content.addClass('error');
                     input_content.attr('data-original-title',result.message.content);
                     input_content.tooltip();                     
                  }
                  if(typeof(result.message.user_name) != 'undefined'){
                     input_user_name.addClass('error');
                     input_user_name.attr('data-original-title',result.message.user_name);
                     input_user_name.tooltip();
                  }
                  if(typeof(result.message.email) != 'undefined'){
                     input_email.addClass('error');
                     input_email.attr('data-original-title',result.message.email);
                     input_email.tooltip();
                  }
                  if(typeof(result.message.verifyCode) != 'undefined'){
                     input_verifyCode.addClass('error');
                     input_verifyCode.attr('data-original-title',result.message.verifyCode);
                     input_verifyCode.tooltip();                     
                  }
                  
               }
            }
         });
      }
      
   }
</script>
