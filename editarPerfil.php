<?php
    //iniciamos la sesión 
    session_name("loginUsuario"); 
    session_start();
    if ($_SESSION["autentificado"] != "SI") { 
        header("Location: script/cerrarSesion.php");
    }
    //sino, calculamos el tiempo transcurrido   
       $fechaGuardada = $_SESSION["ultimoAcceso"];  
       $ahora = date("Y-n-j H:i:s");  
       $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));    

      //comparamos el tiempo transcurrido   
        if($tiempo_transcurrido >= 1800) //30min = 1800seg
        {   
          echo '<script>alert("¡ATENCION!\n Lo sentimos pero por su seguridad, cerramos su sesion por inactividad.\nFavor Inicie Sesion Nuevamente.")</script> ';
          echo "<script>location.href='script/cerrarSesion.php'</script>";
          //header("Location: script/cerrarSesion.php"); //envío al usuario a la pag. de autenticación   
      //sino, actualizo la fecha de la sesión   
        }else{   
              $_SESSION["ultimoAcceso"] = $ahora;   
        }

?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="icono/demo-files/demo.css">
    <link href="css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/principal.css">
    <link rel="stylesheet" href="css/jquery-ui-1.7.2.custom.css" />

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
     <script src="js/registrarPerfil.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
</head>

