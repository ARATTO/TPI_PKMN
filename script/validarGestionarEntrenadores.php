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
			echo "<script>location.href='../editarEntrenador.php'</script>";
		break;
		
		case 'B':
			$conn = new mysqli("localhost","root","", "pkmn");
			// Check connection
			if ($conn->connect_error) {
			    die("Coneccion fallida: " . $conn->connect_error);
			    $conn->close();
			} 

			$sql = "CALL sp_gestionarEntrenador(4,'$id','','','','','','','')";

			if ($conn->query($sql) === TRUE) {
			    echo '<script>alert("Usuario Eliminado con exito")</script>';
			    echo "<script>location.href='../gestionarEntrenador.php'</script>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
		break;
	}
	
?>