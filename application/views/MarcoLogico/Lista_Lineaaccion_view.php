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
                <th>Nombre</th>
                <th>Descripci&oacute;n</th>
                
            </tr>
            <?php
            foreach ($objLineaaccion->arrayLineaaccion as $lineaaccion) {
                ?>
                <tr>
                    <td>
                        <input type="radio" name="radio_registro" id="radio_registro" value="<?php print $lineaaccion->idlineaaccion; ?>">
                    </td>
                    <td><?php print $lineaaccion->nombre_lineaaccion; ?></td>
                    <td><?php print $lineaaccion->descripcion_lineaaccion; ?></td>
                    

                </tr>
                <?php
            }
            ?>
            <input type="hidden" name="idproyecto" id="idproyecto" value="<?php print $objObjetivo->idproyecto; ?>">
            <input type="hidden" name="idobjetivo" id="idobjetivo" value="<?php print $objLineaaccion->idlineaaccion; ?>">

            <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
            <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
            <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">


        </table>
    </div>
</div>




