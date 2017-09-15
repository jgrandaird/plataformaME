<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
construir_encabezado($Titulo, $Referencia);
?>
<div class="container-fluid">
    <form name="formulario" id="formulario" method="post" >
        <div class="form-group">
            <label for="lbl_nombre">C&oacute;digo del indicador</label>
            <input type="text" class="form-control" name="codigo_indicador" id="codigo_indicador" value="<?php print $objRegistro->codigo_indicador; ?>">
        </div>    

        <div class="form-group">
            <label for="lbl_nombre">Nombre del indicador</label>
            <input type="text" class="form-control" name="nombre_indicador" id="nombre_indicador" value="<?php print $objRegistro->nombre_indicador; ?>">
        </div>

        <div class="form-group">
            <label for="lbl_nombre">Definic&oacute;n del indicador</label>
            <input type="text" class="form-control" name="descripcion_indicador" id="descripcion_indicador" value="<?php print $objRegistro->descripcion_indicador; ?>">
        </div>

        <div class="form-group">
            <label for="lbl_nombre">Meta del indicador</label>
            <input type="text" class="form-control" name="meta" id="meta" value="<?php print $objRegistro->meta; ?>">
        </div>

        <div class="form-group">
            <label for="lbl_nombre">Tipo de indicador</label>
            <input type="text" class="form-control" name="tipo_indicador" id="tipo_indicador" value="<?php print $objRegistro->tipo_indicador; ?>">
        </div>

        <div class="form-group">
            <label for="lbl_nombre">Frecuencia de medici&oacute;n del indicador</label>
            <input type="text" class="form-control" name="frecuencia_medicion_indicador" id="frecuencia_medicion_indicador" value="<?php print $objRegistro->frecuencia_medicion_indicador; ?>">
        </div>

        <div class="form-group">        
            <button class="btn btn-primary" name="btn_guardar" id="btn_guardar" >Guardar</button>
        </div>    

        <input type="hidden" name="idproyecto" id="idproyecto" value="<?php print $objRegistro->idproyecto; ?>">
        <input type="hidden" name="idobjetivo" id="idobjetivo" value="<?php print $objRegistro->idobjetivo; ?>">
        <input type="hidden" name="idindicador" id="idindicador" value="<?php print $objRegistro->idindicador; ?>">

        <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
        <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
        <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">

    </form>
</div>
