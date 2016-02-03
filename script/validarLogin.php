<?php 
	require("conexion_db.php");
	$DesBan = 0;
	$username= $_POST['nombre'];
	$pass = $_POST['pass'];
	//call sp_gestionarEntrenador(2,'','$username','','','','','');
	//call sp_loginNombre('$username')
	$connF = new mysqli("localhost","root","", "pkmn");
	if( $check_Intento = $connF->query("CALL sp_Seguridad(4,'','$username','','','')") ){
		$FechaB = $check_Intento->fetch_row();
	}
	$connF->close();

	$fechaBloqueo = $FechaB[0];
    $ahora = date("Y-n-j H:i:s");  
    //echo "$fechaBloqueo";
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaBloqueo)); 
    //echo "$fechaBloqueo";
    //echo "$tiempo_transcurrido";
    
    if($tiempo_transcurrido > 100){ //Tiempo de bloqueo en seg por intentos fallidos
    		$connDesBloq = new mysqli("localhost","root","", "pkmn");
			
			$sql = "CALL sp_Seguridad(6,'','$username','','','0')";;
			if ($connDesBloq->query($sql) === TRUE) {
			   // echo '<script>alert("Desbloqueado Papu")</script>';					    
			}
			$connDesBloq->close();

			$DesBan = 1;
    }


	$connI = new mysqli("localhost","root","", "pkmn");
	if( $check_Intento = $connI->query("CALL sp_Seguridad(7,'','$username','','','')") ){
		$Bloqueado = $check_Intento->fetch_row();
	}
	$connI->close();

	$Ban = $Bloqueado[0];



	if($Ban == 0 || $DesBan == 1){
				

				$sqlSesion = mysql_query("call sp_gestionarEntrenador(2,'','','$username','','','','','')");

				if($fSesion = mysql_fetch_array($sqlSesion)){
					if($pass == $fSesion['ADMIN_ENTRENADOR']){
						//usuario y contraseña válidos 
					    session_name("loginUsuario"); 
					    //asigno un nombre a la sesión para poder guardar diferentes datos 
					   	session_start(); 
					    // inicio la sesión 
					    $_SESSION["autentificado"]= "SI"; 
					    //defino la sesión que demuestra que el usuario está autorizado 
					    $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s"); 
					    //defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss 
					    $_SESSION["usuario"] = $username;
					    
					    $_SESSION["IdEditar"] ='';
					    
					    $connRInt = new mysqli("localhost","root","", "pkmn");
			
						$sql = "CALL sp_Seguridad(3,'','$username','','','')";;
						if ($connRInt->query($sql) === TRUE) {
			    			//echo '<script>alert("Reiniciado Intentos Papu")</script>';					    
						}
						$connRInt->close();
					    
						echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
						echo "<script>location.href='../admin.php'</script> ";
					

					}

					if($pass==$fSesion['CONTRA_ENTRENADOR']){
						//usuario y contraseña válidos 
					    session_name("loginUsuario"); 
					    //asigno un nombre a la sesión para poder guardar diferentes datos 
					   	session_start(); 
					    // inicio la sesión 
					    $_SESSION["autentificado"]= "SI"; 
					    //defino la sesión que demuestra que el usuario está autorizado 
					    $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s"); 
					    //defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss 
					     $_SESSION["usuario"] = $username;


					     $connRInt = new mysqli("localhost","root","", "pkmn");
			
						$sql = "CALL sp_Seguridad(3,'','$username','','','')";;
						if ($connRInt->query($sql) === TRUE) {
			    			//echo '<script>alert("Reiniciado Intentos Papu")</script>';					    
						}
						$connRInt->close();

					     echo "<script>location.href='../principal.php'</script> ";
						
					}

					if($pass!=$fSesion['CONTRA_ENTRENADOR'] && $pass != $fSesion['ADMIN_ENTRENADOR']){
						//Obtener Intento
							$connI = new mysqli("localhost","root","", "pkmn");
								if( $check_Intento = $connI->query("CALL sp_Seguridad(2,'','$username','','','')") ){
									$Intento = $check_Intento->fetch_row();

								}
							$connI->close();

							$I = $Intento[0];
							//Validar Intento
							$conn = new mysqli("localhost","root","", "pkmn");
							// Check connection
								if ($conn->connect_error) {
								    die("Conexion fallida: " . $conn->connect_error);
								    $conn->close();
								} 
							if($I < 3){
								//echo " $I ";
								$I++;
								//echo " $I ";
								$sql = "CALL sp_Seguridad(1,'','$username','$I','','')";	
								if ($conn->query($sql) === TRUE) {
							     //echo '<script>alert("Intento Agregado")</script>';
							    
								}
							}else{
							$connFechaB = new mysqli("localhost","root","", "pkmn");
							$hoy = date("Y-n-j H:i:s"); 

							$sql = "CALL sp_Seguridad(5,'','$username','','$hoy','')";
								if ($connFechaB->query($sql) === TRUE) {
							    echo '<script>alert("Fecha Bloqueo Agregada")</script>';
							    
								}
							$connFechaB->close();

							$sql = "CALL sp_Seguridad(6,'','$username','','','1')";	
								if ($conn->query($sql) === TRUE) {
							    echo '<script>alert("Usted Esta BLOQUEADO 3 Intentos")</script>';

							    
								}
						}
						$conn->close();


						echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
						echo "<script>location.href='../index.php'</script> ";
					}
				
				}else{
						echo '<script>alert("ESTE USUARIO NO EXISTE, REGISTRATE")</script> ';
						echo "<script>location.href='../index.php'</script>";	
					}
	}else{
		//$bagarang = $tiempo_transcurrido - 100;
		echo '<script>alert("USTED ESTA BLOQUEADO")</script> ';
		echo "<script>location.href='../index.php'</script>";	
	}


	

?>