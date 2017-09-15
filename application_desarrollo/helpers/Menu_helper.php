<?php

function construir_menu_estadar($menuEstandar, $objMenu) {

    $indice=0;
    foreach ($objMenu->arrayMenuGenerico as $menuGenerico) {
        foreach ($menuEstandar as $menu) {
            if ($menuGenerico["Identificador"] == $menu["Identificador"]) {
                $objMenu->construir_menu($indice, $menuGenerico["Etiqueta"], $menuGenerico["Funcion"], $menuGenerico["Imagen"],$menuGenerico["Identificador"]);
                $indice++;
            }
        }
    }
}

function construir_menu_modulo($menuModulo, $objMenu, $indice) {

    foreach ($menuModulo as $menu) {
        $objMenu->construir_menu($indice, $menu["Etiqueta"], $menu["Funcion"], $menu["Imagen"],$menu["Identificador"]);
        $indice++;
    }
}