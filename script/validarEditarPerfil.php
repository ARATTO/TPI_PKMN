<?php 
	
	session_name("loginUsuario"); 
    session_start();

	$nombrePerfil=$_POST['nombrePerfil'];
	$descPerfil=$_POST['descPerfil'];
	$idObtenido = $_SESSION['IdEditar'];

	$conn = new mysqli("localhost","root","", "pkmn");
	if( $check_TipoEntrenador = $conn->prepare("call sp_gestionarPerfiles(2,'','$nombrePerfil','')") ){
		$check_TipoEntrenador->execute();
		$check_TipoEntrenador->store_result();
		$checkTipoEntrenador = $check_TipoEntrenador->num_rows;	
	}

	$connV = new mysqli("localhost","root","", "pkmn");
	if( $check_TipoE = $connV->query("CALL sp_gestionarPerfiles(6,'$idObtenido','','')") ){
		$NombreViejo = $check_TipoE->fetch_row();

	}
	
	//echo "$checkTipoEntrenador";
		if($checkTipoEntrenador > 0 && $nombrePerfil !=  $NombreViejo[1]){
			echo ' <script>alert("Atencion, ya existe el Nombre designado para un perfil, digite otro nombre")</script> ';
			echo "<script>location.href='../editarPerfil.php'</script>";
			$conn->close();
			$connV->close();
		}
		else{
			
			$conn = new mysqli("localhost","root","", "pkmn");
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			    $conn->close();
			} 

			$sql = "call sp_gestionarPerfiles(3,'$idObtenido','$nombrePerfil','$descPerfil')";

			if ($conn->query($sql) === TRUE) {
			    echo '<script>alert("Perfil Editado con exito")</script>';
			    echo "<script>location.href='../gestionarPerfiles.php'</script>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
		}	

	
?>