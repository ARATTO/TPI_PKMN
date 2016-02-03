<?php 
	require("conexion_db.php");
	session_name("loginUsuario"); 
    session_start();

	$nombreMenu=$_POST['nombreMenu'];
	$tipoEntrenador=$_POST['tipoEntrenador'];
	$descMenu =$_POST['descMenu'];
	$idObtenido = $_SESSION['IdEditar'];

	
    $conn = new mysqli("localhost","root","", "pkmn");

	if( $check_TipoE = $conn->query("CALL sp_gestionarMenu(6,'$idObtenido','','','')") ){
		$NombreViejo = $check_TipoE->fetch_row();

	}
	$conn->close();

	$check_User = mysql_query("CALL sp_gestionarMenu(2,'','','$nombreMenu','')");
	$checkUser = mysql_num_rows($check_User);

	
		if($tipoEntrenador == -1){
				echo ' <script>alert("Debe seleccionar un Perfil")</script> ';
				echo "<script>location.href='../editarMenu.php'</script>";
			}
		if($checkUser > 0 && $nombreMenu !=  $NombreViejo[2]){
			echo ' <script>alert("Atencion, ya existe el Nombre designado para un Menu, digite otro nombre")</script> ';
			echo "<script>location.href='../editarMenu.php'</script>";
			
			
		}
		else{
			
			$conn = new mysqli("localhost","root","", "pkmn");
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			    $conn->close();
			} 
			
			$sql = "CALL sp_gestionarMenu(3,'$idObtenido','$tipoEntrenador','$nombreMenu','$descMenu')";

			if ($conn->query($sql) === TRUE) {
			    echo '<script>alert("Menu editado con exito")</script>';
			    echo "<script>location.href='../gestionarMenu.php'</script>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
		}	
	
	
?>