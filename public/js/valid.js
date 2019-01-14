function trimfield(str) 
{ 
    return str.replace(/^\s+|\s+$/g,''); 
}
function validateForm() {
    var obj1 = document.getElementById('email');
     var obj2 = document.getElementById('area');
         if(trimfield(obj1.value) == '') 
         {      
              alert("Email anda Belum di isi!");
              obj1.focus();
              return false;       
         }
         else if(trimfield(obj2.value) == '')
         {      
               alert("Pesan anda belum di isi!");
               obj2.focus();
               return false;       
        }
         else{
            alert("Email anda "+ obj1.value +" mengirim pesan "+ obj2.value);
            return true;
         }
}