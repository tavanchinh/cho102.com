<div class="main-container">
   <div class="container">
      <div class="account-login">
         <div class="wrapper">
            <div class="info-users-wrapper">
               <div class="col-1">
               <div class="product-users new-users">
                  <div class="content">
                     <h2><strong>Tin của bạn</strong></h2>
                     <ul class="form-list">
                        <li>
                           <a href="#">
                              <i class="fa fa-cart-plus"></i>
                              Đang bán
                              <span class="stats">5</span>
                           </a>
                        </li>
                        
                        <li>
                           <a href="#">
                              <i class="fa fa-cart-arrow-down"></i>
                              Đã mua
                              <span class="stats">8</span>
                           </a>
                        </li>
                        
                        <li>
                           <a href="#">
                              <i class="fa fa-clock-o"></i>
                              Đợi duyệt
                              <span class="stats">2</span>
                           </a>
                        </li>
                        
                        <li>
                           <a href="#">
                              <i class="fa fa-eye-slash"></i>
                              Đã ẩn
                              <span class="stats">1</span>
                           </a>
                        </li>
                        
                     </ul>
                  </div>
               </div>
               </div>
               <div class="col-2">
               <div class="registered-users">
                  <div class="content">
                     <h2><strong>Thông tin cá nhân</strong></h2>
                     <?php $form=$this->beginWidget('CActiveForm', array(
                     	'id'=>'user-form',
                     	// Please note: When you enable ajax validation, make sure the corresponding
                     	// controller action is handling ajax validation correctly.
                     	// There is a call to performAjaxValidation() commented in generated controller code.
                     	// See class documentation of CActiveForm for details on this.
                     	'enableAjaxValidation'=>false,
                     )); ?>
                     <?php if(Yii::app()->user->hasFlash('error')){
                        echo CHtml::tag('div',array(
                           'class' => 'note-msg',
                        ),Yii::app()->user->getFlash('error'));
                     }?>
                     <ul class="form-list">
                        <li>
                           <div class="ai-label"><strong><?php echo $form->labelEx($model,'name')?>:</strong></div>
                           <div class="ai-value"><span><?php echo $model->name;?></span></div>
                           
                           <div class="edit-info hide">
                              <?php echo CHtml::textField('name',$model->name,array(
                                 'class' => 'input-field',
                              ));?>
                              <span class="btn btn-success save-edit">Lưu</span>
                              <span class="btn btn-default cancel-edit">Hủy</span>
                           </div>
                           <div class="can-edit right">
                              <i class="fa fa-pencil"></i>
                              <span>Chỉnh sửa</span>
                           </div>
                        </li>
                        <li>
                           <div class="ai-label"><strong><?php echo $form->labelEx($model,'email')?>:</strong></div>
                           <div class="ai-value"><span><?php echo $model->email;?></span></div>
                           <div class="edit-info hide">
                              <?php echo CHtml::textField('email',$model->email,array(
                                 'class' => 'input-field',
                              ));?>
                              <span class="btn btn-success save-edit">Lưu</span>
                              <span class="btn btn-default cancel-edit">Hủy</span>
                           </div>
                           <div class="can-edit right">
                              <i class="fa fa-pencil"></i>
                              <span>Chỉnh sửa</span>
                           </div>
                        </li>
                        <li>
                           <div class="ai-label"><strong><?php echo $form->labelEx($model,'phone_number')?>:</strong></div>
                           <div class="ai-value"><span><?php echo ($model->phone_number != '') ? $model->phone_number : '<em>Chưa cập nhật</em>';?></span></div>
                           
                           <div class="edit-info hide">
                              
                              <?php echo CHtml::textField('phone_number',$model->phone_number,array(
                                 'class' => 'input-field',
                              ));?>
                              <span class="btn btn-success save-edit">Lưu</span>
                              <span class="btn btn-default cancel-edit">Hủy</span>
                           </div>
                           <div class="can-edit right">
                              <i class="fa fa-pencil"></i>
                              <span>Chỉnh sửa</span>
                           </div>
                        </li>
                        
                        <li>
                           <div class="ai-label"><strong><?php echo $form->labelEx($model,'city_id')?>:</strong></div>
                           <div class="ai-value">
                              <span>
                                 <?php $list_city = CHtml::listData(City::model()->findAll(array("order" => "position ASC")),'id','name');?>
                                 <?php echo isset($list_city[$model->city_id]) ? $list_city[$model->city_id] : '<em>Chưa cập nhật</em>'?>
                              </span>
                           </div>
                           
                           <div class="edit-info hide">
                              <?php echo CHtml::dropDownList('city_id',$model->city_id,$list_city,array(
                                 'empty' => '-- Chọn Tỉnh/TP --',
                                 'class' => 'input-field',
                              ));?>
                              <span class="btn btn-success save-edit">Lưu</span>
                              <span class="btn btn-default cancel-edit">Hủy</span>
                           </div>
                           <div class="can-edit right">
                              <i class="fa fa-pencil"></i>
                              <span>Chỉnh sửa</span>
                           </div>
                        </li>
                        
                        <li>
                           <div class="ai-label"><strong><?php echo $form->labelEx($model,'district_id')?>:</strong></div>
                           <div class="ai-value">
                              <span>
                                 <?php 
                                    $list_province = array();
                                    if($model->city_id > 0){
                                       $list_province = CHtml::listData(Province::model()->findAllByAttributes(
                                       array(
                                          'city_id' =>$model->city_id
                                       ),
                                       array(
                                       'order' => 'name ASC'
                                       )),'id','name');
                                    }
                                    echo (isset($list_province[$model->district_id])) ? $list_province[$model->district_id] : "<em>Chưa cập nhật</em>";
                                    
                                 ?>
                              </span>
                           </div>
                           
                           <div class="edit-info hide">
                              <?php 
                                 echo CHtml::dropDownList('district_id',$model->district_id,$list_province,array(
                                       'empty' => '-- Chọn quận/huyện --',
                                       'class' => 'input-field',
                                    ));
                              ?>
                              <span class="btn btn-success save-edit">Lưu</span>
                              <span class="btn btn-default cancel-edit">Hủy</span>
                           </div>
                           <div class="can-edit right">
                              <i class="fa fa-pencil"></i>
                              <span>Chỉnh sửa</span>
                           </div>
                        </li>
                        
                        <li>
                           <div class="ai-label"><strong><?php echo $form->labelEx($model,'street')?>:</strong></div>
                           <div class="ai-value"><span><?php echo ($model->street != '') ? $model->street : '<em>Chưa cập nhật</em>';?></span></div>
                           
                           <div class="edit-info hide">
                              <?php echo CHtml::telField("street",$model->street,array(
                                 'style' => 'width:200px',
                                 'class' => 'input-field',
                              ));?>
                              <span class="btn btn-success save-edit">Lưu</span>
                              <span class="btn btn-default cancel-edit">Hủy</span>
                           </div>
                           <div class="can-edit right">
                              <i class="fa fa-pencil"></i>
                              <span>Chỉnh sửa</span>
                           </div>
                        </li>
                     </ul>
                     <?php $this->endWidget(); ?>
                     <?php if($rel != null){
                        echo CHtml::link('Quay lại',$rel,array(
                           'class' => 'btn btn-link',
                        ));
                     }?>
                  </div>
               </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
   $(document).ready(function(){
      $(".can-edit").click(function(e){
         e.preventDefault();
         $(this).parent().find(".edit-info").removeClass("hide");
         $(this).parent().find(".ai-value").addClass("hide");
         $(this).addClass("hide");
      });
      
      $(".save-edit").click(function(e){
         $this = $(this);
         e.preventDefault();
         $input = $(this).parents(".edit-info").find(".input-field");
         var key = $input.attr("id");
         var val = $input.val();
         var data = {};
         data[key] = val;
         var success_function = function(data){            
            if(data.error_code == 0){
               $(".edit-info").addClass("hide");
               $this.parents("li").find(".ai-value").removeClass("hide");
               $this.parents("li").find(".ai-value span").html(data.result);
               $this.parents("li").find(".can-edit").removeClass("hide");
            }
         }
         handleAjax('/user/update',"POST","json",data,success_function);
      });
      
      $(".cancel-edit").click(function(e){
         e.preventDefault();
         $(this).parent().addClass("hide");
         $(this).parents(".form-list").find(".ai-value").removeClass("hide");
         $(this).parents(".form-list").find(".can-edit").removeClass("hide");
      });
      $("#city_id").change(function(){
         var city_id = $(this).val();
         if(city_id > 0){
            getDistrictByCity(city_id);
         }
      });
      
   });
   
   function getDistrictByCity(city_id){
      var success_function = function(data){
         $("#district_id").html(data);
      }
      handleAjax('/district/loadDistrictByCity',"POST","",{"city_id":city_id},success_function);
   }
</script>