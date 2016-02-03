<?php 
	require("conexion_db.php");
	session_name("loginUsuario"); 
    session_start();

	$Rnombre=$_POST['Rnombre'];
	$Ralias=$_POST['Ralias'];
	$Rsexo=$_POST['Rsexo'];
	$Rrival=$_POST['Rrival'];
	$Rpass=$_POST['Rpass'];
	$Rrpass=$_POST['Rrpass'];
	$RTipoEntrenador =$_POST['RTipoEntrenador'];
	$idObtenido = $_SESSION['IdEditar'];

	
    $conn = new mysqli("localhost","root","", "pkmn");
	if( $check_TipoE = $conn->query("call sp_gestionarEntrenador(6,'$idObtenido','','','','','','','')") ){
		$NombreViejo = $check_TipoE->fetch_row();

	}
	$conn->close();

	$check_User = mysql_query("call sp_gestionarEntrenador(2,'','','$Rnombre','','','','','')");
	$checkUser = mysql_num_rows($check_User);



	if($Rpass == $Rrpass && $Rpass != "" && $Rrpass != ""){
		if($RTipoEntrenador == -1){
				echo ' <script>alert("Debe seleccionar un Tipo de Entrenador")</script> ';
				echo "<script>location.href='../editarEntrenador.php'</script>";
			}
		if($checkUser > 0 && $Rnombre !=  $NombreViejo[2]){
			echo ' <script>alert("Atencion, ya existe el Nombre designado para un usuario, digite otro nombre")</script> ';
			echo "<script>location.href='../editarEntrenador.php'</script>";
			
			
		}
		else{
			
			$conn = new mysqli("localhost","root","", "pkmn");
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			    $conn->close();
			} 
			if($RTipoEntrenador == 1){
				
				$sql = "call sp_gestionarEntrenador(7,'$idObtenido','$RTipoEntrenador','$Rnombre','$Ralias','$Rsexo','$Rrival','','$Rpass')";	
			}else{
				$sql = "call sp_gestionarEntrenador(3,'$idObtenido','$RTipoEntrenador','$Rnombre','$Ralias','$Rsexo','$Rrival','$Rpass','')";	


			}

			if ($conn->query($sql) === TRUE) {
			    echo '<script>alert("Usuario editado con exito")</script>';
			    echo "<script>location.href='../gestionarEntrenador.php'</script>";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
		}	
	}else{
		//echo 'Las contraseñas no coinciden';
		echo ' <script>alert("Las contraseñas no coinciden")</script> ';
		echo "<script>location.href='../editarEntrenador.php'</script>";
	}
	
?>