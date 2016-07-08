<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
?>
<div class="container-fluid">
    <h2>PROYECTOS</h2>
    <div class="table-responsive">
        <table class="table  table-bordered table-hover table-condensed"><!-- table-striped -->
            <tr class="active">
                <th></th>
                <th>Nombre del proyecto</th>
                <th>C&oacute;digo del proyecto</th>
                <th>Descripci&oacute;n</th>
                <th>Fecha inicial</th>
                <th>Fecha final</th>
                <th>N&uacute;mero periodos de evaluaci&oacute;n</th>
            </tr>
            <?php
            foreach ($objProyecto->arrayProyectos as $proyecto) {
                ?>
                <tr>
                    <td>
                        <input type="radio" name="radio_registro" id="radio_registro" value="<?php print $proyecto->idproyecto; ?>">
                        <!-- 
                        <a href="<?php base_url(); ?>objetivo_proyecto">Objetivos</a>&nbsp;|&nbsp;
                        <a href="<?php base_url(); ?>editar_proyecto">Editar</a>&nbsp;|&nbsp;
                        <a href="<?php base_url(); ?>eliminar_proyecto">Eliminar</a>&nbsp;|&nbsp;
                        
                        -->
                    </td>
                    <td><?php print $proyecto->nombre_proyecto; ?></td>    
                    <td><?php print $proyecto->codigo_proyecto; ?></td>
                    <td><?php print $proyecto->descripcion_proyecto; ?></td>
                    <td><?php print $proyecto->fecha_inicial_proyecto; ?></td>
                    <td><?php print $proyecto->fecha_final_proyecto; ?></td>
                    <td><?php print $proyecto->numero_periodos_proyecto; ?></td>
                </tr>
                <?php
            }
            ?>
            <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
            <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
            <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">

        </table>
    </div>
</div>


