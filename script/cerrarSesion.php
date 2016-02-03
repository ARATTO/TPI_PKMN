<?php
	//iniciamos la sesión 
	session_name("loginUsuario"); 
	session_start();
	session_destroy();
	$_SESSION["autentificado"] = "NO";
	echo "<script>location.href='../index.php'</script>";
?>