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
                <th>Nombre regional</th>
                <th>C&oacute;digo regional</th>
                <th>Pa&iacute;s</th>
                <th>Departamento</th>
                <th>Municipio</th>

            </tr>
            <?php
            foreach ($objRegional->arrayRegionales as $regional) {
                ?>
                <tr>
                    <td>
                        <input type="radio" name="radio_registro" id="radio_registro" value="<?php print $regional->idregional; ?>">



                    </td>
                    <td><?php print $regional->nombre_regional; ?></td>    
                    <td><?php print $regional->codigo_regional; ?></td>
                    <td><?php print $regional->objPais; ?></td>
                    <td><?php print $regional->objDepto; ?></td>
                    <td><?php print $regional->objMunicipio; ?></td>

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