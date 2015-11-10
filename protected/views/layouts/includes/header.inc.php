<?php
    $categories = Yii::app()->cache->get('categories');
    //$categories = false;
    if($categories === false){ 
        $criteria = new CDbCriteria();
        $criteria->order = 'position';
        $criteria->addCondition('parent_id = 0');
        $categories = Category::model()->findAll($criteria);
        Yii::app()->cache->set('categories',$categories,86400);
        //CVarDumper::dump($categories,10,true);die;
    }
   
   
?>
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
         <?php 
         //Check login
         $logged = isset($_COOKIE['logged']) ? json_decode($_COOKIE['logged'],true) : null;
         if($logged != null){
            $user = User::model()->findByAttributes(array(
               'email' => $logged['email'],
               'password' => $logged['password'],
            ));
         }
         if(isset($user) && $user != null){
            Yii::app()->session['user_id'] = $user->id;
            ?>
            <ul class="links">
               <li class="first" >
                  <a href="<?php echo Yii::app()->request->baseUrl.'/profile'?>" ><?php echo $user->name?></a>
               </li>
               <li >
                  <a href="<?php echo Yii::app()->baseUrl.'site/logout'?>" title="Đăng xuất" >Đăng xuất</a>
               </li>
            </ul>
         <?php }else{?>
            <ul class="links">
               <li class="first" >
                  <a id="login_link" href="javascript:void(0)" title="Đăng nhập" >Đăng nhập</a>
               </li>
               <li >
                  <a id="register_link" href="javascript:void(0)" title="Đăng ký" >Đăng ký</a>
               </li>
            </ul>
         <?php }?>
         
         <?php $model = new User();?>
               <div id="header-account" class="skip-content">
                  <?php $form=$this->beginWidget('CActiveForm', array(
                     'id' => 'login_form',
                     'action' => '/site/login',
                  	'enableClientValidation'=>false,
                  	'clientOptions'=>array(
                  		'validateOnSubmit'=>true,
                  	),
                     'htmlOptions' => array(
                        'class' => 'form-horizontal'
                     ),
                  )); ?>
                  <div class="youama-login-window youama-window" style="display: none;">
                     <div class="youama-window-outside">
                        <span class="close">×</span>
                        <div class="youama-window-inside">
                           <div class="youama-window-title">
                              <h3>Đăng nhập</h3>
                           </div>
                           <div class="youama-window-box first">
                              <div class="youama-window-content">
                                 <div class="input-fly youama-showhideme">
                                    <?php echo $form->labelEx($model,'email'); ?>
                              		<?php echo $form->textField($model,'email', array(
                                       'placeholder' => 'Email',
                                    )); ?>                                  
                                 </div>
                                 <div class="input-fly youama-showhideme">
                                    <?php echo $form->labelEx($model,'password'); ?>
                              		<?php echo $form->passwordField($model,'password', array(
                                       'placeholder' => 'Mật khẩu',
                                    )); ?>
                              		<div id="error" class="youama-ajaxlogin-error err-password" style="display: none;"></div>      
                                    
                                 </div>
                              </div>
                           </div>
                           <div class="youama-window-box last">
                              <div class="youama-window-content box-contents box-contents-button youama-showhideme">
                                 <button id="btn_login" type="button" class="button btn-proceed-checkout btn-checkout youama-ajaxlogin-button">
                                    <span>
                                       <span>Đăng nhập</span>
                                    </span>
                                 </button>
                                 <p id="y-to-register" class="yoauam-switch-window">
                                  Bạn chưa có tài khoản ? Đăng ký
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                  </div>
                  <?php $this->endWidget(); ?>
                  <?php $form=$this->beginWidget('CActiveForm', array(
                     'id' => 'register_form',
                     'action' => '/site/register',
                  	'enableClientValidation'=>false,
                  	'clientOptions'=>array(
                  		'validateOnSubmit'=>true,
                  	),
                     'htmlOptions' => array(
                        'class' => 'form-horizontal'
                     ),
                  )); ?>
                  <div class="youama-register-window youama-window" style="display: none;">
                     <div class="youama-window-outside">
                        <span class="close">×</span>
                        <div class="youama-window-inside">
                           <div class="youama-window-title">
                              <h3>
                                 Đăng ký
                              </h3>
                           </div>
                           <div class="youama-window-box first">
                              <div class="youama-window-subtitle youama-showhideme">
                                 <p>Thông tin cá nhân</p>
                              </div>
                              <div class="youama-window-content">
                                 <div class="input-fly youama-showhideme">
                                    <?php echo $form->labelEx($model,'name'); ?>
                              		<?php echo $form->textField($model,'name', array(
                                       'placeholder' => 'Họ tên',
                                       'class' => 'input-fly',
                                    )); ?>
                              		<div id="error" class="youama-ajaxlogin-error err-name" style="display: none;"></div> 
                                 </div>
                                 
                                 <div class="input-fly youama-showhideme">
                                    <?php echo $form->labelEx($model,'gender'); ?>
                              		<?php echo $form->dropDownList($model,'gender',array(1 => 'Nam',0 => 'Nữ'), array(
                                       'class' => 'input-fly',
                                    )); ?>
                              		<?php echo $form->error($model,'gender'); ?>  
                                 </div>
                              </div>
                           </div>
                           <div class="youama-window-box second">
                              <div class="youama-window-subtitle youama-showhideme">
                                 <p>Thông tin đăng nhập</p>
                              </div>
                              <div class="youama-window-content">
                                 <div class="input-fly youama-showhideme">
                                    <?php echo $form->labelEx($model,'email'); ?>
                              		<?php echo $form->textField($model,'email', array(
                                       'placeholder' => 'Email',
                                    )); ?>
                              		<div id="error" class="youama-ajaxlogin-error err-email" style="display: none;"></div>
                                 </div>
                                 <div class="input-fly youama-showhideme">
                                    <?php echo $form->labelEx($model,'password'); ?>
                              		<?php echo $form->passwordField($model,'password', array(
                                       'placeholder' => 'Mật khẩu',
                                       'class' => 'input-fly',
                                    )); ?>
                              		<div id="error" class="youama-ajaxlogin-error err-password" style="display: none;"></div> 
                                 </div>
                                 <div class="input-fly youama-showhideme">
                                    <?php echo $form->labelEx($model,'repeatPassword'); ?>
                              		<?php echo $form->passwordField($model,'repeatPassword', array(
                                       'placeholder' => 'Xác nhận mật khẩu',
                                       'class' => 'input-fly',
                                    )); ?>
                              		<div id="error" class="youama-ajaxlogin-error err-repeatPassword" style="display: none;"></div>
                                 </div>
                              </div>
                           </div>
                           <div class="youama-window-box last">
                              <div class="youama-window-content box-contents youama-showhideme">
                                 <button type="button" id="btn_register" class="button btn-proceed-checkout btn-checkout youama-ajaxlogin-button">
                                 <span>
                                    <span>Đăng ký</span>
                                 </span>
                                 </button>
                                 <p id="y-to-login" class="yoauam-switch-window">
                                   Bạn đã có tài khoản ? Đăng nhập
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php $this->endWidget(); ?>
                  <div class="youama-ajaxlogin-loader"></div>
               </div>
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
            <?php foreach($categories as $value){
               $link = '#';?>
               <li>
                  <a href="<?php echo $link?>"><?php echo $value->name?></a>
               </li>
            <?php }?>
            
         </ul>
         <div class="clear"></div>
         <form class="form-search-2" action="" method="get">
            <div class="search-item search-category">
               <?php 
                  $list_cate = CHtml::listData($categories,'id','name');
                  echo CHtml::dropDownList('category','',$list_cate,array(
                     'style' => 'width:166px;height:32px',
                     'empty' => '--Danh mục--',
                  ));
               ?>
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