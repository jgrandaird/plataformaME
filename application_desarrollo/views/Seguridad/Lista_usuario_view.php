<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
?>
<div class="container-fluid">
    <form name="formulario" id="formulario" method="post" >
        <?php
        construir_encabezado($Titulo, $Referencia);
        ?>
        <div class="table-responsive">
            <table class="table  table-bordered table-hover table-condensed"><!-- table-striped -->
                <tr class="active">
                    <th></th>
                    <th>Nombre de usuario</th>
                    <th>Funcionario</th>
                    <th>Perfiles</th>

                </tr>
                <?php
                foreach ($objUsuario->arrayUsuario as $usuario) {
                    ?>
                    <tr>
                        <td>
                            <input type="radio" name="radio_registro" id="radio_registro" value="<?php print $usuario->nombre_usuario; ?>">

                        </td>
                        <td><?php print $usuario->nombre_usuario; ?></td>    
                        <td><?php print $objPersona[$usuario->idpersona]->nombres_persona . " " . $objPersona[$usuario->idpersona]->apellidos_persona; ?></td>
                        <td><?php print $arrayPerfiles[$usuario->nombre_usuario]; ?></td>


                    </tr>
                    <?php
                }
                ?>
                <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
                <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
                <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">
            </table>        
        </div>
    </form>
</div>