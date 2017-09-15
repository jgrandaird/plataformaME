<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
construir_encabezado($Titulo, $Referencia);
?>
<div class="container-fluid">
    <form name="formulario" id="formulario" method="post" >
        
        <div class="form-group">
            <label for="lbl_codigo">C&oacute;digo de la l&iacute;nea de acci&oacute;n</label>
            <input type="text" class="form-control" name="codigo_lineaaccion" id="codigo_lineaaccion" value="<?php print $objRegistro->codigo_lineaaccion; ?>">
        </div>

        <div class="form-group">
            <label for="lbl_nombre">Nombre de la l&iacute;nea de acci&oacute;n</label>
            <input type="text" class="form-control" name="nombre_lineaaccion" id="nombre_lineaaccion" value="<?php print $objRegistro->nombre_lineaaccion; ?>">
        </div>

        <div class="form-group">
            <label for="lbl_nombre">Descripci&oacute;n de la l&iacute;nea de acci&oacute;n</label>
            <textarea class="form-control" name="descripcion_lineaaccion" id="descripcion_lineaaccion"><?php print $objRegistro->descripcion_lineaaccion; ?></textarea>
        </div>
        <div class="form-group">        
            <button class="btn btn-primary" name="btn_guardar" id="btn_guardar" >Guardar</button>
        </div>    

        <input type="hidden" name="idproyecto" id="idproyecto" value="<?php print $objRegistro->idproyecto; ?>">
        <input type="hidden" name="idobjetivo" id="idobjetivo" value="<?php print $objRegistro->idobjetivo; ?>">
        <input type="hidden" name="idlineaaccion" id="idlineaaccion" value="<?php print $objRegistro->idlineaaccion; ?>">

        <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
        <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
        <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">

    </form>
</div>
