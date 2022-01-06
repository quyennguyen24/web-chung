function search(){
   var a= document.getElementById('timkiem');
   if(a.classList.contains('active')){
       a.classList.remove('active')
   }else{
    a.classList.add('active')
   }
}