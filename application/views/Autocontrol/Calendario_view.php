<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
<link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.css' rel='stylesheet' />
<link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.print.css' rel='stylesheet' media='print' />
<link href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.min.css" rel="stylesheet" />

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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Personalizar vista</h4>
            </div>
            <div class="modal-body">

                <label class="control-label" for="lbl_visualizacion_regional">Regional</label>
                <select class="form-control" name="visualizacion_regional" id="visualizacion_regional">
                    <option value="" >-Seleccione-</option>    
                    <option value="1" <?php if ($visualizacion_regional === 1) { ?> selected <?php } ?>>Popayán</option>    
                    <option value="4" <?php if ($visualizacion_regional === 4) { ?> selected <?php } ?>>Florencia</option>    
                    <option value="5" <?php if ($visualizacion_regional === 5) { ?> selected <?php } ?>>Bogotá</option>
                    <option value="9999" <?php if ($visualizacion_regional === 9999) { ?> selected <?php } ?>>Todas las regionales</option>
                </select>
                <label class="control-label" for="lbl_visualizacion_persona">Tipo de visualización</label>
                <select class="form-control" name="visualizacion_persona" id="visualizacion_persona">
                    <option value="" >-Seleccione-</option>
                    <option value="0" <?php if ($visualizacion_persona === 0) { ?>selected<?php } ?>>Todas las actividades</option>    
                    <option value="<?php print $idpersona; ?>" <?php if ($visualizacion_persona === $idpersona) { ?> selected <?php } ?>>Solo mis actividades</option>    
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="buscar_calendario"  data-backdrop="false">Buscar</button> <!-- data-dismiss="modal" -->
                <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    <input type="text" id="buscar_regional" name="buscar_regional"  style="visibility:hidden">
    <input type="text" id="buscar_persona" name="buscar_persona" value="<?php print $buscar_persona; ?>" style="visibility:hidden">


</div>
<div class="modal fade bs-example-modal-lg" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> <!-- <div class="modal fade bs-example-modal-lg" id="myModal4"> -->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div style="position: absolute; right: 600px; top: 0px;z-index: 1000;display:none" id="divcargandomodal">
                    <img src="img/spinner.gif" height="70px" width="70px">
                </div>

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
                                            $i = 0;
                                            foreach ($objPeriodo->arrayPeriodos as $periodo) {
                                                ?>
                                                <li>
                                                    <a href="<?php print $periodo->idperiodo; ?>" id="divperiodo_<?php print $periodo->idperiodo; ?>"><?php print $periodo->codigo_periodo; ?>
                                                    </a>
                                                    <input type="hidden" name="hidden_periodo_<?php print $i; ?>" id="hidden_periodo_<?php print $i; ?>" value="<?php print $periodo->idperiodo; ?>" >
                                                    <input type="hidden" name="nombre_periodo_<?php print $periodo->idperiodo; ?>" id="nombre_periodo_<?php print $periodo->idperiodo; ?>" value="<?php print $periodo->codigo_periodo; ?>" >
                                                </li>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                            <input type="hidden" name="num_periodo" id="num_periodo" value="<?php print $i; ?>" >
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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php print $plan->idperiodo; ?>_<?php print $plan->idobjetivo; ?>">
                            <?php print $plan->nombre_objetivo; ?>
                        </a>
                    </h4>
                </div>
                <div id="collapse_<?php print $plan->idperiodo; ?>_<?php print $plan->idobjetivo; ?>" class="panel-collapse collapse">
                    <div class="panel-body">


                        <?php
                    }

                    if ($tempLinea != $plan->idlineaaccion) {
                        ?>
                        <div class="list-group-item list-group-item-success" ><b><?php print $plan->codigo_lineaaccion; ?>. <?php print $plan->nombre_lineaaccion; ?></b></div>
                    <?php }
                    ?> 


                    <div class="list-group-item" idregional="<?php print $plan->idregional;?>" >
                        <input type="checkbox" value="<?php print $plan->idmacroactividad; ?>"><b>&nbsp;<?php print $plan->codigo_lineaaccion; ?>.<?php print $plan->codigo_macroactividad; ?>.</b> <?php print $plan->nombre_macroactividad; ?>
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
                    <label class="control-label" for="description">Resultado</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="list-group-item">
                    <label class="control-label" for="observaciones_label">Observaciones</label>
                    <textarea class="form-control" id="observaciones" name="observaciones"></textarea>
                </div>
                <div class="list-group-item">
                    <label class="control-label" for="ejecutada">Estado actividad</label>
                    <select class="form-control" id="realizacion" name="realizacion">
                        <option value="Programada">Programada</option>    
                        <option value="Realizada">Realizada</option>    
                        <option value="Cancelada">Cancelada</option>    
                    </select>
                </div>
                <input type="text" id="color" name="color" value="#D9EDF7" style="visibility:hidden" />
                <input type="text" id="textColor" name="textColor" value="#286090" style="visibility:hidden"  />
                <input type="text" name="cadenaPlan" id="cadenaPlan" style="visibility:hidden"/>
                <input type="text" name="idregional" id="idregional" value="<?php print $idregional; ?>" style="visibility:hidden" />
                <input type="text" name="idpersona_propietaria" id="idpersona_propietaria" value="<?php print $idpersona; ?>" style="visibility:hidden"/>
                <input type="text" name="perfil_monitoreo" id="perfil_monitoreo" value="<?php print $this->session->userdata("perfil_monitoreo"); ?>" style="visibility:hidden"/>
                <input type="text" name="idpersona" id="idpersona" style="visibility:hidden" />
                <input type="text" name="idproyecto" id="idproyecto" value="<?php print $idproyecto; ?>" style="visibility:hidden"/>
                <input type="text" name="nombre_usuario" id="nombre_usuario" value="<?php print $this->session->userdata("nombre_usuario"); ?>" style="visibility:hidden"/>
            </form>
        </div><!-- cierra el body -->
    </div><!-- cierra el panel -->
</div><!-- cierra columnas -->

<div class="col-lg-3">


    <form enctype="multipart/form-data" id="formuploadajax" method="post">

        <div class="panel panel-default" >

            <div class="panel-heading">
                Nuevo Soporte
            </div>
            <div class="panel-body" class="col-lg-1" >
                Archivo:
                <input type="file" name="archivo" id="archivo" disabled/>
            </div>
            <div class="panel-body" class="col-lg-1" >
                <button type="submit" class="btn btn-primary" id="subir_soporte" name="subir_soporte" disabled>Subir soporte</button>
            </div>
            <div class="panel-heading" id="panel_visualizar_soportes">
                <a href="#" id="visualizar_soportes" ><span class='glyphicon glyphicon-download-alt' aria-hidden='true'></span>&nbsp;Ver soportes almacenados</a>
            </div>
            <div class="panel-body" class="col-lg-1" id="contenedor_soportes">
                <div id="divsoportes"></div>
            </div>
        </div>

        <input type="text" name="idregional_soporte" id="idregional_soporte" value="<?php print $idregional; ?>" style="visibility:hidden" />
        <input type="text" name="idproyecto_soporte" id="idproyecto_soporte" value="<?php print $idproyecto; ?>" style="visibility:hidden" />
        <input type="text" name="idevento_soporte" id="idevento_soporte" style="visibility:hidden" />
    </form>


</div>
</div> <!-- cierra body de modal-->            
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <input type="checkbox" name="radio_registro" id="radio_registro" style="visibility: hidden"/>
    <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
    <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
    <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">
</div>
</div>
</div>
</div>
</div>