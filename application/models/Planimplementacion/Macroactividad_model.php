<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Macroactividad_model extends CI_Model {

    public $idmacroactividad;
    public $codigo_macroactividad;
    public $nombre_macroactividad;
    public $descripcion_macroactividad;
    public $nombre_objetivo;
    public $idproyecto;
    public $idobjetivo;
    public $idregional;
    public $idperiodo;
    public $arrayMacroactividad;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arrayMacroactividad = array();
    }

    function obtener_macroactividades($idproyecto, $idregional, $idperiodo) {

        $this->idproyecto = $idproyecto;
        $this->idregional = $idregional;
        $this->idperiodo = $idperiodo;


        $select = "SELECT objetivo.nombre_objetivo,"
                . "macroactividad.idmacroactividad,"
                . "macroactividad.codigo_macroactividad,"
                . "macroactividad.nombre_macroactividad,"
                . "macroactividad.descripcion_macroactividad,"
                . "macroactividad.idobjetivo,"
                . "macroactividad.idperiodo,"
                . "macroactividad.idregional "
                . "FROM "
                . "macroactividad,objetivo "
                . "WHERE "
                . "objetivo.idobjetivo=macroactividad.idobjetivo AND "
                . "macroactividad.idproyecto='$this->idproyecto' AND "
                . "macroactividad.idperiodo='$this->idperiodo' AND "
                . "macroactividad.idregional='$this->idregional' "
                . "ORDER BY "
                . "objetivo.codigo_objetivo,"
                . "macroactividad.codigo_macroactividad";
        $arrayMacroactividad = $this->Crud_model->consultar_registros_abierto($select);
        $i = 0;
        foreach ($arrayMacroactividad->result() as $macroactividad) {
            $this->arrayMacroactividad[$i] = $macroactividad;
            $i++;
        }
    }

    function obtener_macroactividad($idmacroactividad) {

        //$this->idproyecto = $idproyecto;
        //$this->idregional = $idregional;
        //$this->idperiodo = $idperiodo;
        //$this->idobjetivo = $idobjetivo;

        $select = "SELECT objetivo.nombre_objetivo,"
                . "macroactividad.idmacroactividad,"
                . "macroactividad.codigo_macroactividad,"
                . "macroactividad.nombre_macroactividad,"
                . "macroactividad.descripcion_macroactividad,"
                . "macroactividad.idobjetivo,"
                . "macroactividad.idperiodo,"
                . "macroactividad.idregional "
                . "FROM "
                . "macroactividad,objetivo "
                . "WHERE "
                . "objetivo.idobjetivo=macroactividad.idobjetivo AND "
                . "macroactividad.idmacroactividad='$idmacroactividad' "
                . "ORDER BY "
                . "objetivo.codigo_objetivo,"
                . "macroactividad.codigo_macroactividad";

        $arrayMacroactividad = $this->Crud_model->consultar_registro('Macroactividad', 'idmacroactividad', $idmacroactividad);

        $i = 0;
        foreach ($arrayMacroactividad->result() as $macroactividad) {

            $this->idmacroactividad=$macroactividad->idmacroactividad;
            $this->codigo_macroactividad=$macroactividad->codigo_macroactividad;
            $this->nombre_macroactividad=$macroactividad->nombre_macroactividad;
            $this->descripcion_macroactividad=$macroactividad->descripcion_macroactividad;
            //$this->nombre_objetivo=$macroactividad->nombre_objetivo;
            $this->idproyecto=$macroactividad->idproyecto;
            $this->idobjetivo=$macroactividad->idobjetivo;
            $this->idregional=$macroactividad->idregional;
            $this->idperiodo=$macroactividad->idperiodo;

            $i++;
        }
    }

    function crear_macroactividad($arrayData) {
        return $this->Crud_model->crear_registro('Macroactividad', $arrayData);
    }

    function editar_macroactividad($idmacroactividad, $arrayData) {

        return $this->Crud_model->editar_registro('Macroactividad', 'idmacroactividad', $idmacroactividad, $arrayData);
    }

    function eliminar_macroactividad($idmacroactividad) {
        $this->Crud_model->eliminar_registro('Macroactividad', 'idmacroactividad', $idmacroactividad);
    }

}
