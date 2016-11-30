<!DOCTYPE html>
<html >
    <head>
        <title>Plataforma M&E</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="Content-Type" content="application/x-www-form-urlencoded"/>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/css/bootstrap.min.css"/>
        <LINK REL="SHORTCUT ICON" HREF="img/me.ico" />
        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/metisMenu/dist/metisMenu.min.css"/>
        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/css/timeline.css"/>
        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/css/sb-admin-2.css"/>
        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/font-awesome/css/font-awesome.min.css"/>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.min.css' rel='stylesheet'/>
    </head>
    <body>
        
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0" id="navegacion_principal">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>

                    </button>

                    
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> Nueva notificaci&oacute;n
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>Ver todas las alertas</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-alerts -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?php print $this->session->userdata("idfuncionario");?>" id="enlace_perfil_usuario"><i class="fa <?php print $icono_usuario;?> fa-fw"></i> <?php print $this->session->userdata("nombre_funcionario");?></a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#" id="enlace_cambiar_clave"><i class="fa fa-lock fa-fw"></i> Cambiar clave</a>
                            </li>
                            <li><a href="#" id="enlace_cerrar_sesion"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesi&oacute;n</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                 
                
                
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="divider">
                                
                                <!-- /input-group -->
                            </li>
                            
                            <?php foreach ($objPerfil->result() as $perfil) { ?>
                                <li><!-- fa-print -->
                                    <a href="#"><i class="fa <?php print $perfil->icono_perfil;?> fa-fw"></i> <?php print $perfil->nombre_perfil; ?> <span class="fa arrow"></span></a>
                                    <?php foreach ($arrayPerfil[$perfil->idperfil] as $permiso) { ?>
                                        <ul class="nav nav-second-level">
                                            <li id="menu_lateral_izq">
                                                <a href="#" name="<?php print $permiso->ruta_permiso;?>" id="<?php print $permiso->codigo_permiso;?>"><?php print $permiso->nombre_permiso; ?></a>
                                            </li>
                                        </ul>
                                    <?php }
                                    ?>
                                </li>
                            <?php }
                            ?>
                            
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <div id="page-wrapper">
                <div class="row">
                    <div style="position: absolute; right: 600px; top: 170px;display:none;z-index: 1000" id="divcargando">
                        <img src="img/spinner.gif" height="70px" width="70px">
                    </div>
                    <div class="col-lg-12">
                        <div name="contenido_principal" id="contenido_principal" > <!-- class="col-xs-12 col-sm-8 col-md-9 col-lg-9" -->
                        <img src="img/blumont-logo-original.png" height="397px" width="887px">
                        <!-- <span class="wow zoomIn" style="visibility: visible; animation-duration: 0.3s; animation-delay: 1s; animation-name: zoomIn;" data-wow-delay="1s" data-wow-duration=".3s">COLLABORATE. </span>-->
                        </div>
                        
                    </div>
                </div>
            </div>



        </div>
        <input type="hidden" name="ruta_url" value="<?php echo base_url(); ?>" id="ruta_url">
<script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js'></script>
            <script src="<?php print base_url(); ?>bootstrap/js/jquery-1.9.1.min.js"></script>
            <script src="<?php print base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
            <script src="<?php print base_url(); ?>bootstrap/metisMenu/dist/metisMenu.min.js"></script>
            <script src="<?php print base_url(); ?>bootstrap/js/sb-admin-2.js"></script>
            <script src="<?php print base_url(); ?>assets/js/principal.js"></script>
          
            <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/locales/bootstrap-datepicker.es.min.js'></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/lang-all.js"></script>

<script src='<?php echo base_url();?>assets/js/bootstrap-colorpicker.min.js'></script>
<script src='<?php echo base_url();?>assets/js/bootstrap-timepicker.min.js'></script>

            
    </body>
</html>

