<div class="container">
    <div class="left-content">
        <?php $this->renderPartial('/layouts/widgets/category')?>
        <?php $this->renderPartial('/layouts/widgets/distance')?>
        <?php $this->renderPartial('/layouts/widgets/price')?>
    </div> <!-- End left-content -->
    
    <div class="right-content">
        <?php 
        $categories = Category::model()->getAllParent();
            foreach($categories as $value){ 
                $sub = Category::model()->getSub($value->id);
                $count = count($sub);
                $list_product = Product::model()->getByCate($value->id,8);
                ?>
                <div class="block-cate-home">
                <h2 class="cate-parent-title">
                    <a href="#"><?php echo $value->name?></a>
                </h2>
                <?php if($count > 0){ 
                    $width = floor(823/$count);
                    ?>
                    <ul class="subcategories-list">
                        <?php foreach($sub as $sub_item){?>
                            <li style="width: <?php echo $width.'px'?>;">
                                <a title="<?php echo $sub_item->name?>" href="#"><?php echo $sub_item->name?></a>
                            </li>
                        <?php }?>
                    </ul>
                <?php }?>
                <div class="clear"></div>
                    <ul class="products-grid row">
                    <?php $arr = array(
                         array('title' => 'DURHAM MUG','img' => 'durham_mug_3.png','sapo' => 'Our store is offering a great numbe...'),
                         array('title' => 'ET PAPER SHOPPING BAG','img' => 'et_paper_shopping_bag_2.png','sapo' => 'Our store is offering a great numbe...'),
                         array('title' => 'TURNED EDGE RING BINDER','img' => 'turned_edge_flex_hinge_ring_binder_1.png','sapo' => 'Our store is offering a great numbe...'),
                         array('title' => 'VINYL PORTFOLIO WITH CD POCKET','img' => 'vinyl_portfolio_with_cd_pocket_1.png','sapo' => 'Our store is offering a great numbe...'),
                         array('title' => 'US NAVY PROMOTIONAL MUGS','img' => 'us_navy_printed_promotional_mugs_3.png','sapo' => 'Our store is offering a great numbe...'),
                         array('title' => 'HERCULES SHOPPING BAG','img' => 'hercules_shopping_bag_1.png','sapo' => 'Our store is offering a great numbe...'),
                         array('title' => 'APEX PAPER SHOPPING BAG','img' => 'apex_paper_shopping_bag_3.png','sapo' => 'Our store is offering a great numbe...'),
                         array('title' => 'MULTIMEDIA PRESENTATION FOLDER','img' => 'multimedia_presentation_folder_3.png','sapo' => 'Our store is offering a great numbe...'),
                         array('title' => 'US NAVY PROMOTIONAL MUGS','img' => 'us_navy_printed_promotional_mugs_3.png','sapo' => 'Our store is offering a great numbe...'),
                         array('title' => 'TURNED EDGE RING BINDER','img' => 'turned_edge_flex_hinge_ring_binder_1.png','sapo' => 'Our store is offering a great numbe...'),
                      );?>
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
            <?php }?>
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