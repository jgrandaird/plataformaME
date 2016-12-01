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
                        foreach ($objMacroactividad->arrayMacroactividad as $macroactividad) {
                            $indice = $macroactividad->idmacroactividad;
                            $eventos = $arrayMacroactividadEvento[$indice];
                            $cantidadEventos = count($eventos->result());
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

                            <?php }
                            ?>
                            <tr>
                                <td width="30%">
                                    <?php
                                    print $macroactividad->nombre_macroactividad;
                                    ?>
                                </td>
                                <td width="70%">
                                    <?php foreach ($eventos->result() as $evento) { 
                                        print "- [$evento->date]: ".$evento->title."<br/>"; 
                                    }
                                    ?>
                                </td>


                            </tr>



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