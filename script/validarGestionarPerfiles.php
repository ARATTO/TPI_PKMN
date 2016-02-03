<?php 
	//require("conexion_db.php");
	session_name("loginUsuario"); 
    session_start();

	$seleccionado=$_POST['seleccionado'];
	list($accion, $id) = split('-', $seleccionado);
	/*
	echo "Primero: $accion";
	echo "Segundo: $id";
	*/

	switch ($accion) {
		case 'E':
			$_SESSION["IdEditar"] = $id;
			echo "<script>location.href='../editarPerfil.php'</script>";
		break;
		
		case 'B':
			$conn = new mysqli("localhost","root","", "pkmn");
			// Check connection
			if ($conn->connect_error) {
			    die("Coneccion fallida: " . $conn->connect_error);
			    $conn->close();
			} 
			if($id == 1){
				echo '<script>alert("Lo sentimos, pero NO esta permitido eliminar el Perfil Administrador")</script>';
			    echo "<script>location.href='../gestionarPerfiles.php'</script>";
			}else{
				$sql = "CALL sp_gestionarPerfiles(4,'$id','','')";	
			}
			

			if ($conn->query($sql) === TRUE) {
			    echo '<script>alert("Perfil Eliminado con exito")</script>';
			    echo "<script>location.href='../gestionarPerfiles.php'</script>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
		break;
	}
	
?>