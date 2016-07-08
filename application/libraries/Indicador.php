<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Indicador {

    public $CI;
    public $objModulo;
    public $idobjetivo;
    public $idproyecto;
    public $rutaJs;
    public $nombreProyecto;
    public $nombreObjetivo;
    public $barraAcciones;

    public function __construct() {

        $this->CI = & get_instance();
        $this->CI->load->model("MarcoLogico/Indicador_model");
        $this->CI->load->model("MarcoLogico/Objetivo_model");
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->rutaJs=base_url()."assets/js/indicador.js";
        
        
    }
    
    public function parametrizar_modulo($idobjetivo){

        $this->CI->Objetivo_model->obtener_objetivo($idobjetivo);
        $parametro="&idobjetivo=".$idobjetivo."&idproyecto=".$this->CI->Objetivo_model->idproyecto;
        $this->objModulo=new Modulo("Indicador", "Objetivo", $parametro);
        
    }
    
    
    public function obtener_informacion_predecesor($idobjetivo){
        $this->CI->Objetivo_model->obtener_objetivo($idobjetivo);
        $this->CI->Proyecto_model->obtener_proyecto($this->CI->Objetivo_model->idproyecto);
        
        $this->nombreObjetivo=$this->CI->Objetivo_model->nombre_objetivo;
        $this->nombreProyecto=$this->CI->Proyecto_model->nombre_proyecto;
        
        
    }

    public function index_indicador($idobjetivo) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;
        
        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo($idobjetivo);
        $data["objModulo"]=$this->objModulo;
        
        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;
        
        //Consulta los registros de la Objetivo (captura idproyecto)
        $this->CI->Objetivo_model->obtener_objetivo($idobjetivo);
        $data["objObjetivo"] = $this->CI->Objetivo_model;
        
        //Consulta los registros del indicador
        $this->CI->Indicador_model->obtener_indicadores($idobjetivo);
        $data["objIndicador"] = $this->CI->Indicador_model;
        
        //Informacion predecesor
        $this->obtener_informacion_predecesor($idobjetivo);
        $data["nombreProyecto"] = $this->nombreProyecto;
        $data["nombreObjetivo"] = $this->nombreObjetivo;
        
        //Carga la vista
        $this->CI->load->view('MarcoLogico/Lista_Indicador_view', $data);
    }

    public function nuevo_registro() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;
                
        $this->CI->Indicador_model->idobjetivo = $this->CI->input->post('idobjetivo');
        $this->CI->Indicador_model->idproyecto = $this->CI->input->post('idproyecto');
        
        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo($this->CI->Indicador_model->idobjetivo);
        $data["objModulo"]=$this->objModulo;
        
        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;
        
        //Consulta los registros del indicador
        $data["objRegistro"] = $this->CI->Indicador_model;
        
        //Informacion predecesor
        $this->obtener_informacion_predecesor($this->CI->input->post('idobjetivo'));
        $data["nombreProyecto"] = $this->nombreProyecto;
        $data["nombreObjetivo"] = $this->nombreObjetivo;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nuevo_Indicador_view', $data);
    }

    public function editar_registro() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;
        
        
        $this->CI->Indicador_model->idobjetivo = $this->CI->input->post('idobjetivo');
        $this->CI->Indicador_model->idproyecto = $this->CI->input->post('idproyecto');
        
        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo($this->CI->Indicador_model->idobjetivo);
        $data["objModulo"]=$this->objModulo;
        
        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Captura el id del indicador
        $idindicador = $this->CI->uri->segment(4);

        //Consulta los registros del indicador
        $this->CI->Indicador_model->obtener_indicador($idindicador);
        $data["objRegistro"] = $this->CI->Indicador_model;
        
        //Informacion predecesor
        $this->obtener_informacion_predecesor($this->CI->Indicador_model->idobjetivo);
        $data["nombreProyecto"] = $this->nombreProyecto;
        $data["nombreObjetivo"] = $this->nombreObjetivo;
        
        //Carga la vista
        return $this->CI->load->view('MarcoLogico/Nuevo_Indicador_view', $data);
    }

    public function guardar_registro() {

        $idproyecto = $this->CI->input->post('idproyecto');
        $idobjetivo = $this->CI->input->post('idobjetivo');
        $idindicador = $this->CI->input->post('idindicador');
        $data = array('nombre_indicador' => $this->CI->input->post('nombre_indicador'),
            'codigo_indicador' => $this->CI->input->post('codigo_indicador'),
            'descripcion_indicador' => $this->CI->input->post('descripcion_indicador'),
            'meta' => $this->CI->input->post('meta'),
            'tipo_indicador' => $this->CI->input->post('tipo_indicador'),
            'frecuencia_medicion_indicador' => $this->CI->input->post('frecuencia_medicion_indicador'),
            'idobjetivo' => $this->CI->input->post('idobjetivo'));

        //Si existe el proyecto, procede a actualizar registros
        if ($idindicador) {
            $resultadoOK = $this->CI->Indicador_model->editar_indicador($idindicador, $data);
            //Sin no existe el proyecto, procede a insertarlo
        } else {
            $resultadoOK = $this->CI->Indicador_model->crear_indicador($data);
        }


        if ($resultadoOK) {
            
        } else {
            
        }
        $this->index_indicador($idobjetivo);
    }

    public function eliminar_registro($idindicador) {
        $idproyecto = $this->CI->input->post('idproyecto');
        $idobjetivo = $this->CI->input->post('idobjetivo');

        $this->CI->Indicador_model->eliminar_indicador($idindicador);
        $this->index_indicador($idobjetivo);
    }

    public function iniciar_menu($menuFormulario) {

        $arrayMenuEstandar = array();
        for ($i = 0; $i < sizeof($menuFormulario); $i++) {
            $llave = $menuFormulario[$i];
            $arrayMenuEstandar[$i]["Identificador"] = $llave;
        }
        construir_menu_estadar($arrayMenuEstandar, $this->CI->menu);
    }

    public function atras() {
        $idobjetivo = $this->CI->input->post('idobjetivo');
        $this->index_indicador($idobjetivo);
    }

}
