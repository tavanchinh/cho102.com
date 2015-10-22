$(function(){
   
   $(".selectallrow").click(function(){
      if($(this).hasClass('active'))
      {
         $(this).removeClass('active');   
         $(this).html('Bỏ chọn');      
         $('.check-to-delete span').addClass('checked');
         $('.checkbox-row').attr('checked',true);
      } else {
         $(this).addClass('active');   
         $(this).html('Tất cả');      
         $('.check-to-delete span').removeClass('checked'); 
         $('.checkbox-row').attr('checked',false);        
      }
   });
   
   //Check/Uncheck 
   $('input[type="checkbox"]').click("click",function(){
      if($(this).is(':checked')){
         $(this).parent().addClass('checked');
         $(this).attr('checked', 'checked');
      }else{
         $(this).parent().removeClass('checked');
         $(this).removeAttr('checked');
      }
   });
   //Check all
   $('#select_all').change(function() {
       console.log('ok');
       var checkboxes = $('body').find('.checkbox-row');
       if($(this).is(':checked')) {
           checkboxes.parent().addClass('checked');
           checkboxes.attr('checked', 'checked');
       } else {
           checkboxes.parent().removeClass('checked'); 
           checkboxes.removeAttr('checked');
       }
   });
   //Delete Multi
   $('.mult-delete').click(function(){
      var matches = [];
      $(".checkbox-row:checked").each(function() {
          matches.push(this.value);
          string_cat_id = matches.join(',');
      });
      data = {'id':string_cat_id};
      var updateHTML = function(data){
         if(data != ''){
            alert($.trim(data));
            window.location.reload();
         }
      }
      var beforeSend = function(){
         
      }
      var conf = confirm("Xóa những dòng đã chọn ?");
      if(conf)
         handleAjax('delete.php','POST',data,updateHTML,beforeSend);
   });
   
   
   $(".currency").keyup(function(){
      var num = $(this).val(); 
      var _new  = num.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      if($("#fomat_currency").length == 0)
         $(this).parent().addClass('relative').append('<span id="fomat_currency" class="absolute"></span>');
      $("#fomat_currency").text(_new);
   });
});
