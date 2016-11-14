<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
construir_encabezado($Titulo, $Referencia);
?>
<div class="container-fluid">
    <form name="formulario" id="formulario" method="post" >
        <div class="form-group">

            <label for="lbl_nombre">Identificaci&oacute;n</label>
            <input type="text" class="form-control" name="identificacion_persona" id="identificacion_persona" value="<?php print $objRegistro->identificacion_persona; ?>">
        </div>    
        <div class="form-group">
            <label for="lbl_codigo">Nombres</label>
            <input type="text" class="form-control" name="nombres_persona" id="nombres_persona" value="<?php print $objRegistro->nombres_persona; ?>">
        </div>    
        <div class="form-group">
            <label for="lbl_codigo">Apellidos</label>
            <input type="text" class="form-control" name="apellidos_persona" id="apellidos_persona" value="<?php print $objRegistro->apellidos_persona; ?>">
        </div>
        <div class="form-group">        
            <label for="lbl_fecha_inicial">Fecha de nacimiento</label>

            <div class='input-group date col-xs-3' id='datepicker1'>
                <input type="text" name="fecha_nacimiento_persona"  class="form-control" id="fecha_nacimiento_persona" value="<?php print $objRegistro->fecha_nacimiento_persona; ?>">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group ">
            <label for="lbl_pais">Regional</label>
            <select class="form-control" id="idregional" name="idregional" >
                <option value="null">-Seleccione-</option>
                <?php foreach ($objRegional->arrayRegionales as $regional) { ?>
                    <option value="<?php print $regional->idregional; ?>"><?php print $regional->nombre_regional; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>    
        
        <div class="form-group">
            <label for="lbl_codigo">Correo electr&oacute;nico</label>
            <input type="text" class="form-control" name="correo_electronico_persona" id="correo_electronico_persona" value="<?php print $objRegistro->correo_electronico_persona; ?>">
        </div>
        <div class="form-group">
            <label for="lbl_codigo">Celular</label>
            <input type="text" class="form-control" name="celular_persona" id="celular_persona" value="<?php print $objRegistro->celular_persona; ?>">
        </div>
        <div class="form-group">
            <label for="lbl_codigo">Direcci&oacute;n</label>
            <input type="text" class="form-control" name="direccion_persona" id="direccion_persona" value="<?php print $objRegistro->direccion_persona; ?>">
        </div>
        
        <div class="form-group">        
            <button class="btn btn-primary" name="btn_guardar" id="btn_guardar" >Guardar</button>
        </div>

        <input type="hidden" name="idpersona" id="idpersona" value="<?php print $objRegistro->idpersona; ?>">
        <input type="hidden" name="auxIdRegional" id="auxIdRegional" value="<?php print $objRegistro->idregional; ?>">


        <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
        <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
        <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">
        
        <input type="hidden" name="rutaModulo" id="rutaModulo" value="<?php print $rutaModulo; ?>">

    </form>
</div>