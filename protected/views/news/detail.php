<?php
/* @var $this NewsController */
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/news.css');
$this->breadcrumbs=array(
	'News'=>array('/news'),
	'Detail',
);
$wday = array(0 =>'Chủ nhật',1=>'Thứ hai',2=> 'Thứ ba',3=>'Thứ tư',4=>'Thứ năm',5=>'Thứ sáu',6=>'Thứ 7');

?>
<div class="main-content" id="page-detail-article">
   <div class="container">
      <div class="left-content">
         <div class="left-column">
            <div class="detail-article">
               <h1 class="news-title roboto bold"><?php echo $model->title?></h1>
               <div class="post-time">
                  <?php 
                     $str_time = strtotime($model->create_date);
                  ?>
                  <span><?php echo $wday[date('w',$str_time)] . ', '. date('d/m/Y - H:i',$str_time)?></span>
               </div>
               <div class="content-article">
                  <?php echo $model->content?>
               </div>
            </div>
            <ul class="list-social-button">
               <li class="left">
                  <div class="g-plusone" data-size="medium"></div>
               </li>
               <li class="left">
                  <div class="fb-like" data-href="<?php echo $url_curent?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>   
               </li>
            </ul>
            
            <div class="box-comment">
               <p class="bold heading">Bình luận bằng tài khoản facebook</p>
               <div class="fb-comments" data-href="<?php echo $url_curent?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
               
               <div id="disqus_thread"></div>
               <a style="opacity: 0;" id="count_cmt" href="<?php echo $url_curent?>#disqus_thread"></a>
               <script type="text/javascript">
                  /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                  var disqus_shortname = 'bongda102'; // required: replace example with your forum shortname
                  
                  /* * * DON'T EDIT BELOW THIS LINE * * */
                  (function() {
                  var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                  dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                  (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                  })();
                  
                  
                  /*-- Dem so luot comment  ---*/
                  (function () {
                       var s = document.createElement('script'); s.async = true;
                       s.type = 'text/javascript';
                       s.src = '//' + disqus_shortname + '.disqus.com/count.js';
                       (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
                   } ());
                   
                   
                  
               </script>
               <!--
               <iframe scrolling="no" onload="resizeIframe(this)" id="box_cmt_sys" style="width: 100%;min-height: 185px;" src="/plugin/comment?url=<?php echo $url_curent?>"></iframe>
               -->
            </div>
            <?php if(count($related_news) > 0){?>
               <div class="clear"></div>
               <div class="related-news">
                  <span class="glyphicon glyphicon-tasks left"></span>
                  <p class="caption bold">Tin liên quan</p>
                  <ul class="list-news">
                     <?php foreach($related_news as $item){
                        $link = News::model()->getDetailLink($item->id,$item->title);
                        ?>
                        <li class="news-item">
                           <span class="glyphicon glyphicon-plus"></span>
                           <a href="<?php echo $link?>"><?php echo $item->title?></a>
                        </li>
                     <?php }?>
                     
                  </ul>
               </div>
            <?php }?>
         </div><!-- End left-column-->
         <div class="right-column">
            <div class="hot-news block-small">
               <div class="heading">
                  <span>Tin hot</span>
               </div>
               <?php if(count($top_news) > 0){?>
               <ul class="list-news">
                  <?php 
                  $i = 0;
                  foreach($top_news as $key=>$value){
                     $i++;
                     $link = News::model()->getDetailLink($value->id,$value->title);                        
                     ?>
                     <li class="news-item">
                        <a href="<?php echo $link?>">
                           <div class="title">
                              <span title=""><?php echo $value->title;?></span>
                           </div>
                        </a>
                     </li>
                  <?php 
                     unset($top_news[$key]);
                     if($i == 10) break;
                  }?>
               </ul>
               <?php }?>
            </div>
         </div><!-- End right-column-->
         <div class="clear"></div>
      </div><!-- End left-content-->
      <div class="right-content" id="right_content">
         <?php $this->renderPartial('/layouts/blocks/right_block_cate')?>
      </div><!-- End right-content-->
   </div>
</div>
<script>
   function resizeIframe(obj) {
      obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
   }
   $(document).ready(function(){
      $("#fb-cmt").removeClass("active");
      $('#tab-comment a').click(function (e) {
         e.preventDefault();
         var aria_controls = $(this).attr("aria-controls"); 
         $(".tab-pane").removeClass("active");
         $(".presentation").removeClass("active");
         $("#"+aria_controls).addClass("active");
         $(this).parent().addClass("active");
        
      })
      
      //Đếm số comment và like
      var data = {'id':'<?php echo $model->id?>'};
      function count_cmt_like() {
       setTimeout(function () {
           $.ajax({
               url: "<?php echo Yii::app()->request->baseUrl?>/news/SocialPlugin",
               type: "POST",
               data: data
           });
       }, 1101);
      }
      count_cmt_like();
      
      setTimeout(function(){
         var count_cmt = $("#count_cmt").text();
         console.log(parseInt());
      },
      2000)
   });
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=174176739397727&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'vi'}
</script>