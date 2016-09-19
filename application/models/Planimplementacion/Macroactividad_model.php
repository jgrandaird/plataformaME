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

            $this->idmacroactividad = $macroactividad->idmacroactividad;
            $this->codigo_macroactividad = $macroactividad->codigo_macroactividad;
            $this->nombre_macroactividad = $macroactividad->nombre_macroactividad;
            $this->descripcion_macroactividad = $macroactividad->descripcion_macroactividad;
            //$this->nombre_objetivo=$macroactividad->nombre_objetivo;
            $this->idproyecto = $macroactividad->idproyecto;
            $this->idobjetivo = $macroactividad->idobjetivo;
            $this->idregional = $macroactividad->idregional;
            $this->idperiodo = $macroactividad->idperiodo;

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
    
    function eliminar_personal_macroactividad($idmacroactividad) {
        $this->Crud_model->eliminar_registro('Macroactividad_persona', 'idmacroactividad', $idmacroactividad);
    }

    function adicionar_personal_macroactividad($arrayData) {

        return $this->Crud_model->crear_registro('Macroactividad_persona', $arrayData);
    }

    function obtener_personal_macroactividad($idmacroactividad, $personal) {
        $arrayResultado = $this->Crud_model->consultar_registros_abierto("SELECT macroactividad_persona.idmacroactividad "
                . " FROM macroactividad_persona"
                . " WHERE"
                . " macroactividad_persona.idpersonal='$personal' AND"
                . " macroactividad_persona.idmacroactividad='$idmacroactividad'");
        return $arrayResultado->num_rows();
    }

    function obtener_todopersonal_macroactividad($idmacroactividad) {

        $arrayPersonal = $this->Crud_model->consultar_registros_abierto("SELECT personal.nombres_persona,personal.apellidos_persona,"
                . " personal.idpersona,macroactividad_persona.idmacroactividad"
                . " FROM macroactividad_persona,personal"
                . " WHERE "
                . " macroactividad_persona.idpersonal=personal.idpersona AND "
                . " macroactividad_persona.idmacroactividad='$idmacroactividad'");
        
        return $arrayPersonal;
        
    }
    
    function obtener_todopersonalpi_macroactividad($idproyecto,$idregional,$idperiodo) {

        $arrayPersonal = $this->Crud_model->consultar_registros_abierto("SELECT personal.nombres_persona,personal.apellidos_persona,"
                . " macroactividad_persona.idmacroactividad"
                . " FROM macroactividad_persona,personal,macroactividad"
                . " WHERE "
                . " macroactividad_persona.idmacroactividad=macroactividad.idmacroactividad AND "
                . " macroactividad_persona.idpersonal=personal.idpersona AND "
                . " macroactividad.idregional='$idregional' AND"
                . " macroactividad.idproyecto='$idproyecto' AND"
                . " macroactividad.idperiodo='$idperiodo' ");
        
                
        return $arrayPersonal;
        
    }
    
    function adicionar_mes_semana($arrayData){
        return $this->Crud_model->crear_registro('Macroactividad_mes_semana', $arrayData);
    }
    
    function obtener_todos_mes_semana($idmacroactividad){
        $arrayResultado = $this->Crud_model->consultar_registros_abierto("SELECT "
                . " macroactividad_mes_semana.* "
                . " FROM macroactividad_mes_semana"
                . " WHERE "
                . " macroactividad_mes_semana.idmacroactividad='$idmacroactividad'");
        return $arrayResultado;
    }
    
    function obtener_mes_semana($idmacroactividad, $mes, $semana){
        $arrayResultado = $this->Crud_model->consultar_registros_abierto("SELECT "
                . " macroactividad_mes_semana.* "
                . " FROM macroactividad_mes_semana"
                . " WHERE "
                . " macroactividad_mes_semana.idmacroactividad='$idmacroactividad' AND"
                . " macroactividad_mes_semana.mes='$mes' AND"
                . " macroactividad_mes_semana.semana='$semana'");
        return $arrayResultado;
    }
    
    function eliminar_mes_semana($idmacroactividad, $mes, $semana){
        $this->Crud_model->eliminar_registro_abierto('delete from macroactividad_mes_semana where idmacroactividad='.$idmacroactividad.' AND mes='.$mes.' AND semana='.$semana);
    }
    
    function obtener_eventos_macroactividad($idmacroactividad){
        $arrayResultado = $this->Crud_model->consultar_registros_abierto("SELECT "
                . " events.title,events.description,events.date "
                . " FROM events,evento_macroactividad "
                . " WHERE "
                . " evento_macroactividad.idmacroactividad='$idmacroactividad' AND"
                . " events.id=evento_macroactividad.idevento "
                . " order by events.date desc");
        return $arrayResultado;
    }
    
    
}
