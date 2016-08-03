<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
?>
<div class="container-fluid">
    <?php
    construir_encabezado($Titulo, $Referencia);
    ?>

    <div class="table-responsive">
        <table class="table  table-bordered table-hover table-condensed"><!-- table-striped -->
            <tr class="active">
                <th></th>
                <th>C&oacute;digo</th>
                <th>Nombre</th>
                <th>Meses</th>
                <th>Responsable</th>
                <th>Observaciones</th>

            </tr>
            <?php
            $temp = "";
            foreach ($objMacroactividad->arrayMacroactividad as $macroactividad) {
                if ($temp != $macroactividad->idobjetivo) {
                    ?>
                    <tr>
                        <td colspan="6" class="warning"><?php print $macroactividad->nombre_objetivo; ?></td>      
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td>
                            <input type="radio" name="radio_registro" id="radio_registro" value="<?php print $macroactividad->idmacroactividad; ?>">
                        </td>
                        <td><?php print $macroactividad->codigo_macroactividad; ?></td>    
                        <td><?php print $macroactividad->nombre_macroactividad; ?></td>
                        <td>Meses</td>
                        <td>Responsables</td>
                        <td><?php print $macroactividad->descripcion_macroactividad; ?></td>
                    </tr>
                    
                    <?php
                    $temp = $macroactividad->idobjetivo;
                }
                ?>
                <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
                <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
                <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">

        </table>
    </div>
</div>