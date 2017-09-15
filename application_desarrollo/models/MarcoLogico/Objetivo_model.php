<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Objetivo_model extends CI_Model {

    public $idobjetivo;
    public $codigo_objetivo;
    public $nombre_objetivo;
    public $descripcion_objetivo;
    public $idproyecto;
    public $arrayObjetivos;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arrayObjetivos = array();
    }

    function obtener_objetivos($idproyecto) {

        //$arrayObjetivos = $this->Crud_model->consultar_registros('Objetivo');
        $this->idproyecto=$idproyecto;
        $arrayObjetivos = $this->Crud_model->consultar_registro('Objetivo', 'idproyecto', $idproyecto);
        $i = 0;
        foreach ($arrayObjetivos->result() as $objetivo) {
            $this->arrayObjetivos[$i] = $objetivo;
            $i++;
        }
    }

    function obtener_objetivo($idobjetivo) {

        $arrayObjetivo = $this->Crud_model->consultar_registro('Objetivo', 'idobjetivo', $idobjetivo);

        $i = 0;
        foreach ($arrayObjetivo->result() as $objetivo) {

            $this->idproyecto = $objetivo->idproyecto;
            $this->idobjetivo = $objetivo->idobjetivo;
            $this->codigo_objetivo = $objetivo->codigo_objetivo;
            $this->nombre_objetivo = $objetivo->nombre_objetivo;
            $this->descripcion_objetivo = $objetivo->descripcion_objetivo;
            
            $i++;
        }
    }

    function crear_objetivo($arrayData) {
        return $this->Crud_model->crear_registro('Objetivo', $arrayData);
        
    }

    function editar_objetivo($idobjetivo, $arrayData) {
        
        return $this->Crud_model->editar_registro('Objetivo', 'idobjetivo', $idobjetivo, $arrayData);
    }

    function eliminar_objetivo($idobjetivo) {
        $this->Crud_model->eliminar_registro('Objetivo', 'idobjetivo',$idobjetivo);
    }

}


