
function validarForm(){
	
	if( document.getElementById("nombreSubMenu").value != "" ){
		
		if( document.getElementById("descSubMenu").value != "" ){
			if( document.getElementById("Menu").value != "-1" ){
				return true;
			}
			else{
				alert("Debe seleccionar un Menu");
				return false;
			}
				
		}
		else{
			alert("Debe escribir una breve descripcion para el SubMenu");
			return false;			
		}
	}
	else{
		alert("Debe escribir un Nombre para el SubMenu");
		return false;
	}
}