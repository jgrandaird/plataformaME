<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class Auditoria {

    
    public $fecha;
    public $usuario;
    public $tabla;
    public $accion;
    public $sentencia;

    public function __construct() {

        
    }

    public function guardar_registro($tabla, $accion, $sentencia) {
        
        $this->CI->Auditoria_model->crear_auditoria($this->fecha,$this->usuario,$tabla,$accion,$sentencia);
    }
}
