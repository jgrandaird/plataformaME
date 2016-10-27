<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Soporte_model extends CI_Model {

    public $idsoporte;
    public $nombre_soporte;
    public $tamano_soporte;
    public $extension_soporte;
    public $ruta_soporte;
    public $idevento;
    public $idproyecto;
    public $idregional;
    public $idperiodo;
    public $estado;
    public $arraySoportes;

      
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arraySoportes = array();
    }

    function obtener_soportes($idevento) {

        $arraySoportes = $this->Crud_model->consultar_registro('Soporte','idevento',$idevento);
        $i = 0;
        foreach ($arraySoportes->result() as $soporte) {
            $this->arraySoportes[$i] = $soporte;
            $i++;
        }
    }

    function obtener_soporte($idsoporte) {

        $arraySoporte = $this->Crud_model->consultar_registro('Soporte', 'idsoporte', $idsoporte);

        $i = 0;
        foreach ($arraySoporte->result() as $soporte) {

            $this->idsoporte = $soporte->idsoporte;
            $this->nombre_soporte = $soporte->nombre_soporte;
            $this->tamano_soporte = $soporte->tamano_soporte;
            $this->extension_soporte = $soporte->extension_soporte;
            $this->ruta_soporte = $soporte->ruta_soporte;
            $this->idevento = $soporte->idevento;
            $this->idproyecto = $soporte->idproyecto;
            $this->idregional = $soporte->idregional;
            $this->idperiodo = $soporte->idperiodo;
            $i++;
        }
        
    }

    function crear_soporte($arrayData) {
        return $this->Crud_model->crear_registro('Soporte', $arrayData);
    }

    function editar_soporte($idsoporte, $arrayData) {
        return $this->Crud_model->editar_registro('Soporte', 'idsoporte', $idsoporte, $arrayData);
    }

    function eliminar_soporte($idsoporte) {
        $this->Crud_model->eliminar_registro('Soporte', 'idsoporte', $idsoporte);
    }

}

