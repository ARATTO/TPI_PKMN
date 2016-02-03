
function validarForm(){
	var N=0;
	var sel;
	var K=document.getElementById("cantidad").value;
	for (var i = 1; i < K; i++) {
		if( document.getElementById(String("A"+i)).checked){
			sel = document.getElementById(String("A"+i)).value;
			N=1;
		}
		if( document.getElementById(String("B"+i)).checked ){
			sel = document.getElementById(String("B"+i)).value;
			N=1;
		}
	}

	if(N == 1){
		if(confirm("¿Desea Continuar con la transaccion?")){
			document.getElementById("seleccionado").value =  sel;
			//alert(document.getElementById("seleccionado").value);
			return true;	
		}else{
			alert("Transaccion Cancelada");
			return false;		
		}

		
	}else{
		alert("Favor seleccione que desea hacer");
		return false;	
	}

}