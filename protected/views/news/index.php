<?php
/* @var $this NewsController */

$this->breadcrumbs=array(
	'News',
);
$baseUrl = Yii::app()->request->baseUrl;
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/news.css');
Yii::app()->clientScript->registerCssFile($baseUrl.'/css/owl.carousel.css');
Yii::app()->clientScript->registerCssFile($baseUrl.'/css/owl.theme.css');
Yii::app()->clientScript->registerScriptFile($baseUrl.'/js/owl.carousel.min.js');
?>
<div class="container">
   <div class="main-content">
      <div class="left-content">
         <div class="post-listing">
            <div class="heading">
               <span class="uppercase">Bóng đá Anh</span>
            </div>
            <ul class="list-news">
               <?php $list = array(
                  array('img' => 'img-9.jpg','title' => 'Góc chiến thuật: Arsenal, sơ đồ 4-3-3 và những nhân tố quan trọng'),
                  array('img' => 'img-10.jpg','title' => 'Ivanovic: “Diego Costa chỉ còn một điều cần cải thiện”'),
                  array('img' => 'img-11.jpg','title' => 'AS Roma giận dữ với việc Man Utd theo đuổi Strootman'),
                  array('img' => 'img-12.jpg','title' => 'Thierry Henry tiết lộ lý do từ chối Pháo thủ Arsenal'),
                  array('img' => 'img-9.jpg','title' => 'Ander Herrera nói gì trước nghi án dàn xếp tỉ số?'),
                  array('img' => 'img-10.jpg','title' => 'Juan Mata có quan trọng với Man United?'),
                  array('img' => 'img-11.jpg','title' => 'Mọi người đều ủng hộ Rodgers'),
                  array('img' => 'img-12.jpg','title' => 'Frank de Boer sẵn sàng trở thành HLV của Liverpool'),
                  array('img' => 'img-10.jpg','title' => 'Những cầu thủ “ bất hảo” của HLV Louis Van Gaal'),
                  array('img' => 'img-11.jpg','title' => 'Maradona dùng 4 viên viagra mỗi ngày'),
                  array('img' => 'img-11.jpg','title' => 'Mọi người đều ủng hộ Rodgers'),
               );?>
               <?php
               $i = 0;
               if(count($list_news) > 0){
                  foreach($list_news as $news_item){
                     $i++;
                     $link = News::model()->getDetailLink($news_item->id,$news_item->title);
                     ?>
                     <li class="news-item <?php echo ($i == 1) ? 'large' : 'small'?>">
                        <div class="wapper">
                           <a href="<?php echo $link?>">
                              <?php if($i == 1){?>
                                 <div class="img-wrap relative">
                                    <img src="<?php echo $baseUrl.'/uploads/pictures/news/l_' . $news_item->image?>" />
                                    <div class="title">
                                       <span><?php echo $news_item->title?></span>
                                    </div>
                                 </div>
                              <?php }else{?>
                                 <div class="img-wrap relative">
                                    <img src="<?php echo $baseUrl.'/uploads/pictures/news/m_' . $news_item->image?>" />
                                    <div class="count-view absolute">
                                       <span class="glyphicon glyphicon-eye-open"></span>
                                       <span><?php echo Str::formatNumber($news_item->view)?></span>
                                    </div>
                                 </div>
                                 <div class="title">
                                    <span><?php echo $news_item->title?></span>
                                 </div>
                                 <div class="sapo">
                                    <?php 
                                       $sapo = ($news_item->sapo != '') ? Str::cutString(Str::removeHTML($news_item->sapo),145) : Str::cutString(Str::removeHTML($news_item->content),145);
                                    ?>
                                    <p><?php echo $sapo?></p>
                                 </div>
                              <?php }?>
                              
                              
                           </a>
                        </div>
                     </li>
                  <?php }?>
               <?php }?>
            </ul>
            <?php $pagination->render();?>
         </div>
      </div><!-- End left-content-->
      <div class="right-content" id="right_content">
         <?php $this->renderPartial('//layouts/blocks/right_block_cate');?>
      </div><!-- End right-content-->
   </div>
</div>
