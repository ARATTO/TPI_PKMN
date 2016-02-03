<?php 
	require("conexion_db.php");

	$nombreSubMenu=$_POST['nombreSubMenu'];
	$Menu = $_POST['Menu'];
	$descSubMenu=$_POST['descSubMenu'];


	$check_Menu = mysql_query("call sp_gestionarSubMenu(2,'','','$nombreSubMenu','')");
	$checkMenu = mysql_num_rows($check_Menu);

		if($checkMenu > 0){
			echo ' <script>alert("Atencion, ya existe el Nombre designado para el menu, digite otro nombre")</script> ';
			echo "<script>location.href='../registrarSubMenu.php'</script>";
			
		}
		else{
			
			$conn = new mysqli("localhost","root","", "pkmn");
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			    $conn->close();
			} 

			$sql = "call sp_gestionarSubMenu(1,'','$Menu','$nombreSubMenu','$descSubMenu')";

			if ($conn->query($sql) === TRUE) {
			    echo '<script>alert("Menu registrado con exito")</script>';
			    echo "<script>location.href='../registrarSubMenu.php'</script>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
		}	

	
?>