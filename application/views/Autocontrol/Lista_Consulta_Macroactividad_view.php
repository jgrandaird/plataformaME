<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
?>
<div class="container-fluid">
    <?php
    construir_encabezado($Titulo, $Referencia);
    ?>

	<div class="modal fade" id="myModalBusqueda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

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
                    <option value="1" <?php if ($buscar_regional === 1) { ?> selected <?php } ?>>Popayán</option>    
                    <option value="4" <?php if ($buscar_regional === 4) { ?> selected <?php } ?>>Florencia</option>    
   
                </select>
				<label class="control-label" for="lbl_visualizacion_regional">Periodo</label>
				<select class="form-control" name="visualizacion_periodo" id="visualizacion_periodo">
				<option value="" >-Seleccione-</option>
				<?php
				$i = 0;
                                foreach ($objPeriodo->arrayPeriodos as $periodo) {?>
									<option value="<?php print $periodo->idperiodo;?>" <?php if ($periodo->idperiodo === $idperiodo) { ?> selected <?php } ?>><?php print $periodo->codigo_periodo;?></option>    
                                    
                                    <?php
                                    $i++;
                                }?>
								</select>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="buscar_pi"  data-backdrop="false">Buscar</button> <!-- data-dismiss="modal" -->
                <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    <input type="hidden" id="buscar_regional" name="buscar_regional" value="<?php print $buscar_regional;?>" > <!-- style="visibility:hidden" -->
    


	</div>
	
	
    <div class="table-responsive">
        <form id="formid" name="formid">

            <!-- div class="panel panel-default" -->
                <!-- <div class="panel-heading">
                    
                    &nbsp;

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

                     

                </div> -->
                <div class="panel-body" >

                    <table class="table  table-bordered table-hover table-condensed" id="tablapi"><!-- table-striped -->
                        <tr class="active">
                            <th rowspan="2"></th>
                            <th rowspan="2">C&oacute;digo</th>
                            <th rowspan="2">Nombre</th>
                            <?php
                            $numCeldas = 0;
                            for ($s = intval($objCasilla->mes_inicial); $s < intval($objCasilla->mes_inicial) + $objCasilla->numero_meses; $s++) {
                                $indiceSemana = $s;
                                if ($s <= 9) {
                                    $indiceSemana = "0" . $s;
                                }
                                ?>
                                <th colspan="<?php print $objCasilla->arraySemanasxMes[$indiceSemana]; ?>"><?php print $objCasilla->arrayMeses[$indiceSemana]; ?></th>
                                <?php
                                $numCeldas = $numCeldas + $objCasilla->arraySemanasxMes[$indiceSemana];
                            }
                            ?>

                            <th rowspan="2">Responsable</th>
                            <th rowspan="2">Observaciones</th>

                        </tr>
                        <tr class="active">
                            <?php
                            for ($m = intval($objCasilla->mes_inicial); $m < intval($objCasilla->mes_inicial) + $objCasilla->numero_meses; $m++) {
                                $indiceMes = $m;
                                if ($m <= 9) {
                                    $indiceMes = "0" . $m;
                                }
                                for ($s = 1; $s <= $objCasilla->arraySemanasxMes[$indiceMes]; $s++) {
                                    ?>
                                    <th><?php print $s ?></th>
                                    <?php
                                }
                            }
                            ?>
                        </tr>
                        <?php
                        $temp = "";
                        $tempLinea = "";
                        $rowspan = $numCeldas + 5;
                        foreach ($objMacroactividad->arrayMacroactividad as $macroactividad) {
                            $indice = $macroactividad->idmacroactividad;
                            if ($temp != $macroactividad->idobjetivo) {
                                ?>
                                <tr>
                                    <td colspan="<?php print $rowspan; ?>" class="warning"><b><?php print $macroactividad->codigo_objetivo; ?>: <?php print $macroactividad->nombre_objetivo; ?></b></td>      
                                </tr>
                                <?php
                            }
                            if ($tempLinea != $macroactividad->idlineaaccion) {
                                ?>
                                <tr>
                                    <td colspan="<?php print $rowspan; ?>" class="success"><?php print $macroactividad->codigo_lineaaccion; ?>. <?php print $macroactividad->nombre_lineaaccion; ?></td>      
                                </tr>
                                <?php
                            }
                            ?>

                            <tr>
                                <td>
                                    <input type="radio" name="radio_registro" id="radio_registro" value="<?php print $macroactividad->idmacroactividad; ?>">

                                </td>
                                <td><?php print $macroactividad->codigo_lineaaccion; ?>.<?php print $macroactividad->codigo_macroactividad; ?></td>    
                                <td><?php print $macroactividad->nombre_macroactividad; ?></td>

                                <?php
                                for ($m = intval($objCasilla->mes_inicial); $m < intval($objCasilla->mes_inicial) + $objCasilla->numero_meses; $m++) {

                                    $indiceSemana = $m;
                                    if ($m <= 9) {
                                        $indiceSemana = "0" . $m;
                                    }

                                    $indiceMes = $m;
                                    if ($m <= 9) {
                                        $indiceMes = "0" . $m;
                                    }
                                    for ($s = 1; $s <= $objCasilla->arraySemanasxMes[$indiceMes]; $s++) {
                                        $checked = "";
                                        $clase_celda = "";
                                        foreach ($arrayMesSemana[$macroactividad->idmacroactividad]->result() as $datoMesSemana) {

                                            if ($datoMesSemana->idmacroactividad == $macroactividad->idmacroactividad and $datoMesSemana->mes == $indiceMes and $datoMesSemana->semana == $s) {
                                                $checked = "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";
                                                $clase_celda = "success";
                                            }
                                        }
                                        ?>
                                        <td class="<?php print $clase_celda; ?>" title="semana <?php print $s; ?> del mes de <?php print $objCasilla->arrayMeses[$indiceSemana]; ?>">
                                        <?php print $checked; ?>
                                        </td>
                                        <?php
                                    }
                                }
                                ?>
                                <td><?php print $arregloPersonas[$indice]; ?></td>
                                <td><?php print $macroactividad->descripcion_macroactividad; ?></td>
                            </tr>

                            <?php
                            $temp = $macroactividad->idobjetivo;
                            $tempLinea = $macroactividad->idlineaaccion;
                        }
                        ?>
                        <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
                        <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
                        <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">
                        <input type="hidden" name="idproyecto" id="idproyecto" value="<?php print $idproyecto; ?>">
						<input type="hidden" name="idperiodo" id="idperiodo" value="<?php print $idperiodo; ?>">
						<input type="hidden" name="rutaModulo" id="rutaModulo" value="<?php print $rutaModulo; ?>">
                    </table>

                </div>
            <!-- /div -->
        </form>
    </div>
</div>