<body>
      <header>
          <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
              <div class="container">
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-lab">
                          <span class="sr-only">Desplegar / Ocultar Menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href='admin.php' class="navbar-brand active"><span  class='icon icon-home2'></spam></a>
                        <a href="admin.php" class="navbar-brand active">BIENVENIDO, <?php echo $_SESSION["usuario"];?></a>
                        <!-- <a href="inicio.html" class="navbar-brand active">INICIO</a> -->
                    </div>
                    
                    <!-- Inicia Menu -->
                    <div class="collapse navbar-collapse" id="navegacion-lab">
                       <ul class="nav navbar-nav">
                            
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span  class='icon icon-eye'> PERFILES </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                  <li><a href="registrarPerfil.php"><span  class='icon icon-eye-plus'> REGISTRAR PERFIL </span></a></li>
                                  <li><a href="gestionarPerfiles.php"><span  class='icon icon-eye-minus'> GESTIONAR PERFILES </span></a></li>
                                  
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span  class='icon icon-user'> USUARIOS </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                  <li><a href="registrarEntrenador.php"><span  class='icon icon-user-plus'> REGISTRAR USUARIO </span></a></li>
                                  <li><a href="gestionarEntrenador.php"><span  class='icon icon-user-check'> GESTIONAR USUARIOS </span></a></li>
                                  
                                  
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span  class='icon icon-folder'> MENU </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                  <li><a href="registrarMenu.php"><span  class='icon icon-folder-plus'> REGISTRAR MENU </span></a></li>
                                  <li><a href="gestionarMenu.php"><span  class='icon icon-folder-minus'> GESTIONAR MENUS </span></a></li>
                                  
                                  
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span  class='icon icon-menu'> SUB-MENU </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                  <li><a href="registrarSubMenu.php"><span  class='icon icon-menu3'> REGISTRAR SUB-MENU </span></a></li>
                                  <li><a href="gestionarSubMenu.php"><span  class='icon icon-menu2'> GESTIONAR SUB-MENU </span></a></li>
                                  
                                  
                                </ul>
                            </li>
                            <li><a href="script/cerrarSesion.php"><span  class='icon icon-cross'> SALIR </span></a></li>
                        </ul>
                    
                </div>
            </nav>
        </header>
        
        <section class="jumbotron">
          <div class="container text-center hidden-xs">
              <img class="animated logo bounceInDown"  src="images/PKMN.png" alt="Chico o Chica">
            </div>
        </section>


    
        <section class="col-lg-4">

        </section>
        
        <section class="animated col-lg-4 main container bounceInUp">
               

                        <form role="form" onsubmit="return validarForm()" name="formPerfil" action="script/validarEditarPerfil.php" method="POST">
                                        <center>
                                        <div class="tit"><h2><b>EDITAR PERFIL</b></h2>
                                            <hr>
                                          <fieldset>
                                                <legend>
                                                    <?php
                                                  //Llenar cmb
                                                  include("script/conexion_db.php");
                                                  //$consulta="CALL sp_obtenerTipoUsuario";
                                                  $idObtenido = $_SESSION['IdEditar'];

                                                  $consulta="CALL sp_gestionarPerfiles(6,'$idObtenido','','')";
                                                  $result=mysql_query($consulta);
                                                  
                                                  while($col=mysql_fetch_row($result)){
                                                    
                                                    echo "<!-- Nombre Registro-->
                                                    <div class='row'>
                                                      <div class='col-lg-2'>
                                                      </div>
                                                     <div class='form-group col-lg-8'>
                                                      <tr>
                                                       <td>
                                                         <center><label  class='control-label'>Nombre</label></center>
                                                        </td>
                                                        <td>
                                                         <input class='form-control' style='border-radius:15px;'' type='text' placeholder='Nombre' maxlength='20' name='nombrePerfil' id='nombrePerfil' value='".$col[1]."' />
                                                        </td>
                                                       </tr>
                                                      </div>
                                                      <div class='col-lg-2'>
                                                      </div>
                                                    </div>
                                                    <!-- Alias Registro-->
                                                    <div class='row'>
                                                      <div class='col-lg-2'>
                                                      </div>
                                                     <div class='form-group col-lg-8'>
                                                      <tr>
                                                       <td>
                                                         <center><label class='control-label'>Descripcion</label></center>
                                                        </td>
                                                        <td>
                                                         
                                                         <center><textarea class='form-control' style='border-radius:15px;' placeholder='Introduzca la descripccion...'' name='descPerfil' id='descPerfil' columns='7' rows='5' >".$col[2]."</textarea></center>
                                                        </td>
                                                       </tr>
                                                      </div>
                                                      <div class='col-lg-2'>
                                                      </div>
                                                    </div>";

                                                    }
                                                    ?>
                                                    <center><button class="btn btn-primary btn-lg" name="btn_registro" type="submit">ACTUALIZAR</button></center>
                                                    <br>
                                                    
                                                    </legend>

                                          </fieldset>
                              <br>
                            </center>
                          
                        </form>
                  
        

        </section>
        
        
        <section class="col-lg-4">

        </section>
    
        <section class="col-lg-12">
            
            <br>
            

        </section>
        

        
        
  

            <footer>
                 <div class="container">
                    
                        <div class="piePagina col-xs-12">

                    
                            <section class="row">
                                <br>
                                <hr>
                                <label class="control-label col-xs-6 text-left"><b>DARIO MOTTO</b></label>
                                
                                
                                <label class="control-label col-xs-6 text-right"><b>UES-FIA</b></label>
                            </section>

                            <section class="row">
                                <label class="control-label col-xs-6 text-left"><b>dario_aratto@hotmail.com</b></label>
                                <label class="control-label col-xs-6 text-right"><b>TPI-2015</b></label>
                            
                                
                                
                            </section>
                            

                            <div class="row">
                                <p class="text-justify"> 
                                    <center>
                                        <h2>
                                            <a href="https://www.linkedin.com/" target="_blank"><span class="icon icon-linkedin"></span></a>
                                            <a href="https://www.facebook.com/" target="_blank"><span class="icon icon-facebook2"></span></a>
                                            <a href="https://twitter.com/" target="_blank"><span class="icon icon-twitter2"></span></a>
                                            <a href="https://www.youtube.com/" target="_blank"><span class="icon icon-youtube"></span></a>
                                            <a href="https://www.instagram.com/" target="_blank"><span class="icon icon-instagram"></span></a>
                                        </h2>
                                    </center>
                                    
                                    <br style="color:black;">
                                    <br style="color:black;">
                                </p>                   
                            </div>
                    
                </div>
            </footer>   


    
   
    


</body>
</html>
