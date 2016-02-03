
function validarForm(){
	
	if( document.getElementById("nombreMenu").value != "" ){
		
		if( document.getElementById("descMenu").value != "" ){
			if( document.getElementById("tipoEntrenador").value != "-1" ){
				return true;
			}
			else{
				alert("Debe seleccionar un Perfil");
				return false;
			}
				
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