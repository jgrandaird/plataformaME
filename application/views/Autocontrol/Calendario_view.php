<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
<link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.css' rel='stylesheet' />
<link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.print.css' rel='stylesheet' media='print' />
<link href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.min.css" rel="stylesheet" />

<!--Habilitar
<script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js'></script>
-->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

<!-- habilitar
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script>
-->

<!--
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/locales/bootstrap-datepicker.es.min.js'></script>
-->

<!--Habilitar

<script src='<?php echo base_url(); ?>assets/js/bootstrap-colorpicker.min.js'></script>
<script src='<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js'></script>

-->
<script src='<?php echo base_url(); ?>assets/js/main.js'></script>


<style>


    .fc th {
        padding: 10px 0px;
        vertical-align: middle;
        background:#F2F2F2;
    }
    .fc-day-grid-event>.fc-content {
        padding: 4px;
    }
    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }
    .error {
        color: #ac2925;
        margin-bottom: 15px;
    }
    .event-tooltip {
        width:150px;
        background: rgba(0, 0, 0, 0.85);
        color:#FFF;
        padding:10px;
        position:absolute;
        z-index:10001;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 11px;

    }
    .modal-header
    {
        background-color: #3A87AD;
        color: #fff;
    }

    @media screen and (min-width: 768px) {

        #myModal4 .modal-dialog  {width:1200px;}

    }
</style>

<?php
//incluir_script($rutaJs);
construir_barra_acciones($Menu);
?>

<div id='calendar'></div>
<div class="modal fade fade bs-example-modal-lg" id="myModal4">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-5">
                        <div class="panel panel-default" id="accordion" >
                            <div class="panel-heading">
                                <span id="nombre_pi">Plan implementaci&oacute;n</span>
                                
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Periodo
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu" id="ulperiodo">
                                            <?php 
                                            $i=0;
                                            foreach ($objPeriodo->arrayPeriodos as $periodo) { ?>
                                            <li>
                                                <a href="<?php print $periodo->idperiodo;?>" id="divperiodo_<?php print $periodo->idperiodo;?>"><?php print $periodo->codigo_periodo; ?>
                                                </a>
                                                <input type="hidden" name="hidden_periodo_<?php print $i;?>" id="hidden_periodo_<?php print $i;?>" value="<?php print $periodo->idperiodo;?>" >
                                                <input type="hidden" name="nombre_periodo_<?php print $periodo->idperiodo;?>" id="nombre_periodo_<?php print $periodo->idperiodo;?>" value="<?php print $periodo->codigo_periodo;?>" >
                                            </li>
                                            <?php 
                                            $i++;
                                            }
                                            ?>
                                            <input type="hidden" name="num_periodo" id="num_periodo" value="<?php print $i;?>" >
                                        </ul>
                                    </div>
                                </div>
                            </div>
<!-- Aqui -->
<!-- Ejemplo -->

                            <?php
                            $tempperiodo = "";
                            $j = 0;
                            foreach ($objPlan->result() as $plan) {
                                if ($tempperiodo != $plan->idperiodo) {
                                    if ($j > 0) {
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>

                <div class="panel-body" id="plan_implementacion_<?php print $plan->idperiodo; ?>" style="display: none">
                    <div class="list-group">
                        <?php
                        $temp = "";
                        $tempLinea = "";
                        $i = 0;
                    }
                    if ($temp != $plan->idobjetivo) {
                        if ($i > 0) {
                            ?>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
            <div class="panel panel-default">
                <div class="panel-heading ">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php print $plan->idperiodo;?>_<?php print $plan->idobjetivo;?>">
                            <?php print $plan->nombre_objetivo; ?>
                        </a>
                    </h4>
                </div>
                <div id="collapse_<?php print $plan->idperiodo;?>_<?php print $plan->idobjetivo;?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php
                        if ($tempLinea != $plan->idlineaaccion) {
                            ?>
                            <div class="list-group-item list-group-item-success" ><?php print $plan->nombre_lineaaccion; ?></div>
                        <?php }
                        ?>

                    <?php }
                    ?>

                    <div class="list-group-item" >
                        <input type="checkbox" value="<?php print $plan->idmacroactividad; ?>">&nbsp;<?php print $plan->nombre_macroactividad; ?>
                    </div>


                    <?php
                    $i++;
                    $j++;
                    $tempperiodo = $plan->idperiodo;
                    $temp = $plan->idobjetivo;
                    $tempLinea = $plan->idlineaaccion;
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Fin ejemplo -->
                            
                            
                            
                        </div>
                    </div>
                

            <!-- panel -->
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Evento
                    </div>
                    <div class="panel-body">
                        <!-- Fin panel-->
                        <div class="error"></div>
                        <form class="form-horizontal" id="crud-form">
                            <div class="list-group-item">

                                <label for="title" class="control-label">Nombre de actividad</label>
                                <textarea class="form-control" id="title" name="title"></textarea>
                                

                            </div>
                            <div class="list-group-item">
                                <label class="control-label" for="time">Hora inicio</label>
                                <div class="input-append bootstrap-timepicker">
                                    <input id="time" name="time" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="list-group-item">
                                <label class="control-label" for="description">Descripción</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <div class="list-group-item">
                                <label class="control-label" for="color">Color</label>
                                <input id="color" name="color" type="text" class="form-control input-md" readonly="readonly" />
                                <span class="help-block">Click para seleccionar color</span>
                            </div>
                            <input type="text" name="cadenaPlan" id="cadenaPlan" style="visibility:hidden"/>
                            <input type="text" name="idregional" id="idregional" value="<?php print $idregional; ?>" style="visibility:hidden"/>
                            <input type="text" name="idpersona" id="idpersona" value="<?php print $idpersona; ?>" style="visibility:hidden"/>
                            <input type="text" name="idproyecto" id="idproyecto" value="<?php print $idproyecto; ?>" style="visibility:hidden"/>
                        </form>
                    </div><!-- cierra el body -->
                </div><!-- cierra el panel -->
            </div><!-- cierra columnas -->

            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Soportes
                    </div>
                    <div class="panel-body" class="col-lg-1">
                        Archivo:
                        <input type="file" name="" id="" />
                    </div>
                </div>
            </div>
        </div> <!-- cierra body de modal-->            
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
</div>
</div>
</div>

