<div class="container">
    <div class="left-content">
        <?php $this->renderPartial('/layouts/widgets/category')?>
        <?php $this->renderPartial('/layouts/widgets/distance')?>
        <?php $this->renderPartial('/layouts/widgets/price')?>
    </div> <!-- End left-content -->
   
    <div class="right-content">
        <?php 
            $categories = Category::model()->getAllParent();
            foreach($categories as $value){ 
                $sub = Category::model()->getSub($value->id);
                $count = count($sub);
                ?>
                <div class="block-cate-home">
                    <h2 class="cate-parent-title">
                        <a href="#"><?php echo $value->name?></a>
                    </h2>
                    <?php if($count > 0){ 
                        $width = floor(798/$count);
                        ?>
                        <ul class="subcategories-list">
                            <?php foreach($sub as $sub_item){?>
                                <li style="width: <?php echo $width.'px'?>;">
                                    <a title="<?php echo $sub_item->name?>" href="#"><?php echo $sub_item->name?></a>
                                </li>
                            <?php }?>
                        </ul>
                    <?php }?>
                </div>
            <?php }?>
    </div>
</div>
<script>
$(function() {
   $("img.lazy-load").lazy({
      effect: "fadeIn",
      effectTime: 1500
   });
});
</script>