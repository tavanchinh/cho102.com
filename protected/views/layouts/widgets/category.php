<div class="block block-cate first">
   <div class="block-content">
      <ul class="list-categories">
         <?php 
         $categories = Category::model()->getAllParent();
         $i = 1;
         foreach($categories as $value){
            $i++; 
            $sub = Category::model()->getSub($value->id);
            //CVarDumper::dump($sub,10,true);
            ?>
         <li class="cate-item">
            <i class="sprite icon-<?php echo $i?>"></i>
            <a href="#"><?php echo $value->name;?></a>
            <?php if(count($sub) > 0){
                echo '<ul class="sub-menu">';
                foreach($sub as $sub_item){ ?>
                    <li>
                        <a href="#"><?php echo $sub_item->name?></a>
                    </li>
                <?php }
                echo '</ul>';
            }?>
            
         </li>
         <?php }?>
      </ul>
   </div>
</div> <!-- End block-cate -->