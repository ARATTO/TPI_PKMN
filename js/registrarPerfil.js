
function validarForm(){
	
	if( document.getElementById("nombrePerfil").value != "" ){
		
		if( document.getElementById("descPerfil").value != "" ){
			
				
				return true;
		}
		else{
			alert("Debe escribir una breve descripcion para el Perfil");
			return false;			
		}
	}
	else{
		alert("Debe escribir un Nombre para el Perfil");
		return false;
	}
}