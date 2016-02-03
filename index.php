<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<html lang="es">
<meta http-equiv="Content-type" content="text/html"charset="UTF-8">
<head>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <title>Bienvenido</title>
    <link rel="stylesheet" href="icono/demo-files/demo.css">
    <link href="css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/principal.css">
    
    <link rel="stylesheet" href="css/jquery-ui-1.7.2.custom.css" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
    <!--[if lt IE 9]>
<script type="text/javascript">
   document.createElement("nav");
   document.createElement("header");
   document.createElement("footer");
   document.createElement("section");
   document.createElement("article");
   document.createElement("aside");
   document.createElement("hgroup");
   <script src='http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js'></script>
   <script src='http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js'></script>
</script>
<![endif]-->
</head>

<body>
    
    
    <section  class="jumbotron">
        <div class="container text-center">
            <img class="animated logo bounceInDown"  src="images/PKMN.png"  >
            <!--<img class="animated logo bounceInDown"  src="images/PKMN.png"  alt="Chico o Chica">-->
        </div>
    </section>
      
    <section >

    <section class="col-lg-4">
      
    </section>
    

            <!--
            <section class="col-lg-2 main container" id="izq" >
                <img class="img-rounded border-radius: 6px" src="images/Oak.png" height="100%" width="100%" alt="Chico o Chica">
            </section>
                -->
            <section class="animated col-lg-4 main container bounceInUp" id="der">                       
                        <form onsubmit="return validarForm()" action="script/validarLogin.php" id="log" method="post">

                         
                            <center>
                            
                                <div class="tit"><h2><b>INICIAR SESION</b></h2>
                                <hr>
                                <!-- Nombre Usuario-->
                                <legend>
                                    
                                    <div class="row ">
                                      <div class="col-lg-3">
                                      </div>
                                          <div class="form-group col-lg-6">
                                              <tr>
                                                  <td>
                                                      <center><label for="nombre" class="control-label">Nombre</label></center>
                                                  </td>

                                                  <td>
                                                      <input class="form-control" style="border-radius:15px;" type="text" placeholder="Nombre o Alias" maxlength="20" id="nombre" name="nombre"/>
                                                  </td>
                                              </tr>
                                          </div>
                                          <div class="col-lg-3">
                                      </div>
                                    </div>
                                    

                                
                                <!-- Contraseña-->
                                    <div class="row">
                                        <div class="col-lg-3">
                                      </div>
                                        <div class="form-group col-lg-6">
                                            <tr>
                                                <td>
                                                    <center><label for="pass" class="control-label">Contraseña</label></center>
                                                </td>

                                                <td>
                                                    <input class="form-control" style="border-radius:15px;" maxlength="20" placeholder="Contraseña" type="password" id="pass" name="pass"/>
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="col-lg-3">
                                      </div>
                                    </div>
                                    <center><button class="btn btn-primary btn-lg center" name="btn_sesion" type="submit">ENTRAR</button></center>
                                    <hr>
                            </legend>
                                </center>
                             </form>
                              
                            
                                    
                        
            </section>

  <section class="col-lg-4">
      
    </section>
    
    <!--
    <section class="col-lg-4">
    </section>
    </section>
    <br>
    <footer class="row">
        <section class="col-lg-4">

        </section>

        <div class="col-lg-4">
            <div class="row">
                <div class="col-xs-6">
                    <label class="control-label" ><b>DARIO MOTTO</b></label>
                </div>
                <div class="col-xs-6 text-right">
                    <label class="control-label"><b>FIA-UES TPI-2015</b></label>
                </div>

            </div>
        </div>

        <section class="col-lg-4">

        </section>
    </footer>
    -->


</body>
</html>
