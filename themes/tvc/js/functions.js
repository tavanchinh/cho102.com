function formatNumber(s) {
   if(s == ''){
      return s;
   }
   var n = parseInt(s.replace(/\D/g,''),10);
   var format = n.toLocaleString();
   return format;
  
}