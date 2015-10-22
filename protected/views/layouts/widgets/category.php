<div class="block block-cate first">
   <p class="title">
      <i class="fa fa-tasks"></i>
      Chuyên mục
   </p>
   <div class="block-content">
      <ul class="list-categories">
         <?php 
         
         $categories = Yii::app()->cache->get('categories');
         $categories = false;
         if($categories === false){ 
            $criteria = new CDbCriteria();
            $criteria->order = 'position';
            $categories = Category::model()->findAll($criteria);
            Yii::app()->cache->set('categories',$categories,86400);
         }
         $i = 0;
         foreach($categories as $value){
            $i++; ?>
         <li class="cate-item">
            <i class="sprite icon-<?php echo $i?>"></i>
            <a href="#"><?php echo $value->name;?></a>
         </li>
         <?php }?>
      </ul>
   </div>
</div> <!-- End block-cate -->