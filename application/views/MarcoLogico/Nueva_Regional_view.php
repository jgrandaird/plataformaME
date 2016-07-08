<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
?>
<h2>NUEVA REGIONAL</h2>
<br>
<div class="container-fluid">
    <form name="formulario" id="formulario" method="post" >
        <div class="form-group">

            <label for="lbl_nombre">Nombre regional</label>
            <input type="text" class="form-control" name="nombre_regional" id="nombre_regional" value="<?php print $objRegistro->nombre_regional; ?>">
        </div>    
        <div class="form-group">
            <label for="lbl_codigo">C&oacute;digo regional</label>
            <input type="text" class="form-control" name="codigo_regional" id="codigo_regional" value="<?php print $objRegistro->codigo_regional; ?>">
        </div>    
        <div class="form-group ">
            <label for="lbl_pais">Pa&iacute;s</label>
            <select class="form-control" id="idpais" name="idpais" >
                <option value="null">-Seleccione-</option>
                <?php 
                foreach($objPais->arrayPaises as $pais){?>
                <option value="<?php print $pais->idpais;?>"><?php print $pais->nombre_pais;?></option>
                    <?php
                }
                ?>
            </select>
        </div>    
        <div class="form-group">
            <label for="lbl_depto">Departamento</label>
            <select class="form-control" id="iddepto" name="iddepto">
                <option>-Seleccione-</option>
            </select>
        </div>
        <div class="form-group">
            <label for="lbl_municipio">Municipio</label>
            <select class="form-control" id="idmunicipio" name="idmunicipio">
                <option>-Seleccione-</option>
            </select>
        </div>
        <div class="form-group">        
            <button class="btn btn-primary" name="btn_guardar" id="btn_guardar" >Guardar</button>
        </div>

        <input type="hidden" name="idregional" id="idregional" value="<?php print $objRegistro->idregional; ?>">
        <input type="hidden" name="auxIdPais" id="auxIdPais" value="<?php print $objRegistro->idpais; ?>">
        <input type="hidden" name="auxIdDepto" id="auxIdDepto" value="<?php print $objRegistro->iddepto; ?>">
        <input type="hidden" name="auxIdMunicipio" id="auxIdMunicipio" value="<?php print $objRegistro->idmunicipio; ?>">
        
        
        <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
        <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
        <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">

    </form>
</div>