<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Municipio_model extends CI_Model {

    public $idmunicipio;
    public $codigo_municipio;
    public $nombre_municipio;
    public $iddepto;
    public $objDepto;
    public $arrayMunicipios;
    

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arrayMunicipios = array();
    }

    function obtener_municipios() {

        $arrayMunicipios = $this->Crud_model->consultar_registros('Municipio');
        $i = 0;
        foreach ($arrayMunicipios->result() as $municipio) {
            $this->arrayMunicipios[$i] = $municipio;
            $i++;
        }
    }
    
    function obtener_municipiosxdepto($iddepto) {

        $arrayMunicipios = $this->Crud_model->consultar_registro('Municipio', 'iddepto', $iddepto);
        $i = 0;
        foreach ($arrayMunicipios->result() as $municipio) {
            $this->arrayMunicipios[$i] = $municipio;
            $i++;
        }
    }

    function obtener_municipio($idmunicipio) {

        $arrayMunicipio = $this->Crud_model->consultar_registro('Municipio', 'idmunicipio', $idmunicipio);

        $i = 0;
        foreach ($arrayMunicipio->result() as $municipio) {

            $this->idmunicipio = $municipio->idmunicipio;
            $this->codigo_municipio = $municipio->codigo_municipio;
            $this->nombre_municipio = $municipio->nombre_municipio;
            $this->iddepto = $municipio->iddepto;
            
            $i++;
        }
    }

    function crear_municipio($arrayData) {
        return $this->Crud_model->crear_registro('Municipio', $arrayData);
    }

    function editar_municipio($idmunicipio, $arrayData) {
        return $this->Crud_model->editar_registro('Municipio', 'idmunicipio', $idmunicipio, $arrayData);
    }

    function eliminar_municipio($idmunicipio) {
        $this->Crud_model->eliminar_registro('Municipio', 'idmunicipio', $idmunicipio);
    }

}
