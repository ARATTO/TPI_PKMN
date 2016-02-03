<?php 
	require("conexion_db.php");

	$nombreMenu=$_POST['nombreMenu'];
	$tipoEntrenador = $_POST['tipoEntrenador'];
	$descMenu=$_POST['descMenu'];


	$check_Menu = mysql_query("call sp_gestionarMenu(2,'','','$nombreMenu','')");
	$checkMenu = mysql_num_rows($check_Menu);

		if($checkMenu > 0){
			echo ' <script>alert("Atencion, ya existe el Nombre designado para el menu, digite otro nombre")</script> ';
			echo "<script>location.href='../registrarMenu.php'</script>";
			
		}
		else{
			
			$conn = new mysqli("localhost","root","", "pkmn");
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			    $conn->close();
			} 

			$sql = "call sp_gestionarMenu(1,'','$tipoEntrenador','$nombreMenu','$descMenu')";

			if ($conn->query($sql) === TRUE) {
			    echo '<script>alert("Menu registrado con exito")</script>';
			    echo "<script>location.href='../registrarMenu.php'</script>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
		}	

	
?>