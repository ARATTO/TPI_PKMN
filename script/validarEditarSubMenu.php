<?php 
	require("conexion_db.php");
	session_name("loginUsuario"); 
    session_start();

	$nombreSubMenu=$_POST['nombreSubMenu'];
	$Menu=$_POST['Menu'];
	$descSubMenu =$_POST['descSubMenu'];
	$idObtenido = $_SESSION['IdEditar'];

	
    $conn = new mysqli("localhost","root","", "pkmn");

	if( $check_TipoE = $conn->query("CALL sp_gestionarSubMenu(6,'$idObtenido','','','')") ){
		$NombreViejo = $check_TipoE->fetch_row();

	}
	$conn->close();

	$check_User = mysql_query("CALL sp_gestionarSubMenu(2,'','','$nombreSubMenu','')");
	$checkUser = mysql_num_rows($check_User);

	
		if($Menu == -1){
				echo ' <script>alert("Debe seleccionar un Menu")</script> ';
				echo "<script>location.href='../editarSubMenu.php'</script>";
			}
		if($checkUser > 0 && $nombreSubMenu !=  $NombreViejo[2]){
			echo ' <script>alert("Atencion, ya existe el Nombre designado para un SubMenu, digite otro nombre")</script> ';
			echo "<script>location.href='../editarSubMenu.php'</script>";
			
			
		}
		else{
			
			$conn = new mysqli("localhost","root","", "pkmn");
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			    $conn->close();
			} 
			
			$sql = "CALL sp_gestionarSubMenu(3,'$idObtenido','$Menu','$nombreSubMenu','$descSubMenu')";

			if ($conn->query($sql) === TRUE) {
			    echo '<script>alert("SubMenu editado con exito")</script>';
			    echo "<script>location.href='../gestionarSubMenu.php'</script>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
		}	
	
	
?>