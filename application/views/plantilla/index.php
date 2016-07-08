<html >
    <head>
        <title>Plataforma M&E</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="Content-Type" content="application/x-www-form-urlencoded">

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src=" http://code.jquery.com/jquery-1.9.1.js"></script -->


        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php print base_url(); ?>bootstrap/css/estilos.css">
        <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.min.css' rel='stylesheet'>









    </head>
    <body>
        <!--
        
        <button class="btn btn-primary">Boton</button>-->
        <header >
            <div class="container-fluid ">
                <h1>Header</h1>
            </div>
        </header>
        <div class="container-fluid">
            <section class="main row">

                <aside class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                    <p>
                        <a href="" name="enlace_proyecto" id="enlace_proyecto">
                            Proyectos
                        </a>
                    </p>
                    
                    <p>
                        <a href="" name="enlace_regional" id="enlace_regional">
                            Regionales
                        </a>
                    </p>

                    <p>
                        <a href="" name="enlace_personal" id="enlace_personal">
                            Personal
                        </a>
                    </p>

                    <p>
                        <a href="" name="enlace_planimplementacion" id="enlace_planimplementacion">
                            Plan implementaci&oacute;n
                        </a>
                    </p>
                    
                </aside>


                <div name="contenido_principal" id="contenido_principal" class="col-xs-12 col-sm-8 col-md-9 col-lg-9">

                </div>



            </section>

        </div>
        <footer>
            <div class="container">
                <h3>
                    Footer
                </h3>
            </div>
        </footer>


        <input type="hidden" name="ruta_url" value="<?php echo base_url(); ?>" id="ruta_url">

        <script src="<?php print base_url(); ?>bootstrap/js/jquery-1.9.1.min.js"></script>
        <script src="<?php print base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php print base_url(); ?>assets/js/principal.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/locales/bootstrap-datepicker.es.min.js'></script>
        <div id="referenciaScript"></div>
        
        
    </body>
</html>

