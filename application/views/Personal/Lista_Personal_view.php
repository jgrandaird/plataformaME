<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
?>
<div class="container-fluid">
    <h2>PERSONAL</h2>
    <div class="table-responsive">
        <table class="table  table-bordered table-hover table-condensed"><!-- table-striped -->
            <tr class="active">
                <th></th>
                <th>Identificaci&oacute;n</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Regional</th>
                <th>Celular</th>
                <th>Correo electr&oacute;nico</th>

            </tr>
            <?php
            foreach ($objPersonal->arrayPersonal as $personal) {
                ?>
                <tr>
                    <td>
                        <input type="radio" name="radio_registro" id="radio_registro" value="<?php print $personal->idpersona; ?>">
                    </td>
                    <td><?php print $personal->identificacion_persona; ?></td>    
                    <td><?php print $personal->nombres_persona; ?></td>    
                    <td><?php print $personal->apellidos_persona; ?></td>
                    <td><?php print $personal->objRegional; ?></td>
                    <td><?php print $personal->celular_persona; ?></td>
                    <td><?php print $personal->correo_electronico_persona; ?></td>

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