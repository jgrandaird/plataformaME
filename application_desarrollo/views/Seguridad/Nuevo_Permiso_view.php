<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
construir_encabezado($Titulo, $Referencia);
?>
<div class="container-fluid">
    <form name="formulario" id="formulario" method="post" >
        <div class="form-group">
            <label for="lbl_codigo">C&oacute;digo</label>
            <input type="text" class="form-control" name="codigo_permiso" id="codigo_permiso" value="<?php print $objRegistro->codigo_permiso; ?>">
        </div>
        <div class="form-group">
            <label for="lbl_nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre_permiso" id="nombre_permiso" value="<?php print $objRegistro->nombre_permiso; ?>">
        </div>    
        <div class="form-group">
            <label for="lbl_codigo">Descipci&oacute;n</label>
            <textarea class="form-control" name="descripcion_permiso" id="descripcion_permiso"><?php print $objRegistro->descripcion_permiso; ?></textarea>
        </div>
        <div class="form-group">
            <label for="lbl_nombre">Ruta</label>
            <input type="text" class="form-control" name="ruta_permiso" id="ruta_permiso" value="<?php print $objRegistro->ruta_permiso; ?>">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" name="btn_guardar" id="btn_guardar" >Guardar</button>
        </div>

        <input type="hidden" name="idperfil" id="idperfil" value="<?php print $objRegistro->idperfil; ?>">
        <input type="hidden" name="idpermiso" id="idpermiso" value="<?php print $objRegistro->idpermiso; ?>">



        <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
        <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
        <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">

    </form>
</div>