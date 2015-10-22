<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/backend/imgareaselect/css/imgareaselect-animated.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/backend/imgareaselect/js/jquery.imgareaselect.pack.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/ckeditor/ckeditor.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/ckeditor/config.js');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
   'htmlOptions' => array("enctype"=>"multipart/form-data"),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
   <div class="row">
      <?php 
         $all_cate = Category::model()->getAll();
         $tree_cate = Category::model()->getTree($all_cate,0,array());
      ?>
		<?php echo $form->labelEx($model,'cat_id'); ?>
		<?php echo $form->dropDownList($model,'cat_id',$tree_cate); ?>
		<?php echo $form->error($model,'cat_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array(
         'size'=>60,
         'maxlength'=>255,
         'style' => 'width:700px',
      )); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
   <div class="row">
      <?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'sapo'); ?>
      <img id="uploadPreview" style="display:none;"/>
      <!-- hidden inputs -->
		<input type="hidden" id="x" name="x" />
		<input type="hidden" id="y" name="y" />
		<input type="hidden" id="w" name="w" />
		<input type="hidden" id="h" name="h" />
   </div>
	<div class="row">
		<?php echo $form->labelEx($model,'sapo'); ?>
		<?php echo $form->textArea($model,'sapo',array('rows'=>6,'cols'=>50,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'sapo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
      <div class="column" style="width: 100px;">
         <?php echo $form->labelEx($model,'active'); ?>
   		<?php echo $form->checkBox($model,'active',array(
            'checked' => 'checked',
         )); ?>
   		<?php echo $form->error($model,'active'); ?>
      </div>
		<div class="column">
         <?php echo $form->labelEx($model,'hot'); ?>
   		<?php echo $form->checkBox($model,'hot'); ?>
   		<?php echo $form->error($model,'hot'); ?>
      </div>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
   
   $(document).ready(function(){
      CKEDITOR.replace('News_content');
      
      //Preview and crop before upload
      var p = $("#uploadPreview");

      // prepare instant preview
      $("#News_image").change(function(){
      	// fadeOut or hide preview
      	p.fadeOut();
      
      	// prepare HTML5 FileReader
      	var oFReader = new FileReader();
      	oFReader.readAsDataURL(document.getElementById("News_image").files[0]);
      
      	oFReader.onload = function (oFREvent) {
         		p.attr('src', oFREvent.target.result).fadeIn();
      	};
      });
      
      // implement imgAreaSelect plug in (http://odyniec.net/projects/imgareaselect/)
      $('img#uploadPreview').imgAreaSelect({
      	// set crop ratio (optional)
      	aspectRatio: '80:45',
      	onSelectEnd: setInfo
      });
      
      // set info for cropping image using hidden fields
      function setInfo(i, e) {
      	$('#x').val(e.x1);
      	$('#y').val(e.y1);
      	$('#w').val(e.width);
      	$('#h').val(e.height);
      }
   });
</script>