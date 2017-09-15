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
            <table class="table  table-bordered table-hover table-condensed"><!-- table-striped -->
                
<?php
$temp = "";
$tempLinea = "";
foreach ($objMacroactividad->arrayMacroactividad as $macroactividad) {
    $indice = $macroactividad->idmacroactividad;
    if ($temp != $macroactividad->idobjetivo) {
        ?>
                        <tr>
                            <td class="warning"><b><?php print $macroactividad->codigo_objetivo; ?>: <?php print $macroactividad->nombre_objetivo; ?></b></td>      
                        </tr>
        <?php
    }
    if ($tempLinea != $macroactividad->idlineaaccion) {
        ?>
                        <tr>
                            <td class="success"><?php print $macroactividad->nombre_lineaaccion; ?></td>      
                        </tr>
        <?php
    }
    ?>

                    <tr>
                        <td>
                            <div class="row">
<div class="col-lg-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <?php print $macroactividad->nombre_macroactividad; ?>
                                    </div>
                                    <div class="panel-body">
                                        <img src="<?php echo base_url(); ?>img/fotoprueba.jpg" width="200px" height="200px"/>
                                    </div>
                                    <div class="panel-footer">
                                        
                                    </div>
                                </div>
</div>

                            </div>

                        </td>
                    </tr>

    <?php
    $temp = $macroactividad->idobjetivo;
    $tempLinea = $macroactividad->idlineaaccion;
}
?>
                <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
                <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
                <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">

            </table>
        </form>
    </div>
</div>