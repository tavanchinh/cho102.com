<div class="container">
   <div class="left-content">
      <?php $this->renderPartial('/layouts/widgets/category')?>
      <?php $this->renderPartial('/layouts/widgets/distance')?>
      <?php $this->renderPartial('/layouts/widgets/price')?>
   </div> <!-- End left-content -->
   
   <div class="right-content">
      <ul class="" id="special_product" style="display: none;">
         <li>
            <div class="text left">
               <div class="text left">
                  Khuyến mãi lên đến 50%
               </div>
               <img alt="" src="images/slide1.jpg"/>
            </div>
         </li>
         <li>
            <div class="text left">
               <div class="text left">
                  Khuyến mãi lên đến 50%
               </div>
               <img alt="" src="images/slide2.jpg"/>
            </div>
         </li>
         <li>
            <div class="text left">
               <div class="text left">
                  Khuyến mãi lên đến 50%
               </div>
               <img alt="" src="images/slide3.jpg"/>
            </div>
         </li>
      </ul>
      <script type="text/javascript" src="js/owl.carousel.min.js"></script>
      <script>
         /*
         $(document).ready(function(){
            $("#special_product").owlCarousel({
               items:1,
               scrollPerPage:true,
               lazyLoad:true,
               navigation : true, // Show next and prev buttons
               slideSpeed : 300,
               paginationSpeed : 400,
               stopOnHover:true,
               pagination:false,
               autoPlay:5000,
               navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            
            });

         })
         */
      </script>
      <?php $block_product = array('Sản phẩm mới','Thời trang nữ','Thời trang nam','Mỹ phẩm - làm đẹp')?>
      <?php foreach($block_product as $title){?>
            <div class="block">
               <p class="block-title"><?php echo $title?></p>
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
                  <?php foreach($arr as $value){?>
                     <li class="item">
                        <div class="product-container">
                           <a href="#" title="<?php echo $value['title']?>" class="product-image" ><img data-src="images/product/<?php echo $value['img']?>"  class="lazy-load" alt="US NAVY Promotional Mugs" src="images/image_placeholder.jpg" /></a>
                           <div class="product-shop">
                              <h3 class="product-name"><a href="#" title="<?php echo $value['title']?>"><?php echo $value['title']?></a></h3>
                              <div class="price-box">
                                 <span class="regular-price" id="product-price-48-new">
                                 <span class="price">$9.54</span>                                    </span>
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