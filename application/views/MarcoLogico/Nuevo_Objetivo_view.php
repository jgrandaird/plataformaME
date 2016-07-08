<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu); ?>

<h2>NUEVO OBJETIVO</h2>
<h4>PROYECTO:<?php print $nombreProyecto;?></h4>
<div class="container-fluid">
    <form name="formulario" id="formulario" method="post" >
        <div class="form-group">
            <label for="lbl_nombre">C&oacute;digo del Objetivo</label></td>
            <input type="text" class="form-control" name="codigo_objetivo" id="codigo_objetivo" value="<?php print $objRegistro->codigo_objetivo; ?>">
        </div>    
        
        <div class="form-group">
            <label for="lbl_nombre">Nombre del Objetivo</label></td>
            <input type="text" class="form-control" name="nombre_objetivo" id="nombre_objetivo" value="<?php print $objRegistro->nombre_objetivo; ?>">
        </div>
        
        <div class="form-group">
            <label for="lbl_nombre">Descripci&oacute;n del Objetivo</label></td>
        <textarea class="form-control" name="descripcion_objetivo" id="descripcion_objetivo" ><?php print $objRegistro->descripcion_objetivo; ?></textarea>
        </div>
        
        <div class="form-group">        
            <button class="btn btn-primary" name="btn_guardar" id="btn_guardar" >Guardar</button>
        </div>    

        <input type="hidden" name="idproyecto" id="idproyecto" value="<?php print $objRegistro->idproyecto; ?>">
        <input type="hidden" name="idobjetivo" id="idobjetivo" value="<?php print $objRegistro->idobjetivo; ?>">

        <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
        <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
        <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">
        
    </form>
</div>
