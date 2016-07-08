<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);?>
<div class="container-fluid">
    <h2>OBJETIVOS</h2>
    <h4>PROYECTO:<?php print $nombreProyecto;?></h4>
    <div class="table-responsive">
        <table class="table  table-bordered table-hover table-condensed"><!-- table-striped -->
            <tr class="active">
                <th></th>
                <th>C&oacute;digo</th>
                <th>Nombre</th>
                <th>Descripci&oacute;n</th>
                
            </tr>
            <?php
            foreach ($objObjetivo->arrayObjetivos as $objetivo) {
                ?>
                <tr>
                    <td>
                        <input type="radio" name="radio_registro" id="radio_registro" value="<?php print $objetivo->idobjetivo; ?>">
                        
                    </td>
                    <td><?php print $objetivo->codigo_objetivo; ?></td>    
                    <td><?php print $objetivo->nombre_objetivo; ?></td>
                    <td><?php print $objetivo->descripcion_objetivo; ?></td>
                </tr>
                <?php
            }
            ?>
                <input type="hidden" name="idproyecto" id="idproyecto" value="<?php print $objObjetivo->idproyecto;?>">
                
                <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro;?>">
                <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo;?>">
                <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor;?>">
        </table>
    </div>
</div>