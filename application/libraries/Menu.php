<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu {

    public $arrayMenuGenerico;
    public $arrayMenu;
    public $rutaModulo;

    public function __construct($arrayMenu) {

        $this->arrayMenu = $arrayMenu;
        $this->arrayMenuGenerico = $arrayMenu;
        
    }

    public function construir_menu_generico() {

        $this->arrayMenuGenerico[0]["Etiqueta"] = "Atras";
        $this->arrayMenuGenerico[0]["Funcion"] = base_url() . $this->rutaModulo."atras";
        $this->arrayMenuGenerico[0]["Imagen"] = base_url() . "img/atras.png";
        $this->arrayMenuGenerico[0]["Identificador"] = "Atras_Lista";
        

        $this->arrayMenuGenerico[1]["Etiqueta"] = "Nuevo";
        $this->arrayMenuGenerico[1]["Funcion"] = base_url() . $this->rutaModulo."nuevo_registro";
        $this->arrayMenuGenerico[1]["Imagen"] = base_url() . "img/nuevo.png";
        $this->arrayMenuGenerico[1]["Identificador"] = "Nuevo_Lista";

        $this->arrayMenuGenerico[2]["Etiqueta"] = "Editar";
        $this->arrayMenuGenerico[2]["Funcion"] = base_url() . $this->rutaModulo."editar_registro";
        $this->arrayMenuGenerico[2]["Imagen"] = base_url() . "img/editar.png";
        $this->arrayMenuGenerico[2]["Identificador"] = "Editar_Lista";

        $this->arrayMenuGenerico[3]["Etiqueta"] = "Eliminar";
        $this->arrayMenuGenerico[3]["Funcion"] = base_url() . $this->rutaModulo."eliminar_registro";
        $this->arrayMenuGenerico[3]["Imagen"] = base_url() . "img/eliminar.png";
        $this->arrayMenuGenerico[3]["Identificador"] = "Eliminar_Lista";
        
        $this->arrayMenuGenerico[4]["Etiqueta"] = "Atrás";
        $this->arrayMenuGenerico[4]["Funcion"] = base_url() . $this->rutaModulo."atras";
        $this->arrayMenuGenerico[4]["Imagen"] = base_url() . "img/atras.png";
        $this->arrayMenuGenerico[4]["Identificador"] = "Atras_Nuevo";
    }

    public function construir_menu($posicion, $etiqueta, $funcion, $imagen,$identificador) {
        $this->arrayMenu[$posicion]["Etiqueta"] = $etiqueta;
        $this->arrayMenu[$posicion]["Funcion"] = $funcion;
        $this->arrayMenu[$posicion]["Imagen"] = $imagen;
        $this->arrayMenu[$posicion]["Identificador"] = $identificador;
    }

    public function ArrayMenu() {
        return $this->arrayMenu;
    }

}

?>
