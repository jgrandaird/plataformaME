<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
construir_encabezado($Titulo, $Referencia);
?>
<div class="container-fluid">
    <form name="formulario" id="formulario" method="post" >

        <div class="form-group">
            <label for="lbl_codigo">C&oacute;digo del periodo</label>
            <input type="text" class="form-control" name="codigo_periodo" id="codigo_periodo" value="<?php print $objRegistro->codigo_periodo; ?>">
        </div>    
        <div class="form-group">        
            <label for="lbl_fecha_inicial">Fecha inicial</label>

            <div class='input-group date col-xs-3' id='datepicker1'>
                <input type="text" name="fecha_inicio_periodo"  class="form-control" id="fecha_inicio_periodo" value="<?php print $objRegistro->fecha_inicio_periodo; ?>">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>    
        <div class="form-group">        
            <label for="lbl_fecha_final">Fecha final</label>

            <div class='input-group date col-xs-3' id='datepicker2' >
                <input type="text" name="fecha_final_periodo"  class="form-control" id="fecha_final_periodo" value="<?php print $objRegistro->fecha_final_periodo; ?>">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>


        </div>    

        <div class="form-group">        
            <button class="btn btn-primary" name="btn_guardar" id="btn_guardar" >Guardar</button>
        </div>    

        <input type="hidden" name="idperiodo" id="idperiodo" value="<?php print $objRegistro->idperiodo; ?>">
        <input type="hidden" name="idproyecto" id="idproyecto" value="<?php print $objRegistro->idproyecto; ?>">

        <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
        <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
        <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">

    </form>
</div>

