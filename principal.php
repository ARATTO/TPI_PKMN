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
    
    <title>PKMN</title>
    <link rel="stylesheet" href="icono/demo-files/demo.css">
    <link href="css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/jquery-ui-1.7.2.custom.css" />
    <link rel="stylesheet" href="css/principal.css" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/principal.js"></script>
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
                        <a href='principal.php' class="navbar-brand active"><span  class='icon icon-home2'></spam></a>
                        <a href='principal.php' class="navbar-brand active">BIENVENIDO, <?php echo $_SESSION['usuario']; ?></a>
                        <!-- <a href="inicio.html" class="navbar-brand active">INICIO</a> -->
                    </div>
                    <?php 
                    echo "
                    <!-- Inicia Menu -->
                    <div class='collapse navbar-collapse' id='navegacion-lab'>
                    	<ul class='nav navbar-nav'>
                            ";

                                    $User = $_SESSION["usuario"];
                                    
                                    //$consulta="CALL sp_obtenerTipoUsuario";

                                    $connV = new mysqli("localhost","root","", "pkmn");
                                    $check_P = $connV->query("CALL sp_gestionarEntrenador(2,'','','$User','','','','','')");
                                    $perfil = $check_P->fetch_row();
                                    $P = $perfil[1];

                                    $connV->close();

                                    include("script/conexion_db.php");
                                    $consulta="CALL sp_gestionarMenu(7,'','$P','','')";

                                    $result=mysql_query($consulta);
                                    
                                    while($col=mysql_fetch_row($result)){

                                    echo "<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>".$col[2]."<b class='caret'></b></a>
                                             <ul class='dropdown-menu'>";
                                            $M = $col[0];
                                            $connV = new mysqli("localhost","root","", "pkmn");
                                            $check_P = $connV->query("CALL sp_gestionarSubMenu(7,'','$M','','')");
                                            
                                           while( $subMenu = $check_P->fetch_row() ){

                                             echo "<li><a href='#'>".$subMenu[2]."</a></li>";
                                           } 
                                           $connV->close();
                                          
                                        echo "</ul>
                                        </li>";
                        	       }
                                    ?>
                            <li><a href="script/cerrarSesion.php"><span  class='icon icon-cross'> SALIR </span></a></li>
                            
                        </ul>
                    </div>
                    
            </nav>
        </header>
        <!--
        <section class="jumbotron">
        	<div class="container text-center">
            	<img class="animated logo bounceInDown"  src="images/PKMN.png" alt="Chico o Chica">
            </div>
        </section>
        -->

    
        <section class="col-lg-1">

        </section>
        
        <section class="animated col-lg-10 main container bounceInUp">

                	<!-- <img id="dragon" onclick="cambiar()" class="animated dragonair bounceIn"  src="images/Animado1.gif"  >-->
                    
                    <div class="col-lg-12">
                        <div id="carousel-1" class="animated carousel slide hidden-xs bounceInDown" data-ride="carousel" >
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-1" data-slide-to="1"></li>
                                <li data-target="#carousel-1" data-slide-to="2"></li>
                                <li data-target="#carousel-1" data-slide-to="3"></li>
                                <li data-target="#carousel-1" data-slide-to="4"></li>
                            </ol>

                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="images/Carusel1.png" style="border-radius:15px 15px 0px 0px;" class="img-responsive" alt="">
                                    <div class="carousel-caption hidden-xs hidden-sm">
                                        <h3></h3>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="images/Carusel2.png" style="border-radius:15px 15px 0px 0px;" class="img-responsive" alt="">
                                    <div class="carousel-caption hidden-xs hidden-sm">
                                        <h3>ARMA TU EQUIPO</h3>
                                        <p>...</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="images/Carusel3.png" style="border-radius:15px 15px 0px 0px;" class="img-responsive" alt="">
                                    <div class="carousel-caption hidden-xs hidden-sm">
                                        <h3>ATRAPALOS A TODOS</h3>
                                        <p>...</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="images/Carusel4.png" style="border-radius:15px 15px 0px 0px;" class="img-responsive" alt="">
                                    <div class="carousel-caption hidden-xs hidden-sm">
                                        <h3>EVOLUCIONA EN LA COMUNIDAD</h3>
                                        <p>Cada vez somos más on-line</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="images/Carusel5.png" style="border-radius:15px 15px 0px 0px;" class="img-responsive" alt="">
                                    <div class="carousel-caption hidden-xs hidden-sm">
                                        <h3>OFERTAS NAVIDEÑAS</h3>
                                        <p>Descuentos, Eventos Especiales, DLC y más ...</p>
                                    </div>
                                </div>

                            </div>

                            <a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
                                <span class="icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
                                <span class="icon" aria-hidden="true"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                        </div>
                        
                    </div>


                    <br>
                    <hr>
                    

                <section class="col-lg-9 main container">
                    <div class="principal">
                    <hr>
                        <div align="center" class="row">
                            <h2><span class="icon icon-spinner3"><b> NOVEDADES SEMANALES</b></span></h2>
                        </div>
                        

                        <div id="casilla" class="animated col-lg-12 fadeInLeft">
                            <hr>
                            <div class="row">
                                
                                <h1 class="text-center"><span class="icon icon-bookmark"><b> ¡POKKEN TOURNAMENT ESTARA DISPONIBLE EN PRIMAVERA DE 2016!</b></span></a></h1>
                                <center><img src="images/post1.jpg" alt="post1"></image></center>
                                <center>
                                    
                                    <p class="text-justify"> 
                                        
                                        Prepárate para disfrutar de combates épicos con la llegada de Pokkén Tournament en primavera de 2016. Los jugadores que adquieran Pokkén Tournament durante el periodo inicial de lanzamiento recibirán una carta amiibo de Mewtwo Oscuro...
                                        
                                    </p>
                                    
                                </center>
                            </div>
                            <hr>
                        </div>

                        <div id="casilla" class="animated col-lg-12 fadeInLeft">
                            
                            <div class="row">
                                
                                <h1 class="text-center"><span class="icon icon-bookmark"><b> ¡VE LAS AVENTURAS CINEMATICAS DE DIANCE!</b></span></a></h1>
                                <center><img src="images/post2.jpg" alt="post1"></image></center>
                                <center>
                                    
                                    <p class="text-justify"> 
                                        
                                        La película Pokémon Diancie y la crisálida de la destrucción está ahora disponible en el iTunes Store. En esta emocionante aventura de dibujos animados, el Pokémon singular Diancie, que está al mando del mundo subterráneo conocido como el Dominio Diamante, se enfrenta a un dilema...
                                        
                                    </p>
                                    
                                </center>
                            </div>
                            <hr>
                        </div>
                        
                        <div id="casilla" class="animated col-lg-12 fadeInLeft">
                            
                            <div class="row">
                                
                                <h1 class="text-center"><span class="icon icon-bookmark"><b> ¡REVIVE LOS CLASICOS DE POKEMON EN TU CONSOLA VIRTUAL!</b></span></a></h1>
                                <center><img src="images/post3.jpg" alt="post1"></image></center>
                                <center>
                                    
                                    <p class="text-justify"> 
                                        
                                        El año que viene podrás revivir el origen de la saga Pokémon con tres juegos clásicos. El 27 de febrero de 2016, Pokémon Edición Roja, Pokémon Edición Azul y Pokémon Edición Amarilla estarán disponibles para la Consola Virtual de las consolas de la familia Nintendo 3DS. Estos títulos son fieles a los originales y ...
                                        
                                    </p>
                                    
                                </center>
                            </div>
                            <hr>
                        </div>

                        <div id="casilla" class="animated col-lg-12 fadeInLeft">
                            
                            <div class="row">
                                
                                <h1 class="text-center"><span class="icon icon-bookmark"><b> ¡KYOGRE Y GROUDON DOMINARON EN EL COMBATE PRIMIGENIO!</b></span></a></h1>
                                <center><img src="images/post4.jpg" alt="post1"></image></center>
                                <center>
                                    
                                    <p class="text-justify"> 
                                        
                                        El Combate Primigenio brindó una buena oportunidad a los jugadores que estaban buscando algo diferente al formato habitual usado en la Serie de Campeonatos. Este torneo no se alejó demasiado de las reglas que se siguen en los eventos principales, pero la incorporación de Kyogre y Groudon supuso una enorme diferencia en la preparación de los jugadores...
                                        
                                    </p>
                                    
                                </center>
                            </div>
                            <hr>
                        </div>
               
                    
                  
                    
                    <div align="center" class="row">
                            <h2><b> ...</b></h2>
                    </div>
                </section>
                    

            <section class="animated col-lg-3 main container fadeInRight">
                    <div class="lateral">
                    <hr>
                        <center><h2><span class="icon icon-attachment"><b> POKEMON DEL DIA</b></span></h2></center>

                        <hr>
                        
                        <center><h3><b>GENGAR</b></h3></center>
                        <hr>
                        <p class="text-justify">Si alguien ve que su sombra le adelanta de repente en una noche oscura, es muy probable que lo que esté viendo no sea su sombra, sino a un Gengar haciéndose pasar por la misma.
                            <center><img src="images/gengar.png" alt="empresa"  style="border-radius:0px 0px 15px 15px;" width="200px" height="200px" ></image></center>
                        </p>
                        
                        
                        <br>
                        <hr>
                        <div class="row">
                        <center><h3><b>CARACTERISTICAS</b></h3></center>
                        
                        
                        <center><p>Altura: 1,5m</p></center>
                        <center><p>Peso: 40,5kg</p></center>
                        <center><p>Categoria: 40,5kg</p></center>
                        <center><p>Habilidad: Levitacion</p></center>
                        <center><p>Sexo: Macho/Hembra</p></center>

                        
                        </div>
                        
                        <br>
                        <hr>
                        <hr>
                        <center><h2><span class="icon icon-attachment"><b> PREGUNTA PROFESOR OAK</b></span></h2></center>
                        <hr>
                        
                        <center><h3><b>¿QUE PROCEDE RUFIAN?</b></h3></center>
                        <hr>
                        <center><img src="images/Oak.png" alt="empresa"  style="border-radius:15px 15px 15px 15px;" width="200px" height="300px" ></image></center>
                                            
                        
                        
                        <hr>
                        <hr>
                        <center><h2><span class="icon icon-attachment"><b> EVOLUCION DEL DIA</b></span></h2></center>
                        <hr>
                        
                        <center><h3><b>DRAGONITE</b></h3></center>
                        <hr>
                        <center><img src="images/Animado1.gif" alt="empresa"  style="border-radius:15px 15px 15px 15px;" width="250px" height="200px" ></image></center>
                        <br>
                        <hr>
                        <hr>
                        <center><h2><span class="icon icon-attachment"><b> PEOR ENTRENADOR DEL SIGLO</b></span></h2></center>
                        <hr>
                        
                        <center><h3><b>ASH MAYONESA</b></h3></center>
                        <hr>
                        <center><img src="images/ash.png" alt="empresa"  style="border-radius:15px 15px 15px 15px;" width="200px" height="300px" ></image></center>
                        </div>
                        
                    </div>

                    <hr>
                    <hr>
                    <br>
            </section>


        </section>
        
        
        <section class="col-lg-1">

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

