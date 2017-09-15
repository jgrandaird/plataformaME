<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auditoria_model extends CI_Model {

    public $fecha_auditoria;
    public $usuario_auditoria;
    public $tabla_auditoria;
    public $accion_auditoria;
    public $sentencia_auditoria;
    public $direccionip_auditoria;
    
    function __construct() {
        parent::__construct();
       
        //$this->load->model("CrudAuditoria_model");
        $this->fecha_auditoria = date("Y-m-d H:i:s");
        $this->usuario_auditoria = $this->session->userdata("nombre_usuario");
        $this->direccionip_auditoria = $_SERVER["REMOTE_ADDR"];
    }

    function crear_auditoria($tabla, $accion, $arraySentencia) {
        $this->tabla_auditoria = $tabla;
        $this->accion_auditoria = $accion;
        $this->sentencia_auditoria = $this->crear_sentencia($arraySentencia);
        $data = $this->crear_array_valores();
        return $data;
        
    }
    
    function crear_auditoria_sentencia($tabla, $accion, $sentencia) {
        $this->tabla_auditoria = $tabla;
        $this->accion_auditoria = $accion;
        $this->sentencia_auditoria = $sentencia;
        $data = $this->crear_array_valores();
        return $data;
        
    }
    

    function crear_array_valores() {

        $data = array('fecha_auditoria' => $this->fecha_auditoria,
            'usuario_auditoria' => $this->usuario_auditoria,
            'tabla_auditoria' => $this->tabla_auditoria,
            'accion_auditoria' => $this->accion_auditoria,
            'sentencia_auditoria' => $this->sentencia_auditoria,
            'direccionip_auditoria' => $this->direccionip_auditoria
        );
        return $data;
    }

    function crear_sentencia($arraySentencia) {

        $campos = "";
        $valores = "";
        $coma = "";

        foreach ($arraySentencia as $llave => $valor) {
            $campos = $campos . $coma . "[" . $llave . "]";
            $valores = $valores . $coma . "[" . $valor . "]";
            $coma = ",";
        }
        $sentencia = "CAMPOS:$campos VALORES:$valores";
        return $sentencia;
    }

}
