<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
construir_encabezado($Titulo, $Referencia);
?>
<div class="container-fluid">
    <form name="formulario" id="formulario" method="post" >
        <div class="form-group">

            <label for="lbl_nombre">Contraseña actual</label>
            <input type="text" class="form-control" name="clave_actual" id="clave_actual" />
        </div>    
        <div class="form-group">
            <label for="lbl_codigo">Nueva contraseña</label>
            <input type="password" class="form-control" name="nueva_clave" id="nueva_clave" />
        </div>
        <div class="form-group">

            <label for="lbl_icono">Confirmar contraseña</label>
            <input type="password" class="form-control" name="confirmacion_clave" id="confirmacion_clave" >
        </div>    
        <div class="form-group">
            <button class="btn btn-primary" name="btn_cambio_clave" id="btn_cambio_clave" >Cambiar contraseña</button>
        </div>



    </form>
</div>