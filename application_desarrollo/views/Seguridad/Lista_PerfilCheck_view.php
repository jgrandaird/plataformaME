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
                <th>Nombre</th>
                <th>Descripci&oacute;n</th>

            </tr>
            <?php
            $i=0;
            $checked="";
            foreach ($objPerfil->arrayPerfil as $perfil) {
                if($arrayPerfilesU[$perfil->idperfil]==1){
                    $checked="checked";
                }
                else{
                    $checked="";
                }
                ?>
                <tr>
                    <td>
                        <input type="checkbox" name="checkbox_registro[<?php print $i; ?>]" id="checkbox_registro[<?php print $i; ?>]" value="<?php print $perfil->idperfil; ?>" <?php print $checked; ?>>

                    </td>
                    <td><?php print $perfil->nombre_perfil; ?></td>    
                    <td><?php print $perfil->descripcion_perfil; ?></td>

                </tr>
                <?php
                $i++;
            }
            ?>
                <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
                <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
                <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">
                <input type="hidden" name="numPerfil" id="numPerfil" value="<?php print $objPerfil->numPerfil; ?>">
                

            </table>
            <div class="form-group">        
                <button class="btn btn-primary" name="btn_adicionar" id="btn_adicionar" >Adicionar</button>
            </div>
        </form>
    </div>
</div>