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
    <?php foreach ($referencia as $contenido) { ?>
        <h4><?php print $contenido["subtitulo"]; ?>:<?php print $contenido["nombre_campo"]; ?></h4>
        <?php
    }
}
?>

