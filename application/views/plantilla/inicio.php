<html >
    <head>
        <title>Plataforma M&E</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src=" http://code.jquery.com/jquery-1.9.1.js"></script -->

        


        <meta http-equiv="Content-Type" content="application/x-www-form-urlencoded">


        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/css/estilos.css">

    </head>

    <body>
        <!--
        
        <button class="btn btn-primary">Boton</button>-->
        <header >
            <div class="container ">
                <h1>Header</h1>
            </div>
        </header>

        <div class="container">
            <section class="main row">
                <!--
                <aside class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                    <p>
                        <a href="" name="enlace_proyecto" id="enlace_proyecto">
                            Proyectos
                        </a>
                        
                            
                            
                    </p>
                </aside>
                -->

                <div class="navbar-default sidebar col-xs-12 col-sm-4 col-md-3 col-lg-3" role="navigation" >
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Marco L&oacute;gico<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="flot.html">Proyecto</a>
                                    </li>
                                    <li>
                                        <a href="morris.html">Periodos</a>
                                    </li>
                                    <li>
                                        <a href="morris.html">Regionales</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="tables.html"><i class="fa fa-table fa-fw"></i> Personal</a>
                            </li>
                            <li>
                                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Calendario</a>
                            </li>



                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>

                <div name="contenido_principal" id="contenido_principal" class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                
                </div>



            </section>

        </div>

        <footer>
            <div class="container">
                <h3>
                    José Luis Granda
                </h3>
            </div>
        </footer>


        <input type="text" name="ruta_url" value="<?php echo base_url(); ?>" id="ruta_url">

        <script src="<?php print base_url(); ?>bootstrap/js/jquery-1.9.1.min.js"></script>
        <script src="<?php print base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php print base_url(); ?>assets/js/principal.js"></script>
        
        
    </body>
</html>