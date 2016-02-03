/*
$(document).on("ready", function(){
	document.getElementById("log").style.display='block';
	document.getElementById("reg").style.display='none';

});


function Mostrar_Ocultar(){
	var Reg = document.getElementById("reg");
	var Log = document.getElementById("log");

	if(Reg.style.display == 'block') {
      $("#reg").slideDown("slow");
      Reg.style.display = 'none';
   } else {
      $("#reg").slideUp("slow");
      Reg.style.display = 'block';
   }


   if(Log.style.display == 'none') {
      $("#log").slideDown("slow");
      Log.style.display = 'block';
   } else {
       $("#log").slideUp("slow");
      Log.style.display = 'none';

   }
	
}*/



function validarForm(){
      if(document.getElementById("nombre").value != ""){
            if(document.getElementById("pass").value != ""){
                  return true;
            }
            else{
               alert("Debe digitar una Contraseña");
               return false;
            }
      }else{
         alert("Debe digitar un Nombre de Usuario")
         return false;
      }
}



   