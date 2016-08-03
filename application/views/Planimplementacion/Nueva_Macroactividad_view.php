<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
construir_encabezado($Titulo, $Referencia);
?>
<div class="container-fluid">
    <form name="formulario" id="formulario" method="post" >
        <div class="form-group ">
            <label for="lbl_objetivo">Objetivo</label>
            <select class="form-control" id="idobjetivo" name="idobjetivo" >
                <option value="null">-Seleccione-</option>
                <?php 
                foreach($objObjetivo->arrayObjetivos as $objetivo){?>
                <option value="<?php print $objetivo->idobjetivo;?>"><?php print $objetivo->nombre_objetivo;?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="lbl_nombre">C&oacute;digo Macroactividad</label>
            <input type="text" class="form-control" name="codigo_macroactividad" id="codigo_macroactividad" value="<?php print $objRegistro->codigo_macroactividad; ?>">
        </div>

        <div class="form-group">
            <label for="lbl_nombre">Nombre Macroactividad</label>
            <textarea class="form-control" name="nombre_macroactividad" id="nombre_macroactividad" ><?php print $objRegistro->nombre_macroactividad; ?></textarea>
        </div>

        <div class="form-group">
            <label for="lbl_nombre">Observaciones Macroactividad</label>
            <textarea class="form-control" name="descripcion_macroactividad" id="descripcion_macroactividad" ><?php print $objRegistro->descripcion_macroactividad; ?></textarea>
        </div>
        
        <div class="form-group">        
            <button class="btn btn-primary" name="btn_guardar" id="btn_guardar" >Guardar</button>
        </div>    

        <input type="hidden" name="idproyecto" id="idproyecto" value="<?php print $objRegistro->idproyecto; ?>">
        <input type="hidden" name="idregional" id="idregional" value="<?php print $objRegistro->idregional; ?>">
        <input type="hidden" name="idperiodo" id="idperiodo" value="<?php print $objRegistro->idperiodo; ?>">
        
        <input type="hidden" name="auxIdObjetivo" id="auxIdObjetivo" value="<?php print $objRegistro->idobjetivo; ?>">
        <input type="hidden" name="idmacroactividad" id="idmacroactividad" value="<?php print $objRegistro->idmacroactividad; ?>">
        

        <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
        <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
        <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">

    </form>
</div>
