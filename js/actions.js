$(document).ready(function(){
   $(window).scroll(function () {
     _scrollTop = $(window).scrollTop();
     if (_scrollTop > 157) {
         $(".nav-container").addClass("fiv-nav");
         return false;
     } else {
         $(".nav-container").removeClass("fiv-nav");
         return false;
     }
   });
    
   $('.format-currency').on('keyup', function(e) {
      //e.prentDefault();
      var $this = $(this);
      var fomarted = formatNumber($this.val());
      $this.val(fomarted);
   });
   
   $("#y-to-login").on('click',function(){
      toggle_form(".youama-login-window")
   });
   $("#login_link").on('click',function(){
      toggle_form(".youama-login-window")
   });
   $(".youama-window-outside .close").on('click',function(){
      $(".youama-window").slideUp();
   })
   function toggle_form(elment){
      $form = $(elment);
      $(".youama-window").hide();
      if($form.css('display') != 'none' ){
         $form.slideUp();
      }else{
         $form.slideDown();
      }
   }
   $("#y-to-register").on('click',function(){
      toggle_form(".youama-register-window")
   });
   $("#register_link").on('click',function(){
      toggle_form(".youama-register-window")
   });
   
   
   //Submit register form
   $("#btn_register").click(function(){
      var data = $("#register_form").serialize();
      var url = $("#register_form").attr("action");
      var before_function = function(){
         $(".youama-ajaxlogin-loader").show();
      }
      var success_function = function(result){
         $(".youama-ajaxlogin-loader").hide();
         if(typeof(result.error) != 'undefined'){
            var errors = result.error;
            for(var key in errors){
               var obj = errors[key];
               //console.log(obj);
               $(".err-"+key).text(obj).show();
            }
         }else{
            $(".youama-ajaxlogin-loader").show();
            setTimeout(function(){
               window.location.reload();
            },2000)
         }
         
      }
      handleAjax(url,'POST','json',data,success_function,before_function);
   });
   
   //Submit login form
   $("#btn_login").click(function(){
      if($("#User_email").val() == ""){
         $("#User_email").focus();
         return false;
      }
      if($("#User_password").val() == ""){
         $("#User_password").focus();
         return false;
      }
      var data = $("#login_form").serialize();
      var url = $("#login_form").attr("action");
      var before_function = function(){
         $(".youama-ajaxlogin-loader").show();
      }
      var success_function = function(result){
         $(".youama-ajaxlogin-loader").hide();
         if(typeof(result.error) != 'undefined'){
            $(".err-password").text(result.error).show();
         }else{
            $(".youama-ajaxlogin-loader").show();
            setTimeout(function(){
               window.location.reload();
            },2000)
         }
         
      }
      handleAjax(url,'POST','json',data,success_function,before_function);
   });
   
   
   //Press enter submit form
   
   $("html").keypress(function(e){
      var display_form_login = $(".youama-login-window").css("display");
      if(e.which == 13 && display_form_login == 'none'){
         $("#btn_login").click();
      }
   });
});

