<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);?>
<div class="container-fluid">
    <h2>PERIODOS</h2>
    <h4>PROYECTO:<?php print $nombreProyecto;?></h4>
    <div class="table-responsive">
        <table class="table  table-bordered table-hover table-condensed"><!-- table-striped -->
            <tr class="active">
                <th></th>
                <th>C&oacute;digo</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                
            </tr>
            <?php
            foreach ($objPeriodo->arrayPeriodos as $periodo) {
                ?>
                <tr>
                    <td>
                        <input type="radio" name="radio_registro" id="radio_registro" value="<?php print $periodo->idperiodo; ?>">
                        
                    </td>
                    <td><?php print $periodo->codigo_periodo; ?></td>    
                    <td><?php print $periodo->fecha_inicio_periodo; ?></td>
                    <td><?php print $periodo->fecha_final_periodo; ?></td>
                </tr>
                <?php
            }
            ?>
                <input type="hidden" name="idproyecto" id="idproyecto" value="<?php print $objPeriodo->idproyecto;?>">
                
                <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro;?>">
                <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo;?>">
                <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor;?>">
        </table>
    </div>
</div>