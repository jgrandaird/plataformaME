<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pais_model extends CI_Model {

    public $idpais;
    public $codigo_pais;
    public $nombre_pais;
    public $arrayPaises;
    

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arrayPaises = array();
    }

    function obtener_paises() {

        $arrayPaises = $this->Crud_model->consultar_registros('Pais');
        $i = 0;
        foreach ($arrayPaises->result() as $pais) {
            $this->arrayPaises[$i] = $pais;
            $i++;
        }
    }

    function obtener_pais($idpais) {

        $arrayPais = $this->Crud_model->consultar_registro('Pais', 'idpais', $idpais);

        $i = 0;
        foreach ($arrayPais->result() as $pais) {

            $this->idpais = $pais->idpais;
            $this->codigo_pais = $pais->codigo_pais;
            $this->nombre_pais = $pais->nombre_pais;
            
            $i++;
        }
    }

    function crear_pais($arrayData) {
        return $this->Crud_model->crear_registro('Pais', $arrayData);
    }

    function editar_pais($idpais, $arrayData) {
        return $this->Crud_model->editar_registro('Pais', 'idpais', $idpais, $arrayData);
    }

    function eliminar_pais($idpais) {
        $this->Crud_model->eliminar_registro('Pais', 'idpais', $idpais);
    }

}
