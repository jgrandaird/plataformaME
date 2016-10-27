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

        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/metisMenu/dist/metisMenu.min.css"/>
        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/css/timeline.css"/>
        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/css/sb-admin-2.css"/>
        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/font-awesome/css/font-awesome.min.css"/>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.min.css' rel='stylesheet'/>
    </head>
    <body>




        <div id="wrapper">


            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>

                    </button>

                    <!-- <div class="navbar-brand"> -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="px"
                         viewBox="0 0 339.996 170" enable-background="new 0 0 339.996 170" xml:space="preserve" width="170px" height="" >
                        <g>
                            <g>
                                <g>
                                    <path fill="#0099CD" d="M27.93,115.344c8.45,0,11.861,4.989,11.861,8.976c0,2.994-1.888,5.671-4.881,7.139
                                          c5.092,1.313,7.611,4.986,7.611,9.186c0,4.093-2.205,10.498-12.649,10.498H9.5v-35.798H27.93z M18.421,129.57h7.62
                                          c3.256,0,4.567-1.998,4.567-3.883c0-1.84-1.311-3.78-4.567-3.78h-7.62V129.57z M18.421,144.582h7.988
                                          c4.933,0,6.665-1.313,6.665-4.41c0-2.625-2.31-4.042-5.459-4.042h-9.194V144.582z"/>
                                    <polygon fill="#0099CD" points="52.76,115.352 61.74,115.352 61.74,143.246 81.498,143.246 81.498,151.142 52.76,151.142 			"/>
                                    <path fill="#0099CD" d="M124.008,148.588v-33.236h-8.977v27.733l-3.197,0.704c-1.624,0.242-4.666,0.484-7.136,0.484
                                          c-4.037,0-6.448-2.05-6.448-7.954v-20.968h-8.978v22.954c0,10.185,7.231,13.44,15.426,13.44c4.58,0,13.042-1.289,16.114-2.25
                                          L124.008,148.588z"/>
                                    <path fill="#0099CD" d="M210.594,114.748c10.363,0,20.153,7.591,20.153,18.501c0,10.904-9.79,18.498-20.153,18.498
                                          c-10.363,0-20.093-7.594-20.093-18.498C190.501,122.339,200.231,114.748,210.594,114.748 M210.594,122.82
                                          c-5.423,0-10.872,4.16-10.872,10.429c0,6.264,5.449,10.421,10.872,10.421c5.484,0,10.873-4.157,10.873-10.421
                                          C221.467,126.979,216.078,122.82,210.594,122.82"/>
                                    <polygon fill="#0099CD" points="282.7,151.142 275.747,151.142 250.065,128.202 250.065,151.142 241.141,151.142 
                                             241.141,115.344 248.774,115.344 273.776,137.233 273.776,115.344 282.7,115.344 			"/>
                                    <polygon fill="#0099CD" points="312.753,151.142 303.835,151.142 303.835,123.245 291.636,123.245 291.636,115.352 
                                             324.952,115.352 324.952,123.245 312.753,123.245 			"/>
                                    <polygon fill="#0099CD" points="172.689,115.348 180.457,115.348 180.457,151.146 171.533,151.146 171.533,128.512 
                                             158.927,139.744 157.563,139.744 144.957,128.512 144.957,151.146 136.034,151.146 136.034,115.348 143.802,115.348 
                                             158.245,128.627 			"/>
                                </g>
                                <polygon fill="#0099CD" points="138.173,87.316 124.678,87.316 187.662,32.553 210.599,52.496 249.955,18.252 329.313,87.316 
                                         315.841,87.316 249.955,29.974 184.063,87.316 170.574,87.316 203.873,58.323 187.639,44.275 		"/>
                            </g>
                            <g>
                                <path fill="#0099CD" d="M317.969,145.01h5.115v0.78h-2.134v5.352h-0.881v-5.352h-2.1V145.01z"/>
                                <path fill="#0099CD" d="M329.68,145.019h0.82v6.124h-0.882v-4.765l-1.883,2.367h-0.162l-1.904-2.367v4.765h-0.877v-6.124h0.83
                                      l2.034,2.515L329.68,145.019z"/>
                            </g>
                        </g>
                    </svg>

                    <!--  </div> -->
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
                                    <strong>See All Alerts</strong>
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
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil de usuario</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuraci&oacute;n</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php print base_url(); ?>Principal/cerrar_sesion"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesi&oacute;n</a>
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
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Buscar">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                </div>
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

                    <div class="col-lg-12">

                        <div name="contenido_principal" id="contenido_principal" > <!-- class="col-xs-12 col-sm-8 col-md-9 col-lg-9" -->

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

            <div id="referenciaScript"></div>
    </body>
</html>

