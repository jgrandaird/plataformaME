<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Indicador_model extends CI_Model {

    public $idindicador;
    public $codigo_indicador;
    public $nombre_indicador;
    public $descripcion_indicador;
    public $idproyecto;
    public $idobjetivo;
    public $meta;
    public $tipo_indicador;
    public $frecuencia_medicion_indicador;
    public $arrayIndicadores;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arrayIndicadores = array();
    }

    function obtener_indicadores($idobjetivo) {

        //$arrayObjetivos = $this->Crud_model->consultar_registros('Objetivo');
        $this->idobjetivo=$idobjetivo;
        //$this->idproyecto=$idproyecto;
        $arrayIndicadores = $this->Crud_model->consultar_registro('Indicador', 'idobjetivo', $idobjetivo);
        $i = 0;
        foreach ($arrayIndicadores ->result() as $indicador) {
            $this->arrayIndicadores [$i] = $indicador;
            $i++;
        }
    }

    function obtener_indicador($idindicador) {

        $arrayIndicador = $this->Crud_model->consultar_registro('Indicador', 'idindicador', $idindicador);

        $i = 0;
        foreach ($arrayIndicador->result() as $indicador) {

            $this->idindicador = $indicador->idindicador;
            $this->idobjetivo = $indicador->idobjetivo;
            $this->codigo_indicador = $indicador->codigo_indicador;
            $this->nombre_indicador = $indicador->nombre_indicador;
            $this->descripcion_indicador = $indicador->descripcion_indicador;
            $this->meta=$indicador->meta;
            $this->tipo_indicador=$indicador->tipo_indicador;
            $this->frecuencia_medicion_indicador=$indicador->frecuencia_medicion_indicador;
            
            $i++;
        }
    }

    function crear_indicador($arrayData) {
        return $this->Crud_model->crear_registro('Indicador', $arrayData);
        
    }

    function editar_indicador($idindicador, $arrayData) {
        
        return $this->Crud_model->editar_registro('Indicador', 'idindicador', $idindicador, $arrayData);
    }

    function eliminar_indicador($idindicador) {
        $this->Crud_model->eliminar_registro('Indicador', 'idindicador',$idindicador);
    }

}


