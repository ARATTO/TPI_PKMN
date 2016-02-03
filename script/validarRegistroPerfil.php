<?php 
	require("conexion_db.php");

	$nombrePerfil=$_POST['nombrePerfil'];
	$descPerfil=$_POST['descPerfil'];


	$check_TipoEntrenador = mysql_query("call sp_gestionarPerfiles(2,'','$nombrePerfil','')");
	$checkTipoEntrenador = mysql_num_rows($check_TipoEntrenador);

		if($checkTipoEntrenador > 0){
			echo ' <script>alert("Atencion, ya existe el Nombre designado para un perfil, digite otro nombre")</script> ';
			echo "<script>location.href='../registrarPerfil.php'</script>";
			
		}
		else{
			
			$conn = new mysqli("localhost","root","", "pkmn");
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			    $conn->close();
			} 

			$sql = "call sp_gestionarPerfiles(1,'','$nombrePerfil','$descPerfil')";

			if ($conn->query($sql) === TRUE) {
			    echo '<script>alert("Perfil registrado con exito")</script>';
			    echo "<script>location.href='../registrarPerfil.php'</script>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
		}	

	
?>