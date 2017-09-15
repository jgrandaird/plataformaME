<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login - Plataforma Monitoreo y Evaluaci&oacute;n - Blumont</title>
        <LINK REL="SHORTCUT ICON" HREF="img/me.ico" />
        
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/css/bootstrap.min.css"/>

        <!-- MetisMenu CSS -->
        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/metisMenu/dist/metisMenu.min.css"/>

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/css/sb-admin-2.css"/>

        <!-- Custom Fonts -->
        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/font-awesome/css/font-awesome.min.css"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    
    <body>

        <div class="container">
            
            <div class="row">
                
                <div class="col-md-4 col-md-offset-4">
                    
                    <div class="login-panel panel panel-default">
                    
                        
                        <div class="panel-heading">
                            <h3 class="panel-title">Ingrese su usuario y contraseña</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?php print base_url(); ?>Login/validar_usuario" method="post">
                                <fieldset>
                                    <div class="form-group">
                                    <p class="bg-danger"><?php print $Mensaje;?></p>    
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nombre de usuario" name="nombre_usuario" id="nombre_usuario" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Contraseña" name="clave_usuario" id="clave_usuario" type="password" value="">
                                    </div>
                                    
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Recordarme
                                        </label>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="btn btn-primary" name="btn_guardar" id="btn_guardar" >Ingresar</button>
                                    </div>
                                    
                                    
                                </fieldset>
                            </form>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>

        <script src="<?php print base_url(); ?>bootstrap/js/jquery-1.9.1.min.js"></script>
        <script src="<?php print base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php print base_url(); ?>bootstrap/metisMenu/dist/metisMenu.min.js"></script>
        <script src="<?php print base_url(); ?>bootstrap/js/sb-admin-2.js"></script>

    </body>

</html>
