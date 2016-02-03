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
			echo "<script>location.href='../editarSubMenu.php'</script>";
		break;
		
		case 'B':
			$conn = new mysqli("localhost","root","", "pkmn");
			// Check connection
			if ($conn->connect_error) {
			    die("Conexion fallida: " . $conn->connect_error);
			    $conn->close();
			} 

			$sql = "CALL sp_gestionarSubMenu(4,'$id','','','')";

			if ($conn->query($sql) === TRUE) {
			    echo '<script>alert("SubMenu Eliminado con exito")</script>';
			    echo "<script>location.href='../gestionarSubMenu.php'</script>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
		break;
	}
	
?>