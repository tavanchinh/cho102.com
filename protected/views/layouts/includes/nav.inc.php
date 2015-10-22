<div class="nav-container">
   <div class="container">
      <div class="row">
         <div class="col-xs-12">
            <ul id="nav" class="sf-menu">
               <?php $menu = array(
                  'Thời trang - phụ kiện',
                  'Điện tử - điện máy',
                  'Đồ dùng sinh hoạt',
                  'Dịch vụ giải trí',
                  'Nội thất - ngoại thất',
                  'Sức khỏe - sắc đẹp',
               );?>
               <?php 
               $i = 0;
               foreach($menu as $value){
                  $i++;
                  ?>
                  <li  class="level0 nav-<?php echo $i?> level-top"><a href="calendars-planners.html"  class="level-top" ><span><?php echo $value?></span></a></li>
               <?php }?>
               <li  class="level0 nav-<?php echo $i+1;?> level-top parent">
                  <a href="promotional-products.html"  class="level-top" ><span>Promotional products</span></a>
                  <ul class="level0">
                     <li  class="level1 nav-5-1 first"><a href="promotional-products/bags.html" ><span>Bags</span></a></li>
                     <li  class="level1 nav-5-2 parent">
                        <a href="promotional-products/mugs.html" ><span>Mugs</span></a>
                        <ul class="level1">
                           <li  class="level2 nav-5-2-1 first last"><a href="promotional-products/mugs/test-category.html" ><span>Test Category</span></a></li>
                        </ul>
                     </li>
                     <li  class="level1 nav-5-3 last"><a href="promotional-products/office-supplies.html" ><span>Office supplies</span></a></li>
                  </ul>
               </li>
            </ul>
            <div class="form-search-2">
               <form id="search_mini_form" action="" method="get">
                  <span class="p-reletive">
                     <div class="search-item search-category">
                        <?php $menu = array(
                              'Thời trang - phụ kiện',
                              'Điện tử - điện máy',
                              'Đồ dùng sinh hoạt',
                              'Dịch vụ giải trí',
                              'Nội thất - ngoại thất',
                              'Sức khỏe - sắc đẹp',
                           );?>
                        <?php echo CHtml::dropDownList('category',null,$menu,array('empty' => 'Danh mục','class' => 'input-select','style' => 'width: 166px;height: 32px;'))?>
                     </div>
                     <div class="search-item">
                        <?php echo CHtml::telField('keyword','',array('class' => 'input-text','placeholder' => 'Bạn muốn tìm sản phẩm nào ?','style' => 'width:430px;'))?>
                     </div>
                     <div class="search-item">
                        <?php echo CHtml::telField('street','',array('class' => 'input-text','placeholder' => 'Trên phố nào ?','style' => 'width:430px'))?>
                     </div>
                     <button type="submit" title="Tìm kiếm" class="button"><span><i class="fa fa-search"></i><span class="span-submit">Tìm kiếm</span></span></button>
                  </span>
               </form>
            </div>
         </div>
      </div>
      <div class="clear"></div>
   </div>
</div> <!-- End navigation -->