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
            foreach ($objPerfil->arrayPerfil as $perfil) {
                ?>
                <tr>
                    <td>
                        <input type="radio" name="radio_registro" id="radio_registro" value="<?php print $perfil->idperfil; ?>">

                    </td>
                    <td><?php print $perfil->nombre_perfil; ?></td>    
                    <td><?php print $perfil->descripcion_perfil; ?></td>

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