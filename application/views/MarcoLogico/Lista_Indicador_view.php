<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);?>
<div class="container-fluid">
    <h2>INDICADORES</h2>
    <h4>PROYECTO:<?php print $nombreProyecto;?></h4>
    <h4>OBJETIVO:<?php print $nombreObjetivo;?></h4>
    
    <div class="table-responsive">
        <table class="table  table-bordered table-hover table-condensed"><!-- table-striped -->
            <tr class="active">
                <th></th>
                <th>C&oacute;digo</th>
                <th>Nombre</th>
                <th>Descripci&oacute;n</th>
                <th>Meta</th>
                <th>Tipo indicador</th>
                <th>Frecuencia de medici&oacute;n</th>
            </tr>
            <?php
            foreach ($objIndicador->arrayIndicadores as $indicador) {
                ?>
                <tr>
                    <td>
                        <input type="radio" name="radio_registro" id="radio_registro" value="<?php print $indicador->idindicador; ?>">
                    </td>
                    <td><?php print $indicador->codigo_indicador; ?></td>    
                    <td><?php print $indicador->nombre_indicador; ?></td>
                    <td><?php print $indicador->descripcion_indicador; ?></td>
                    <td><?php print $indicador->meta; ?></td>    
                    <td><?php print $indicador->tipo_indicador; ?></td>
                    <td><?php print $indicador->frecuencia_medicion_indicador; ?></td>
    
                    </tr>
                <?php
            }
            ?>
                <input type="hidden" name="idproyecto" id="idproyecto" value="<?php print $objObjetivo->idproyecto;?>">
                <input type="hidden" name="idobjetivo" id="idobjetivo" value="<?php print $objIndicador->idobjetivo;?>">
                
                <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro;?>">
                <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo;?>">
                <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor;?>">
                
                
        </table>
    </div>
</div>




