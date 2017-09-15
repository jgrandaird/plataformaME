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
                <th>Ruta</th>

            </tr>
            <?php
            foreach ($objPermiso->arrayPermiso as $permiso) {
                ?>
                <tr>
                    <td>
                        <input type="radio" name="radio_registro" id="radio_registro" value="<?php print $permiso->idpermiso; ?>">

                    </td>
                    <td><?php print $permiso->nombre_permiso; ?></td>    
                    <td><?php print $permiso->descripcion_permiso; ?></td>
                    <td><?php print $permiso->ruta_permiso; ?></td>

                </tr>
                <?php
            }
            ?>
            <input type="hidden" name="idperfil" id="idperfil" value="<?php print $objPermiso->idperfil; ?>">
                
            <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
            <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
            <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">
        </table>
    </div>
</div>