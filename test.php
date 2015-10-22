<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Home page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="description" content="Default Description" />
      <meta name="keywords" content="Magento, Varien, E-commerce" />
      <meta name="robots" content="INDEX,FOLLOW" />
      <link rel="icon" href="favicon.ico" type="image/x-icon" />
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
      <link rel="stylesheet" type="text/css" href='/css/font-face.css' />
      <link rel="stylesheet" type="text/css" href="/css/font-awesome.css"/>
      <link rel="stylesheet" type="text/css" href="/css/bootstrap.css"/>
      <link rel="stylesheet" type="text/css" href="/css/owl.carousel.css"/>
      <link rel="stylesheet" type="text/css" href="/css/main.css"/>
      <script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
      <script type="text/javascript" src="/js/jquery.lazy.min.js"></script>
      <script type="text/javascript" src="/js/actions.js"></script>
      <script type="text/javascript" src="/js/functions.js"></script>
      
      
   </head>
   <body>
      <div id="page">
         <div id="header">
            <div class="top">
               <div class="container">
                  <ul class="need">
                     <li class="sell">
                        <a href="#" title="Cần bán">Cần bán</a>
                     </li>
                     <li class="buy">
                        <a href="#" title="Cần mua">Cần mua</a>
                     </li>
                  </ul>
                  <div class="notification">
                     <i class="fa fa-globe"></i>
                     <span class="number">5</span>
                  </div>
                  <ul class="links">
                     <li class="first">
                        <a id="login_link" href="javascript:void(0)" title="Đăng nhập">Đăng nhập</a>
                     </li>
                     <li>
                        <a id="register_link" href="javascript:void(0)" title="Đăng ký">Đăng ký</a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="bottom">
               <div class="container">
                  <h1 class="logo">
                     <a href="/" title="Trang chủ" class="logo">
                        <img src="/images/logo.gif" alt="Magento Commerce"/>
                     </a>
                  </h1>
                  <div class="search-container">
                     <form id="form-search" action="" method="get">                        
                        <input id="address" type="text" placeholder="Nhập vào địa chỉ của bạn để tìm những cửa hàng gần đây" title="Tìm kiếm cửa hàng gần bạn" name="q" class="input-text">
                        <select class="input-select" name="radius" id="radius">
                           <option value="">Bán kính</option>
                           <option value="0">0 - 1km</option>
                           <option value="1">1 - 2km</option>
                           <option value="2">2 - 5km</option>
                           <option value="3">5 - 10km</option>
                           <option value="4">Trên 10km</option>
                        </select>
                        <button type="submit" title="Tìm kiếm" class="button">
                           <i class="fa fa-search"></i>
                           Tìm kiếm
                        </button>
                     </form>
                  </div>
                  <div class="post right">
                     <a href="/post" class="btn btn-danger btn-post">
                        <i class="fa fa-envelope"></i>
                        <span>Đăng tin</span>
                     </a>
                  </div>
                  <div class="clear"></div>
                  <ul class="main-menu">
                     <?php $arr = array(
                        'Thời trang - Phụ kiện',
                        'Điện tử - Điện máy',
                        'Đồ dùng sinh hoạt',
                        'Dịch vụ giải trí',
                        'Nội thất - Ngoại thất',
                        'Sức khỏe - Sắc đẹp',
                        'Khuyến mãi',
                     );?>
                     <?php foreach($arr as $value){
                        $link = '#';?>
                        <li>
                           <a href="<?php echo $link?>"><?php echo $value?></a>
                        </li>
                     <?php }?>
                     
                  </ul>
                  
                  <form class="form-search-2" action="" method="get">
                     <div class="search-item search-category">
                        <select class="input-select" style="width: 166px;height: 32px;" name="category" id="category">
                           <option value="">Danh mục</option>
                           <option value="0">Thời trang - phụ kiện</option>
                           <option value="1">Điện tử - điện máy</option>
                           <option value="2">Đồ dùng sinh hoạt</option>
                           <option value="3">Dịch vụ giải trí</option>
                           <option value="4">Nội thất - ngoại thất</option>
                           <option value="5">Sức khỏe - sắc đẹp</option>
                        </select>
                     </div>
                     <div class="search-item">
                        <input class="input-text" placeholder="Bạn muốn tìm sản phẩm nào ?" style="width:430px;" type="tel" value="" name="keyword" id="keyword">                     
                     </div>
                     <div class="search-item">
                        <input class="input-text" placeholder="Trên phố nào ?" style="width:430px" type="tel" value="" name="street" id="street">                     
                     </div>
                     <button type="submit" title="Tìm kiếm" class="button"><i class="fa fa-search"></i><span class="span-submit">Tìm kiếm</span></button>
                  </form>

               </div>
            </div>
         </div> <!-- End #header -->
         <div id="content">
            <div class="container">
               <div class="left-content">
                  <div class="block block-cate">
                     <p class="title">
                        <i class="fa fa-tasks"></i>
                        Chuyên mục
                     </p>
                     <div class="block-content">
                        <ul class="list-categories">
                           <li class="cate-item">
                              <i class="fa fa-minus-square-o"></i>
                              <a href="#">Thời trang, phụ kiện</a>
                           </li>
                           <li class="cate-item">
                              <i class="fa fa-minus-square-o"></i>
                              <a href="#">Điện tử, điện máy</a>
                           </li>
                           <li class="cate-item">
                              <i class="fa fa-minus-square-o"></i>
                              <a href="#">Đồ dùng sinh hoạt</a>
                           </li>
                           <li class="cate-item">
                              <i class="fa fa-minus-square-o"></i>
                              <a href="#">Dịch vụ, giải trí</a>
                           </li>
                           <li class="cate-item">
                              <i class="fa fa-minus-square-o"></i>
                              <a href="#">Nội thất, ngoại thất</a>
                           </li>
                           <li class="cate-item">
                              <i class="fa fa-minus-square-o"></i>
                              <a href="#">Sức khỏe, sắc đẹp</a>
                           </li>
                           <li class="cate-item">
                              <i class="fa fa-minus-square-o"></i>
                              <a href="#">Thực phẩm, đồ uống</a>
                           </li>
                           <li class="cate-item">
                              <i class="fa fa-minus-square-o"></i>
                              <a href="#">Hoa, quà tặng</a>
                           </li>
                        </ul>
                     </div>
                  </div> <!-- End .block-cate -->
                  <div class="block block-distance">
                     <p class="title">
                        <i class="fa fa-map-marker"></i>
                        <span>Bán kính</span>
                     </p>
                     <div class="block-content">
                        <ul class="list-distance">
                           <li>
                              <i class="fa fa-hand-o-right"></i>
                              <a href="#">0 - 1km</a>
                           </li>
                           <li>
                              <i class="fa fa-hand-o-right"></i>
                              <a href="#">1 - 2km</a>
                           </li>
                           <li>
                              <i class="fa fa-hand-o-right"></i>
                              <a href="#">2 - 5km</a>
                           </li>
                           <li>
                              <i class="fa fa-hand-o-right"></i>
                              <a href="#">5 - 10km</a>
                           </li>
                           <li>
                              <i class="fa fa-hand-o-right"></i>
                              <a href="#">Trên 10km</a>
                           </li>
                        </ul>
                     </div>
                  </div> <!-- End .block-distance -->
                  <div class="block block-filter-price">
                     <p class="title">
                        <i class="fa fa-money"></i>
                        <span>Khoảng giá</span>
                     </p>
                     <div class="block-content">
                        <form action="" method="GET">
                           <input id="from_price" type="text" placeholder="Từ" name="from_price" class="input-text format-currency">
                           <input id="to_price" type="text" placeholder="Đến" name="to_price" class="input-text format-currency">
                           <button type="submit" title="Search" class="button">
                              <span>Tìm</span>
                           </button>
                        </form>
                     </div>
                  </div>
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
         </div> <!-- End #content -->
         <div id="footer">
            <div class="container">
               <address>© 2015 cho102.com. All Rights Reserved.</address>
            </div>
         </div>
      </div>
   </body>
   <script>
   $(function() {
   $("img.lazy-load").lazy({
      effect: "fadeIn",
      effectTime: 1500
   });
   });
   </script>
</html>