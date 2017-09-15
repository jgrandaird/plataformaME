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


                        <?php
                        $temp = "";
                        $tempLinea = "";
                        $i = 0;
                        foreach ($arrayMacroactividad as $macroactividad) {
                            $indice = $macroactividad->idmacroactividad;
                            if ($temp != $macroactividad->idobjetivo) {
                                ?>
                                <tr>
                                    <td class="warning" colspan="2"><b><?php print $macroactividad->codigo_objetivo; ?>: <?php print $macroactividad->nombre_objetivo; ?></b></td>      
                                </tr>
                                <?php
                            }
                            if ($tempLinea != $macroactividad->idlineaaccion) {
                                ?>
                                <tr>
                                    <td class="success" colspan="2"><?php print $macroactividad->codigo_lineaaccion; ?>. <?php print $macroactividad->nombre_lineaaccion; ?></td>      
                                </tr>
                                <tr>
                                <?php }
                                ?>
                                <td width="50%" >

                                    <div >
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Total <?php print $arrayTotalMacroactividad[$indice]; ?> actividades
                                            </div>
                                            <div class="panel-body">
                                                <p><?php print $macroactividad->codigo_lineaaccion; ?>.<?php print $macroactividad->codigo_macroactividad; ?>. <?php print $macroactividad->nombre_macroactividad; ?></p>
                                            </div>
                                            <div class="panel-footer">


                                                <?php
                                                foreach ($arrayColorMacroactividad[$indice] as $key => $avance) {
                                                    if ($arrayTotalMacroactividad[$indice] > 0) {

                                                        $avanceBarra = ($avance / $arrayTotalMacroactividad[$indice]) * 100;
                                                        ?>


                                                        <div class="list-group-item">
                                                            <a href="#">
                                                                <div>
                                                                    <p>
                                                                        <strong><?php print $objSemaforo->arrayEtiquetaColor[$key];?></strong>
                                                                        <span class="pull-right text-muted"><?php print $avance; ?></span>
                                                                    </p>
                                                                    <div class="progress progress-striped active">
                                                                        <div class="<?php print $objSemaforo->arrayBarraColor[$key]; ?>" role="progressbar" aria-valuenow="<?php print $avanceBarra; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php print $avanceBarra; ?>%">
                                                                            <span class="sr-only">40% Complete (success)</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <?php
                                                    }
                                                }
                                                ?>


                                                <!-- 
                                                
                                                
                                                <div class="list-group-item">
                                                    <a href="#">
                                                        <div>
                                                            <p>
                                                                <strong>Task 1</strong>
                                                                <span class="pull-right text-muted">40% Complete</span>
                                                            </p>
                                                            <div class="progress progress-striped active">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                                    <span class="sr-only">40% Complete (success)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="list-group-item">
                                                    <a href="#">
                                                        <div>
                                                            <p>
                                                                <strong>Task 2</strong>
                                                                <span class="pull-right text-muted">20% Complete</span>
                                                            </p>
                                                            <div class="progress progress-striped active">
                                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                                    <span class="sr-only">20% Complete</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="list-group-item">
                                                    <a href="#">
                                                        <div>
                                                            <p>
                                                                <strong>Task 3</strong>
                                                                <span class="pull-right text-muted">60% Complete</span>
                                                            </p>
                                                            <div class="progress progress-striped active">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                                    <span class="sr-only">60% Complete (warning)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="list-group-item">
                                                    <a href="#">
                                                        <div>
                                                            <p>
                                                                <strong>Task 4</strong>
                                                                <span class="pull-right text-muted">80% Complete</span>
                                                            </p>
                                                            <div class="progress progress-striped active">
                                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                                    <span class="sr-only">80% Complete (danger)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                
                                                -->




                                            </div>
                                        </div>
                                    </div>

                                </td>
    <?php if ($i % 2 === 0 && $i !== 0) { ?>
                                </tr>
                                <tr>
                                    <?php
                                }
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
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>