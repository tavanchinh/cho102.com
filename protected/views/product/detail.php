<?php
/* @var $this ProductController */

$this->breadcrumbs=array(
	'Product'=>array('/product'),
	'Detail',
);
$baseUrl = Yii::app()->request->baseUrl;
Yii::app()->clientScript->registerCssFile($baseUrl.'/css/product.css?v=1.1');
//Yii::app()->clientScript->registerScriptFile($baseUrl.'/js/cloud-zoom.1.0.2.js');

$first_image = isset($list_image[0]) ? SimpleImage::model()->getOriginalImage($list_image[0]) : '';
?>
<div class="container">
    <?php 
         if(isset($this->breadcrumbs)){
            $this->widget('zii.widgets.CBreadcrumbs', array(
      			'links'=>$this->breadcrumbs,
      		)); 
         ?><!-- breadcrumbs -->
   	<?php }?>
    
    <div class="product">
        <div class="product-img-box">
            <div class="box-big-image">
                <img class="big-image" src="<?php echo $first_image?>" />
            </div>
            <?php if(count($list_image) > 0){
                echo '<ul class="thumbnails">';
                foreach($list_image as $value){
                    $image = SimpleImage::model()->getOriginalImage($value);
                    $thumb = SimpleImage::model()->getThubnail($value,100); ?>
                    <li>
                        <img class="thumb" data-src="<?php echo $image?>" style="background-image: url(<?php echo $thumb?>);" alt="">
                    </li>
                <?php }
                echo '</ul>';
            }?>
        </div>
        <div class="product-text">
            <h1 class="item-title"><?php echo $model->name;?></h1>
            <ul class="attributes">
                <li>
                    <label>Giá: </label><span class="price"><?php echo Str::formatNumber($model->price)?>đ</span>
                </li>
                <li>
                    <label>Loại:  </label><span><?php echo ($cate != null) ? $cate->name : 'Đang cập nhật'; ?></span>
                </li>
                <li>
                    <label>SĐT liên hệ: </label><span><?echo  (isset($user->phone_number) ? $user->phone_number : 'Đang cập nhật');?></span>
                </li>
                <li>
                    <label>Ngày đăng: </label><span><?php echo date('d/m/Y',strtotime($model->create_date));?></span>
                </li>
            </ul>
            
        </div>
        <div class="clear"></div>
        <div class="product-des">
            <?php echo $model->des;?>
        </div>
    </div>
</div>
<script>
   $(document).ready(function(){
      $(".thumb").click(function(e){
         e.preventDefault();
         var img = $(this).attr('data-src');
         $(".big-image").attr("src",img);
      })
   })
</script>