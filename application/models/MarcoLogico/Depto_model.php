<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Depto_model extends CI_Model {

    public $iddepto;
    public $codigo_depto;
    public $nombre_depto;
    public $idpais;
    public $objPais;
    public $arrayDeptos;
    

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arrayDeptos = array();
    }

    function obtener_deptos() {

        $arrayDeptos = $this->Crud_model->consultar_registros('Depto');
        $i = 0;
        foreach ($arrayDeptos->result() as $depto) {
            $this->arrayDeptos[$i] = $depto;
            $i++;
        }
    }
    
    function obtener_deptosxpais($idpais){
        
        $arrayDeptos = $this->Crud_model->consultar_registro('Depto', 'idpais', $idpais);
        $i = 0;
        foreach ($arrayDeptos->result() as $depto) {
            $this->arrayDeptos[$i] = $depto;
            $i++;
        }
        
    }
    

    function obtener_depto($iddepto) {

        $arrayDepto = $this->Crud_model->consultar_registro('Depto', 'iddepto', $iddepto);

        $i = 0;
        foreach ($arrayDepto->result() as $depto) {

            $this->iddepto = $depto->iddepto;
            $this->nombre_depto = $depto->nombre_depto;
            $this->idpais = $depto->idpais;
            $this->codigo_depto = $depto->codigo_depto;
            
            
            $i++;
        }
    }

    function crear_depto($arrayData) {
        return $this->Crud_model->crear_registro('Depto', $arrayData);
    }

    function editar_depto($iddepto, $arrayData) {
        return $this->Crud_model->editar_registro('Depto', 'iddepto', $iddepto, $arrayData);
    }

    function eliminar_municipio($iddepto) {
        $this->Crud_model->eliminar_registro('Depto', 'iddepto', $iddepto);
    }

}
