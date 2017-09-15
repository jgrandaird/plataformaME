<?php

function construir_select($arrayData, $identificador, $etiqueta, $nombrecampo, $valor) {
    $select = "<select name='" . $nombrecampo . "' id='" . $nombrecampo . "'>";
    $select.="<option value=null>-Seleccione-</option>";
    foreach ($arrayData as $data) {
        $selected = "";
        if ($data->$identificador == $valor) {
            $selected = "selected";
        }
        $select.="<option value='" . $data->$identificador . "' " . $selected . ">" . $data->$etiqueta . "</option>";
    }

    $select.="</select>";
    return $select;
}

function construir_encabezado($titulo, $referencia) {
    ?>
    <h2><?php print $titulo; ?></h2>
    <?php
    $nivel = 0;
    foreach ($referencia as $contenido) {
        $abre_h = "<h4>";
        $cierra_h = "</h4>";
        if ($nivel >= 3) {
            $abre_h = "<h5>";
            $cierra_h = "</h5>";
        }
        ?>
        <?php print $abre_h . $contenido["subtitulo"]; ?>:<?php
        print $contenido["nombre_campo"] . $cierra_h;

        $nivel++;
    }
}

function respuesta_ok() {
    ?>
    <script language="JavaScript">
        alert("Registro exitoso!");
    </script>
    <?php
}

function respuesta_error($arrayExcepciones) {
    ?>
    <script language="JavaScript">
        alert("[<?php print $arrayExcepciones['code'];?>]: Error en el registro");
    </script>
    <?php
}