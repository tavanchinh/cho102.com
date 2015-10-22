<div class="main-container col2-left-layout">
   <div class="container">
      <div class="row">
         <div class="col-xs-12">
            <div class="main">
               <div class="row">
                  <div class="col-main col-xs-12 col-sm-9">
                     <?php $this->renderPartial('/layouts/widgets/special_product')?>
                     <?php $block_product = array('Sản phẩm mới','Thời trang nữ','Thời trang nam','Mỹ phẩm - làm đẹp')?>
                     <?php foreach($block_product as $title){?>
                        <div class="padding-s">
                           <div class="std">
                              <div class="clear"></div>
                           </div>
                           <div class="page-title category-title">
                              <h1><?php echo $title?></h1>
                           </div>
                           
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
                              <script>
                                 $(function() {
                                     $("img.lazy-load").lazy({
                                          effect: "fadeIn",
                                          effectTime: 1500
                                     });
                                 });
                              </script>
                              
                           </ul>
                           <div id="map-popup" class="map-popup" style="display:none;">
                              <a href="#" class="map-popup-close" id="map-popup-close">x</a>
                              <div class="map-popup-arrow"></div>
                              <div class="map-popup-heading">
                                 <h2 id="map-popup-heading"></h2>
                              </div>
                              <div class="map-popup-content" id="map-popup-content">
                                 <div class="map-popup-msrp" id="map-popup-msrp-box"><strong>Price:</strong> <span style="text-decoration:line-through;" id="map-popup-msrp"></span></div>
                                 <div class="map-popup-price" id="map-popup-price-box"><strong>Actual Price:</strong> <span id="map-popup-price"></span></div>
                                 <div class="map-popup-checkout">
                                    <form action="" method="POST" id="product_addtocart_form_from_popup">
                                       <input type="hidden" name="product" class="product_id" value="" id="map-popup-product-id" />
                                       <div class="additional-addtocart-box">
                                       </div>
                                       <button type="button" title="Add to Cart" class="button btn-cart" id="map-popup-button"><span><span>Add to Cart</span></span></button>
                                    </form>
                                 </div>
                              </div>
                              <div class="map-popup-text" id="map-popup-text">Our price is lower than the manufacturer's &quot;minimum advertised price.&quot;  As a result, we cannot show you the price in catalog or the product page. <br /><br /> You have no obligation to purchase the product once you know the price. You can simply remove the item from your cart.</div>
                              <div class="map-popup-text" id="map-popup-text-what-this">Our price is lower than the manufacturer's &quot;minimum advertised price.&quot;  As a result, we cannot show you the price in catalog or the product page. <br /><br /> You have no obligation to purchase the product once you know the price. You can simply remove the item from your cart.</div>
                           </div>
                        </div>
                     <?php }?>
                  </div><!-- End col-main -->
                  <div class="col-left sidebar col-xs-12 col-sm-3">
                     <?php $this->renderPartial('/layouts/widgets/category')?>
                     <?php $this->renderPartial('/layouts/widgets/distance')?>
                     <?php $this->renderPartial('/layouts/widgets/price')?>
                  </div>
               </div>
            </div><!-- End main -->
         </div>
      </div>
   </div>
</div>