<div class="container">
    <?php if (is_null($user_info)) {
        echo CHtml::tag('div', array('class' => 'error-msg', 'style' => 'margin:10px 0;'),
        "Bạn vui lòng đăng nhập trước khi đăng sản phẩm!");
        } else { ?>
    <div class="post-product-wapper">
        <?php if(Yii::app()->user->hasFlash('success')){
            echo CHtml::tag('div', array('class' => 'success-msg'),
                Yii::app()->user->getFlash('success'));
            }?>
        <? ?>
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-form',
            
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
            )); ?>
        <div class="ai-header">
            <span>Thông tin liên hệ</span>
            <span class="header-notice">(Vui lòng cập nhật đầy đủ thông tin)</span>
        </div>
        <ul class="form-list">
            <li class="form-row">
                <?php echo $form->labelEx($user_info, 'name') . ' :' ?>
                <?php echo $user_info->name; ?>
            </li>
            <li class="form-row">
                <?php echo $form->labelEx($user_info, 'phone_number') . ' :' ?>
                <?php echo $user_info->phone_number; ?>
            </li>
            <li class="form-row">
                <?php echo $form->labelEx($user_info, 'email') . ' :' ?>
                <?php echo $user_info->email; ?>
            </li>
            <li class="form-row">
                <?php echo $form->labelEx($user_info, 'address') . ' :' ?>
                <?php echo $user_info->address; ?>
            </li>
        </ul>
        <div class="ai-header">
            <span>Nội dung bài đăng</span>
            <span class="header-notice">(Vui lòng cập nhật đầy đủ thông tin)</span>
        </div>
        <ul class="info-product">
            <li class="form-row">
                <?php echo $form->labelEx($model, 'cat_id') ?>
                <?php
                    $all_cate = Category::model()->getAll();
                    $tree_cate = Category::model()->getTree($all_cate, 0, array('-- Chọn chuyên mục --'));
                    echo $form->dropDownList($model, 'cat_id', $tree_cate);
                    ?>
            </li>
            <li class="form-row">
                <?php echo CHtml::label('Bạn đăng tin', 'Product_type') ?>
                <?php
                    echo $form->radioButtonList($model, 'type', array(
                        0 => 'Cần bán',
                        1 => 'Cần mua',
                        ), array('separator' => '', 'template' => "<div class='left' style='margin-right:15px;'><span>{input}</span><span>{label}</span></div>"));
                    ?>
            </li>
            <li class="form-row">
                <?php echo $form->labelEx($model, 'name') ?>
                <?php
                    echo $form->telField($model, 'name', array('style' => 'width:400px',
                            'placeholder' => 'Tiêu đề bài đăng của bạn'));
                    ?>
            </li>
            <li class="form-row">
                <?php echo $form->labelEx($model, 'des') ?>
                <div class="editor-container" style="float: left;">
                <?php
                    echo $form->textArea($model, 'des', array(
                        'style' => 'width:400px;height:200px;resize:none;border-color: #999;',
                        'placeholder' => 'Hãy mô tả chi tiết sản phẩm bạn muốn rao bằng tiếng Việt có dấu',
                        ));
                    ?>
                </div>
                <div class="clear"></div>
            </li>
            <li class="form-row">
                <?php echo $form->labelEx($model, 'price') ?>
                <?php
                    echo $form->telField($model, 'price', array('style' => 'width:200px', ));
                    ?>
                <span>VNĐ</span>
            </li>
            <li class="form-row">
                <?php echo CHtml::label("Hình ảnh :", "", array('class' =>
                    'left')) ?>
                <div class="box-upload-image">
                    <div class="tip-image">
                        <span>Những tin có ảnh sẽ mang lại hiệu quả cho bạn hơn rất nhiều</span>
                    </div>
                    <ul>
                        <?php for ($i = 1; $i <= 6; $i++) {
                            $img_name = '';
                            $img_src = '';
                            ?>
                        <li class="item-upload relative">
                            <i class="fa fa-picture-o"></i>
                            <input type="file" class="general-input" stt="<?php echo
                                $i ?>" id="general-input-<?php echo
                                $i ?>" multiple="true" value="<?php echo
                                $img_name ?>" />
                            <input type="hidden" class="hidden-input" name="images[]" id="images<?php echo
                                $i ?>" />
                            <div class="absolute preview" style="<?php echo ($img_src !=
                                '') ? 'background-image:url(' . $img_src . ')' : '' ?>">
                                <?php if ($img_src != '')
                                    echo '<i class="fa fa-times-circle"></i>' ?>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </li>
        </ul>
        <?php
            echo CHtml::submitButton('Đăng tin', array('class' => 'btn btn-success', 'style' =>
                    'margin:10px 0 0 105px;'));
            echo CHtml::button('Hủy', array(
                'class' => 'btn',
                'style' => 'margin:10px 0 0 10px;',
                'onclick' => 'window.history.go(-1)'));
            ?>
        <?php $this->endWidget(); ?>
    </div>
    <?php } ?>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ajaxupload.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl.'/ckeditor/ckeditor.js'?>"></script>
<script>
    $(document).ready(function(){
       $(".general-input").ajaxupload({
          urlUpload:'/product/uploadimage'
       });
       
       $("#Product_price").keyup(function(){
          $(this).val(formatNumber($(this).val()));
       });
       
       $(".fa-times-circle").live('click',function(){
          $this = $(this);
          console.log($this.parents(".hidden-input").val());
          $this.parents(".hidden-input").attr('value','');
          $this.parents(".item-upload").find("div.preview").css("background-image","none");
          $this.parents(".item-upload").find(".general-input").val('');       
          $this.parents(".item-upload").find(".general-input").prop("disabled",false);  
          $this.remove();
       });
       
         CKEDITOR.replace('Product_des',{
             height: 200,
             width:650,
             //skin:'moono-dark',
                 toolbar: [
                 { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'] },
                 { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                 { name: 'links', items: ['Link', 'Unlink'] },
             ]
         });
    });
</script>