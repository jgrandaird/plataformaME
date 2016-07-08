<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Objetivo {

    public $CI;
    public $objModulo;
    public $idproyecto;
    public $rutaJs;
    public $nombreProyecto;
    public $barraAcciones;

    public function __construct() {

        $this->CI = & get_instance();
        $this->CI->load->model("MarcoLogico/Objetivo_model");
        $this->CI->load->model("MarcoLogico/Proyecto_model");
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->rutaJs = base_url() . "assets/js/objetivo.js";
    }

    public function parametrizar_modulo($idproyecto) {

        $parametro = "&idproyecto=" . $idproyecto;
        $this->objModulo = new Modulo("Objetivo", "Proyecto", $parametro);
    }

    public function obtener_informacion_predecesor($idproyecto) {
        $this->CI->Proyecto_model->obtener_proyecto($idproyecto);
        $this->nombreProyecto = $this->CI->Proyecto_model->nombre_proyecto;
    }

    public function index_objetivo($idproyecto) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo($idproyecto);
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del Objetivo
        $this->CI->Objetivo_model->obtener_objetivos($idproyecto);
        $data["objObjetivo"] = $this->CI->Objetivo_model;

        //Informacion predecesor
        $this->obtener_informacion_predecesor($idproyecto);
        $data["nombreProyecto"] = $this->nombreProyecto;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Lista_Objetivo_view', $data);
    }

    public function nuevo_registro() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo($this->CI->input->post('idproyecto'));
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del Objetivo
        $this->CI->Objetivo_model->idproyecto = $this->CI->input->post('idproyecto');
        $data["objRegistro"] = $this->CI->Objetivo_model;

        //Informacion predecesor
        $this->obtener_informacion_predecesor($this->CI->input->post('idproyecto'));
        $data["nombreProyecto"] = $this->nombreProyecto;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nuevo_Objetivo_view', $data);
    }

    public function editar_registro() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        $idobjetivo = $this->CI->uri->segment(4);
        $idproyecto = $this->CI->input->post('idproyecto');

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo($idproyecto);
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del Objetivo
        $this->CI->Objetivo_model->obtener_objetivo($idobjetivo);
        $data["objRegistro"] = $this->CI->Objetivo_model;

        //Informacion predecesor
        $this->obtener_informacion_predecesor($idproyecto);
        $data["nombreProyecto"] = $this->nombreProyecto;

        //Carga la vista
        return $this->CI->load->view('MarcoLogico/Nuevo_Objetivo_view', $data);
    }

    public function guardar_registro() {

        $idproyecto = $this->CI->input->post('idproyecto');
        $idobjetivo = $this->CI->input->post('idobjetivo');
        $data = array('nombre_objetivo' => $this->CI->input->post('nombre_objetivo'),
            'codigo_objetivo' => $this->CI->input->post('codigo_objetivo'),
            'descripcion_objetivo' => $this->CI->input->post('descripcion_objetivo'),
            'idproyecto' => $this->CI->input->post('idproyecto'));

        //Si existe el proyecto, procede a actualizar registros
        if ($idobjetivo) {
            $resultadoOK = $this->CI->Objetivo_model->editar_objetivo($idobjetivo, $data);
            //Sin no existe el proyecto, procede a insertarlo
        } else {
            $resultadoOK = $this->CI->Objetivo_model->crear_objetivo($data);
        }


        if ($resultadoOK) {
            
        } else {
            
        }
        $this->index_objetivo($idproyecto);
    }

    public function eliminar_registro($idobjetivo) {
        $idproyecto = $this->CI->input->post('idproyecto');
        $this->CI->Objetivo_model->eliminar_objetivo($idobjetivo);
        $this->index_objetivo($idproyecto);
    }

    public function atras() {
        $idproyecto = $this->CI->input->post('idproyecto');
        $this->index_objetivo($idproyecto);
    }

}
