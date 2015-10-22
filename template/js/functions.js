function tabs(obj,tab_item,class_item_content){
   var elm = $(obj).attr('data-link');
   $(class_item_content).addClass('hide');
   $(elm).removeClass('hide');
   $(tab_item).removeClass('active');
   $(obj).addClass('active')
}