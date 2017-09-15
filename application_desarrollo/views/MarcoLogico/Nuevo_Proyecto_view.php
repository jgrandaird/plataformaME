<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu); ?>
<h2>NUEVO PROYECTO</h2>
<br>
<div class="container-fluid">
    <form name="formulario" id="formulario" method="post" >
        <div class="form-group">

            <label for="lbl_nombre">Nombre del proyecto</label>
            <input type="text" class="form-control" name="nombre_proyecto" id="nombre_proyecto" value="<?php print $objRegistro->nombre_proyecto; ?>">
        </div>    
        <div class="form-group">
            <label for="lbl_codigo">C&oacute;digo del proyecto</label>
            <input type="text" class="form-control" name="codigo_proyecto" id="codigo_proyecto" value="<?php print $objRegistro->codigo_proyecto; ?>">
        </div>    
        <div class="form-group">
            <label for="lbl_descripcion">Descripci&oacute;n</label>
            <textarea name="descripcion_proyecto"  class="form-control" id="descripcion_proyecto" cols="30" rows="5"><?php print $objRegistro->descripcion_proyecto; ?></textarea>
        </div>    
        <div class="form-group">        
            <label for="lbl_fecha_inicial">Fecha inicial</label>

            <div class='input-group date col-xs-3' id='datepicker1'>
                <input type="text" name="fecha_inicial_proyecto"  class="form-control" id="fecha_inicial_proyecto" value="<?php print $objRegistro->fecha_inicial_proyecto; ?>">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>




        </div>    
        <div class="form-group">        
            <label for="lbl_fecha_final">Fecha final</label>

            <div class='input-group date col-xs-3' id='datepicker2' >
                <input type="text" name="fecha_final_proyecto"  class="form-control" id="fecha_final_proyecto" value="<?php print $objRegistro->fecha_final_proyecto; ?>">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>


        </div>    
        <div class="form-group">        
            <label for="lbl_num_periodos">N&uacute;mero periodos de evaluaci&oacute;n</label>

            <input type="text" name="numero_periodos_proyecto"  class="form-control " id="numero_periodos_proyecto" value="<?php print $objRegistro->numero_periodos_proyecto; ?>">

        </div>    
        <div class="form-group">        
            <button class="btn btn-primary" name="btn_guardar" id="btn_guardar" >Guardar</button>
        </div>    

        <input type="hidden" name="idproyecto" id="nombre_proyecto" value="<?php print $objRegistro->idproyecto; ?>">

        <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
        <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
        <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">

    </form>
</div>