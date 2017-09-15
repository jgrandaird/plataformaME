<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Regional_model extends CI_Model {

    public $idregional;
    public $nombre_regional;
    public $codigo_regional;
    public $idpais;
    public $iddepto;
    public $idmunicipio;
    public $objPais;
    public $objDepto;
    public $objMunicipio;
    public $arrayRegionales;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arrayRegionales = array();
    }

    function obtener_regionales() {

        $arrayRegionales = $this->Crud_model->consultar_registros('Regional');
        $i = 0;
        foreach ($arrayRegionales->result() as $regional) {
            $this->arrayRegionales[$i] = $regional;
            $i++;
        }
    }

    function obtener_regional($idregional) {

        $arrayRegional = $this->Crud_model->consultar_registro('Regional', 'idregional', $idregional);

        $i = 0;
        foreach ($arrayRegional->result() as $regional) {

            $this->idregional = $regional->idregional;
            $this->nombre_regional = $regional->nombre_regional;
            $this->codigo_regional = $regional->codigo_regional;
            $this->idpais = $regional->idpais;
            $this->iddepto = $regional->iddepto;
            $this->idmunicipio = $regional->idmunicipio;
            $i++;
        }
    }

    function crear_regional($arrayData) {
        return $this->Crud_model->crear_registro('Regional', $arrayData);
    }

    function editar_regional($idregional, $arrayData) {
        return $this->Crud_model->editar_registro('Regional', 'idregional', $idregional, $arrayData);
    }

    function eliminar_regional($idregional) {
        $this->Crud_model->eliminar_registro('Regional', 'idregional', $idregional);
    }

}
