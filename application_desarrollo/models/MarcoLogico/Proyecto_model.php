<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto_model extends CI_Model {

    public $idproyecto;
    public $nombre_proyecto;
    public $codigo_proyecto;
    public $descripcion_proyecto;
    public $fecha_inicial_proyecto;
    public $fecha_final_proyecto;
    public $numero_periodos_proyecto;
    public $arrayProyectos;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arrayProyectos = array();
    }

    function obtener_proyectos() {

        $arrayProyectos = $this->Crud_model->consultar_registros('Proyecto');
        $i = 0;
        foreach ($arrayProyectos->result() as $proyecto) {
            $this->arrayProyectos[$i] = $proyecto;
            $i++;
        }
    }

    function obtener_proyecto($idproyecto) {

        $arrayProyecto = $this->Crud_model->consultar_registro('Proyecto', 'idproyecto', $idproyecto);

        $i = 0;
        foreach ($arrayProyecto->result() as $proyecto) {

            $this->idproyecto = $proyecto->idproyecto;
            $this->nombre_proyecto = $proyecto->nombre_proyecto;
            $this->codigo_proyecto = $proyecto->codigo_proyecto;
            $this->descripcion_proyecto = $proyecto->descripcion_proyecto;
            $this->fecha_inicial_proyecto = $proyecto->fecha_inicial_proyecto;
            $this->fecha_final_proyecto = $proyecto->fecha_final_proyecto;
            $this->numero_periodos_proyecto = $proyecto->numero_periodos_proyecto;
            $i++;
        }
    }

    function crear_proyecto($arrayData) {
        return $this->Crud_model->crear_registro('Proyecto', $arrayData);
        //array('nombre_proyecto' => $data['nombre_proyecto'], 'codigo_proyecto' => $data['codigo_proyecto'], 'descripcion_proyecto' => $data['descripcion_proyecto'], 'fecha_inicial_proyecto' => $data['fecha_inicial_proyecto'], 'fecha_final_proyecto' => $data['fecha_final_proyecto'], 'numero_periodos_proyecto' => $data['numero_periodos_proyecto'])
    }

    function editar_proyecto($idproyecto, $arrayData) {
        //$datos = array('nombre_proyecto' => $data['nombre_proyecto'], 'codigo_proyecto' => $data['codigo_proyecto'], 'descripcion_proyecto' => $data['descripcion_proyecto'], 'fecha_inicial_proyecto' => $data['fecha_inicial_proyecto'], 'numero_periodos_proyecto' => $data['numero_periodos_proyecto']);
        return $this->Crud_model->editar_registro('Proyecto', 'idproyecto', $idproyecto, $arrayData);
    }

    function eliminar_proyecto($idproyecto) {
        $this->Crud_model->eliminar_registro('Proyecto', 'idproyecto',$idproyecto);
    }

}
