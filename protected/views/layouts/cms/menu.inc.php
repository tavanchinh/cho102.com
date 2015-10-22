<div id="menu">
   <div class="navigation">
      <?php
         $baseUrl = Yii::app()->request->baseUrl; 
         $arr_modules = array(
               array(  
               'title' => 'Ban quản trị',
               'sub_module' => array(
                  array(
                     'link' => $baseUrl.'/admin/member/admin',
                     'title' => 'Quản lý tài khoản admin',
                  ),
                  array(
                     'link' => $baseUrl.'/admin/membergroup/admin',
                     'title' => 'Quản lý nhóm'
                  ),                                 
                  array(
                     'link' => $baseUrl.'/admin/member/create',
                     'title' => 'Tạo tài khoản'
                  ),
               )),
               array(
               'title' => 'Danh mục',
               'sub_module' => array(
                     array(
                        'link' => $baseUrl.'/admin/category/admin',
                        'title' => 'Quản lý danh mục'
                     ),
               )),
               
               array(
               'title' => 'Tin tức',
               'sub_module' => array(
                     array(
                        'link' => $baseUrl.'/admin/news/admin',
                        'title' => 'Quản lý tin'
                     ),
                     
                     array(
                        'link' => $baseUrl.'/admin/news/create',
                        'title' => 'Đăng tin'
                     ),
               )),
               array(
               'title' => 'Ảnh',
               'sub_module' => array(
                     array(
                        'link' => $baseUrl.'/admin/news/FileManager',
                        'title' => 'Quản lý ảnh'
                     ),
               )),
            );            
      ?>
      <?php foreach($arr_modules as $item){?>
         <li class="openable">
            <a href="javascript:void(0)">
               <span class="text"><?php echo $item['title']?></span>
               <i class="ic-arrow-down caret"></i>
            </a>
            <ul>
               <?php foreach($item['sub_module'] as $menu){?>    
                  <li class="m add_tab">
                  <a href="<?php echo $menu['link']?>">
                  <em class="text"><?php echo $menu['title']?></em>
                  </a>
               </li>  
               <?php }?>
            </ul>
         </li>   
      <?php }?>
   </div><!-- End navigation-->
</div>