<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
?>
<div class="container-fluid">
    <?php
    construir_encabezado($Titulo, $Referencia);
    ?>

    <div class="table-responsive">
        <form id="formid" name="formid">

            <div class="panel panel-default">
                <div class="panel-heading">
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
                </div>
                <div class="panel-body">

                    <table class="table  table-bordered table-hover table-condensed"><!-- table-striped -->


                        <tr class="active">

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

                            <th rowspan="2">Actividad</th>


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
                        $i = 0;
                        foreach ($objMacroactividad->arrayMacroactividad as $macroactividad) {
                            $indice = $macroactividad->idmacroactividad;
                            $eventos = $arrayMacroactividadEvento[$indice];
                            $cantidadEventos = count($eventos->result());
                            if ($temp != $macroactividad->idobjetivo) {
                                ?>
                                <tr>
                                    <td style="background-color:yellow" colspan="15"><b><?php print $macroactividad->codigo_objetivo; ?>: <?php print $macroactividad->nombre_objetivo; ?></b></td>      
                                </tr>
                                <?php
                            }
                            if ($tempLinea != $macroactividad->idlineaaccion) {
                                ?>
                                <tr>
                                    <td style="background-color:green;color:#ffffff" colspan="15"><?php print $macroactividad->codigo_lineaaccion; ?>. <?php print $macroactividad->nombre_lineaaccion; ?></td>      
                                </tr>

                                <?php
                            }

                            if ($cantidadEventos > 0) {
                                $rowspan = "rowspan=$cantidadEventos";
                            } else {
                                $rowspan = "";
                            }
                            ?>
                            <tr>
                                <td <?php print $rowspan; ?>>
                                    <?php
                                    print $macroactividad->codigo_lineaaccion . "." . $macroactividad->codigo_macroactividad;
                                    ?>
                                </td>
                                <td width="30%" <?php print $rowspan; ?>>
                                    <?php
                                    print $macroactividad->nombre_macroactividad;
                                    ?>
                                </td>

                                <?php
                                if ($cantidadEventos > 0) {

                                    $j = 0;
                                    foreach ($eventos->result() as $evento) {
                                        $idevento = $evento->id;
                                        $casillaEvento = $arrayCasillaEvento[$indice];
                                        $colorEvento = $arrayColorEvento[$indice];

                                        //Captura el mes y semana a manera de arreglo en que la actividad fue desarrollada
                                        $arrayEjecucion = explode(",", $casillaEvento[$idevento]);
                                        $mesEjecucion = $arrayEjecucion[0];
                                        $semanaEjecucion = $arrayEjecucion[1];

                                        //Recorre los meses
                                        for ($m = intval($objCasilla->mes_inicial); $m < intval($objCasilla->mes_inicial) + $objCasilla->numero_meses; $m++) {

                                            $indiceSemana = $m;
                                            //La semana debe ser de dos cifras. Para los meses menores a 10 se le antepone un cero
                                            if ($m <= 9) {
                                                $indiceSemana = "0" . $m;
                                            }


                                            //El mes debe ser de dos cifras. Para los meses menores a 10 se le antepone un cero
                                            $indiceMes = $m;
                                            if ($m <= 9) {
                                                $indiceMes = "0" . $m;
                                            }

                                            //Recorre las semanas
                                            for ($s = 1; $s <= $objCasilla->arraySemanasxMes[$indiceMes]; $s++) {


                                                $checked = "&nbsp;";
                                                $propiedad = "";
                                                $colorHexadecimal = "";
                                                //Confronta la ejecución del evento dentro de los meses del periodo
                                                if ($m == $mesEjecucion and $s == $semanaEjecucion) {
                                                    $propiedad = $colorEvento[$idevento];
                                                    $colorHexadecimal = $objSemaforo->obtener_color_hexadecimal($propiedad);
                                                    $checked = "<span class='fa fa-check-circle-o' aria-hidden='true' style='color:" . $colorHexadecimal . "'></span>";
                                                }


                                                $clase_celda = "";
                                                foreach ($arrayMesSemana[$macroactividad->idmacroactividad]->result() as $datoMesSemana) {

                                                    if ($datoMesSemana->idmacroactividad == $macroactividad->idmacroactividad and $datoMesSemana->mes == $indiceMes and $datoMesSemana->semana == $s) {
                                                        $checked = "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";
                                                        //$clase_celda = "success";
                                                    }//fa-circle-o  glyphicon glyphicon-ok fa-circle-thin fa fa-square
                                                }
                                                ?>
                                                <td  title="semana <?php print $s; ?> del mes de <?php print $objCasilla->arrayMeses[$indiceSemana]; ?>" style="background-color: <?php print $colorHexadecimal; ?>">
                                                    <?php print $checked; ?>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <td width="70%">
                                            <?php print "[$evento->date]: " . $evento->title . " casilla: " . $casillaEvento[$idevento] . " Color: $colorEvento[$idevento] ES:: $propiedad"; ?>
                                        </td>
                                    </tr>
                                    <?php if ($j < $cantidadEventos - 1) { ?>
                                        <tr>    
                                            <?php
                                        }
                                        $j++;
                                    }
                                } else {
                                    ?>
                                    <?php
                                    //Recorre los meses
                                    $alertaRoja = "FALSE";

                                    for ($m = intval($objCasilla->mes_inicial); $m < intval($objCasilla->mes_inicial) + $objCasilla->numero_meses; $m++) {
                                        //Recorre las semanas
                                        for ($s = 1; $s <= $objCasilla->arraySemanasxMes[$indiceMes]; $s++) {

                                            $checked = "";
                                            foreach ($arrayMesSemana[$macroactividad->idmacroactividad]->result() as $datoMesSemana) {

                                                $indiceSemana = $m;
                                                //La semana debe ser de dos cifras. Para los meses menores a 10 se le antepone un cero
                                                if ($m <= 9) {
                                                    $indiceSemana = "0" . $m;
                                                }


                                                //El mes debe ser de dos cifras. Para los meses menores a 10 se le antepone un cero
                                                $indiceMes = $m;
                                                if ($m <= 9) {
                                                    $indiceMes = "0" . $m;
                                                }

                                                if ($datoMesSemana->idmacroactividad == $macroactividad->idmacroactividad and $datoMesSemana->mes == $indiceMes and $datoMesSemana->semana == $s) {
                                                    $checked = "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";


                                                    if (intval($mesHoy) > intval($datoMesSemana->mes)) {
                                                        $alertaRoja = "TRUE";
                                                    }
                                                    if (intval($mesHoy) == intval($datoMesSemana->mes) and intval($semanaHoy) >= intval($datoMesSemana->semana)) {
                                                        $alertaRoja = "TRUE";
                                                    }
                                                }
                                            }
                                            ?>
                                            <td title="semana <?php print $s; ?> del mes de <?php print $objCasilla->arrayMeses[$indiceSemana]; ?>"><?php print $checked; ?></td>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <td>
                                        <?php if ($alertaRoja === "TRUE") { ?>

                                            <div class="alert alert-danger">
                                                La planeación indica ya tuvo que haber programado actividades 
                                            </div>

                                            <?php }
                                        ?>

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>







                            <?php
                            $temp = $macroactividad->idobjetivo;
                            $tempLinea = $macroactividad->idlineaaccion;
                            $i++;
                        }
                        ?>
                        <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
                        <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
                        <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">
                        <input type="hidden" name="idproyecto" id="idproyecto" value="<?php print $idproyecto; ?>">
                        <input type="hidden" name="rutaModulo" id="rutaModulo" value="<?php print $rutaModulo; ?>">

                    </table>
                </div>
            </div>
        </form>
    </div>
</div>