<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Novedad_model extends CI_Model {

    public $idnovedad;
    public $contenido_novedad;
    public $fecha_novedad;
    public $estado_novedad;
    public $idevento;
    public $idpersona;
    public $arrayNovedad;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arrayNovedad = array();
    }
    
    function obtener_novedad($idnovedad){
        
        $arrayNovedad = $this->Crud_model->consultar_registro('evento_novedad', 'idnovedad', $idnovedad);

        $i = 0;
        foreach ($arrayNovedad->result() as $novedad) {

            $this->idnovedad = $novedad->idnovedad;
            $this->contenido_novedad = $novedad->contenido_novedad;
            $this->fecha_novedad = $novedad->fecha_novedad;
            $this->estado_novedad = $novedad->estado_novedad;
            $this->idevento = $novedad->idevento;
            $this->idpersona = $novedad->idpersona;
            $i++;
        }
        
    }
    
    function obtener_novedades($idevento){
        $arrayNovedad = $this->Crud_model->consultar_registro('evento_novedad', 'idevento', $idevento);
        $i = 0;
        foreach ($arrayNovedad->result() as $permiso) {
            $this->$arrayNovedad[$i] = $permiso;
            $i++;
        }
        $this->numPermiso = $i;
    }
    
    function crear_novedad($arrayData) {
        return $this->Crud_model->crear_registro('evento_novedad', $arrayData);
    }

    function editar_novedad($idnovedad, $arrayData) {
        return $this->Crud_model->editar_registro('evento_novedad', 'idnovedad', $idnovedad, $arrayData);
    }

    function eliminar_novedad($idnovedad) {
        $this->Crud_model->eliminar_registro('evento_novedad', 'idnovedad', $idnovedad);
    }
    
}

