<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Periodo_model extends CI_Model {

    public $idperiodo;
    public $codigo_periodo;
    public $fecha_inicio_periodo;
    public $fecha_final_periodo;
    public $idproyecto;
    public $arrayPeriodos;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arrayPeriodos = array();
    }

    function obtener_periodos($idproyecto) {

        $this->idproyecto=$idproyecto;
        $arrayPeriodos = $this->Crud_model->consultar_registro('Periodo', 'idproyecto', $idproyecto);
        $i = 0;
        foreach ($arrayPeriodos->result() as $periodo) {
            $this->arrayPeriodos[$i] = $periodo;
            $i++;
        }
    }

    function obtener_periodo($idperiodo) {

        $arrayPeriodo = $this->Crud_model->consultar_registro('Periodo', 'idperiodo', $idperiodo);

        $i = 0;
        foreach ($arrayPeriodo->result() as $periodo) {

            $this->idperiodo = $periodo->idperiodo;
            $this->codigo_periodo = $periodo->codigo_periodo;
            $this->fecha_inicio_periodo = $periodo->fecha_inicio_periodo;
            $this->fecha_final_periodo = $periodo->fecha_final_periodo;
            $this->idproyecto = $periodo->idproyecto;
            $i++;
        }
    }

    function crear_periodo($arrayData) {
        return $this->Crud_model->crear_registro('Periodo', $arrayData);
        
    }

    function editar_periodo($idperiodo, $arrayData) {
        
        return $this->Crud_model->editar_registro('Periodo', 'idperiodo', $idperiodo, $arrayData);
    }

    function eliminar_periodo($idperiodo) {
        $this->Crud_model->eliminar_registro('Periodo', 'idperiodo',$idperiodo);
    }

}


