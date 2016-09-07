<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
construir_encabezado($Titulo, $Referencia);
?>
<div class="container-fluid">
    <form name="formulario" id="formulario" method="post" >
        <div class="form-group">

            <label for="lbl_nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre_perfil" id="nombre_perfil" value="<?php print $objRegistro->nombre_perfil; ?>">
        </div>    
        <div class="form-group">
            <label for="lbl_codigo">Descipci&oacute;n</label>
            <textarea class="form-control" name="descripcion_perfil" id="descripcion_perfil"><?php print $objRegistro->descripcion_perfil; ?></textarea>
        </div>
        <div class="form-group">

            <label for="lbl_icono">&Iacute;cono</label>
            <input type="text" class="form-control" name="icono_perfil" id="icono_perfil" value="<?php print $objRegistro->icono_perfil; ?>">
        </div>    
        <div class="form-group">
            <button class="btn btn-primary" name="btn_guardar" id="btn_guardar" >Guardar</button>
        </div>

        <input type="hidden" name="idperfil" id="idperfil" value="<?php print $objRegistro->idperfil; ?>">



        <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
        <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
        <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">

    </form>
</div>