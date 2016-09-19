<?php
incluir_script($rutaJs);
construir_barra_acciones($Menu);
construir_encabezado($Titulo, $Referencia);
?>
<div class="container-fluid">
    <form name="formulario" id="formulario" method="post" >
        <div class="form-group ">
            <label for="lbl_persona">Funcionario</label>
            <select class="form-control" id="idpersona" name="idpersona" >
                <option value="null">-Seleccione-</option>
                <?php 
                foreach($objPersona->arrayPersonal as $funcionario){?>
                <option value="<?php print $funcionario->idpersona;?>"><?php print $funcionario->nombres_persona." ".$funcionario->apellidos_persona;?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="lbl_nombre">Nombre de usuario</label>
            <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario" value="<?php print $objRegistro->nombre_usuario; ?>"/>
        </div>

        <div class="form-group">
            <label for="lbl_clave">Contraseña</label>
            <input type="text" class="form-control" name="clave_usuario" id="clave_usuario" value="<?php print $objRegistro->clave_usuario; ?>"/>
        </div>

        
        
        <div class="form-group">        
            <button class="btn btn-primary" name="btn_guardar" id="btn_guardar" >Guardar</button>
        </div>    

        
        
        <input type="hidden" name="auxIdPersona" id="auxIdPersona" value="<?php print $objRegistro->idpersona; ?>">
        <input type="hidden" name="auxNombre_usuario" id="auxNombre_usuario" value="<?php print $objRegistro->nombre_usuario; ?>">
        
        

        <input type="hidden" name="miparametro" id="miparametro" value="<?php print $objModulo->miparametro; ?>">
        <input type="hidden" name="mimodulo" id="mimodulo" value="<?php print $objModulo->mimodulo; ?>">
        <input type="hidden" name="moduloantecesor" id="moduloantecesor" value="<?php print $objModulo->moduloantecesor; ?>">

    </form>
</div>
