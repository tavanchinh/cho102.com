<?php 
    $count = count($sub);
    if($count > 0){
        $breadcrumbs = array(
            "{$cate->name}"
        );
    }else{
        $parent = Category::model()->getInfoById($cate->parent_id);
        $parent_link = Str::makeLink($parent->id,$parent->name,'danh-muc');
        $breadcrumbs = array(
            "{$parent->name}" => array("$parent_link"),
            "{$cate->name}"
        );
        
        
    }
    
    $this->breadcrumbs=$breadcrumbs;
    
?>
<div class="container">
    <div class="left-content">
        <?php $this->renderPartial('/layouts/widgets/category')?>
        <?php $this->renderPartial('/layouts/widgets/distance')?>
        <?php $this->renderPartial('/layouts/widgets/price')?>
    </div> <!-- End left-content -->
    
    <div class="right-content">
        <div class="block-cate-home">
            <?php 
                
                if($count > 0){
                $link_cate_parent = Str::makeLink($cate->id,$cate->name); 
                
                ?>
                <h2 class="cate-parent-title">
                    <a href="<?php echo $link_cate_parent?>"><?php echo $cate->name?></a>
                </h2>
                <?php if($count > 0){ 
                    $width = floor(823/$count);
                    ?>
                    <ul class="subcategories-list">
                        <?php foreach($sub as $sub_item){
                            $link_cate_sub = Str::makeLink($sub_item->id,$sub_item->name,'danh-muc');
                            ?>
                            <li style="width: <?php echo $width.'px'?>;">
                                <a href="<?php echo $link_cate_sub?>" title="<?php echo $sub_item->name?>" href="#"><?php echo $sub_item->name?></a>
                            </li>
                        <?php }?>
                    </ul>
                <?php }?>
            <?php }else{
                if(isset($this->breadcrumbs)){
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'homeLink'=>CHtml::link('Trang chủ','/'),
                        'links'=>$this->breadcrumbs,
                        'separator' => '<i class="fa fa-angle-right"></i>',
                        'encodeLabel' => false   
                    )); 
                }
            }
            ?>
            <div class="clear"></div>
                <ul class="products-grid row">
                    <?php foreach($list_product as $value){
                        $image = SimpleImage::model()->getThumbnail($value->avatar,'140');
                        $link = Str::makeLink($value->id,$value->name,'san-pham');
                    ?>
                     <li class="item">
                        <div class="product-container">
                           <a href="<?php echo $link?>" title="<?php echo $value->name?>" class="product-image" ><img data-src="<?php echo $image?>"  class="lazy-load" alt="US NAVY Promotional Mugs" src="images/image_placeholder.jpg" /></a>
                           <div class="product-shop">
                              <h3 class="product-name"><a href="#" title="<?php echo $value->name?>"><?php echo $value->name?></a></h3>
                              <div class="price-box">
                                 <span class="regular-price" id="product-price-48-new">
                                    <span class="price"><?php echo Str::formatNumber($value->price) . 'đ'?></span>                                  
                                 </span>
                              </div>
                           </div>
                           <div class="label-product">             
                           </div>
                           <div class="clear"></div>
                        </div>
                     </li>
                  <?php }?>                              
               </ul>
            </div>
    </div>
</div>
<script>
$(function() {
   $("img.lazy-load").lazy({
      effect: "fadeIn",
      effectTime: 1500
   });
});
</script>