<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lineaaccion_model extends CI_Model {

    public $idlineaaccion;
    public $codigo_lineaaccion;
    public $nombre_lineaaccion;
    public $descripcion_lineaaccion;
    public $idproyecto;
    public $idobjetivo;
    public $arrayLineaaccion;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arrayLineaaccion = array();
    }

    function obtener_lineasaccion($idobjetivo) {

        
        $this->idobjetivo=$idobjetivo;
        
        $arrayIndicadores = $this->Crud_model->consultar_registro('Lineaaccion', 'idobjetivo', $idobjetivo);
        $i = 0;
        foreach ($arrayIndicadores ->result() as $indicador) {
            $this->arrayLineaaccion[$i] = $indicador;
            $i++;
        }
    }

    function obtener_lineaaccion($idlineaaccion) {

        $arrayLineaAccion = $this->Crud_model->consultar_registro('Lineaaccion', 'idlineaaccion', $idlineaaccion);

        $i = 0;
        foreach ($arrayLineaAccion->result() as $lineaaccion) {

            $this->idlineaaccion = $lineaaccion->idlineaaccion;
            $this->idobjetivo = $lineaaccion->idobjetivo;
            $this->codigo_lineaaccion = $lineaaccion->codigo_lineaaccion;
            $this->nombre_lineaaccion = $lineaaccion->nombre_lineaaccion;
            $this->descripcion_lineaaccion = $lineaaccion->descripcion_lineaaccion;
            
            
            $i++;
        }
    }

    function crear_lineaaccion($arrayData) {
        return $this->Crud_model->crear_registro('Lineaaccion', $arrayData);
        
    }

    function editar_lineaaccion($idlineaaccion, $arrayData) {
        
        return $this->Crud_model->editar_registro('Lineaaccion', 'idlineaaccion', $idlineaaccion, $arrayData);
    }

    function eliminar_lineaaccion($idlineaaccion) {
        $this->Crud_model->eliminar_registro('Lineaaccion', 'idlineaaccion',$idlineaaccion);
    }

}


