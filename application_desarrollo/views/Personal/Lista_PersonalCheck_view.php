<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
?>
<div class="container-fluid">
    <?php
    construir_encabezado($Titulo, $Referencia);
    ?>
    <div class="table-responsive">
        <form name="formulario" id="formulario" method="post" >
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
                $i = 0;
                foreach ($objPersonal->arrayPersonal as $personal) {
                    $checked = "";
                    foreach ($objResposanbles->result() as $persona) {
                        if ($personal->idpersona == $persona->idpersona) {
                            $checked = "checked";
                        }
                    }
                    ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="checkbox_registro[<?php print $i; ?>]" id="checkbox_registro[<?php print $i; ?>]" value="<?php print $personal->idpersona; ?>" <?php print $checked; ?>>
                        </td>
                        <td><?php print $personal->identificacion_persona; ?></td>    
                        <td><?php print $personal->nombres_persona; ?></td>    
                        <td><?php print $personal->apellidos_persona; ?></td>
                        <td><?php print $personal->objRegional; ?></td>
                        <td><?php print $personal->celular_persona; ?></td>
                        <td><?php print $personal->correo_electronico_persona; ?></td>

                    </tr>
                    <?php
                    $i++;
                }
                ?>
                <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
                <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
                <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">
                <input type="hidden" name="numPersonal" id="numPersonal" value="<?php print $objPersonal->numPersonal; ?>">

            </table>
            <div class="form-group">        
                <button class="btn btn-primary" name="btn_adicionar" id="btn_adicionar" >Adicionar</button>
            </div>
        </form>
    </div>
</div>