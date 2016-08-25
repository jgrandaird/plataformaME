<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Encabezado {

    public $titulo;
    public $refencia;

    public function __construct() {

        $this->titulo = "";
        $this->refencia = array();
    }

    public function construir_encabezado($titulo, $indice, $subtitulo, $modelo, $funcion, $idregistro, $nombre_campo) {

        $this->titulo = $titulo;
        $this->referencia[$indice]["subtitulo"] = $subtitulo;
        $this->referencia[$indice]["modelo"] = $modelo;
        $this->referencia[$indice]["funcion"] = $funcion;
        $this->referencia[$indice]["idregistro"] = $idregistro;
        $this->referencia[$indice]["nombre_campo"] = $nombre_campo;
    }

    public function construir_titulo($titulo) {
        $this->titulo = $titulo;
        $this->referencia = array();
    }
    
    public function construir_ruta_encabezado($indice, $subtitulo, $modelo, $funcion, $idregistro, $nombre_campo){
        $this->referencia[$indice]["subtitulo"] = $subtitulo;
        $this->referencia[$indice]["modelo"] = $modelo;
        $this->referencia[$indice]["funcion"] = $funcion;
        $this->referencia[$indice]["idregistro"] = $idregistro;
        $this->referencia[$indice]["nombre_campo"] = $nombre_campo;
    }

}
