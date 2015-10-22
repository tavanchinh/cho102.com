/*-- Handle Ajax --*/
function handleAjax(url,method,dataType,data,success,beforesend,error){
   if(url != ''){
      if (typeof(method) == 'undefined'){
         method = 'POST'
      }
      if(typeof(beforesend) == 'undefined'){
         beforesend = function(){};
      }
      if(typeof(error) == 'undefined'){
         error = function(){};
      }
      if(typeof(success) == 'undefined'){
         success = function(){};
      }
      $.ajax({
         url:url,
         type:method,
         dataType: dataType,
         data:data,
         beforeSend: beforesend,
         success:success,
         error:error, 
         
      });  
   }
}

function formatNumber(s) {
   if(s == ''){
      return s;
   }
   var n = parseInt(s.replace(/\D/g,''),10);
   var format = n.toLocaleString();
   return format;
  
}