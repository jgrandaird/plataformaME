<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Calendario {

    public $CI;
    public $idevento;
    public $rutaJs;
    public $barraAcciones;
    public $antecesor;
    public $modulo;
    public $parametro;
    public $titulo_nuevo;
    public $titulo_lista;
    public $referencia;
    public $menuIndex;
    public $idregistro;
    public $idregional;
    public $idpersona;

    public function __construct() {

        $this->CI = & get_instance();
        $this->CI->load->model("Autocontrol/Calendar_model");
        $this->CI->load->model('Planimplementacion/Macroactividad_model');
        $this->CI->load->model('MarcoLogico/Periodo_model');
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->rutaJs = base_url() . "assets/js/main.js";
        $this->titulo_lista = "Programador";
        $this->titulo_nuevo = "";
        $this->referencia = array();
        $this->idevento = $this->CI->input->post('idevento');
        $this->idregistro = $this->CI->input->post('idproyecto');
        $this->idregional=$this->CI->session->userdata("idregional_funcionario");
        $this->idpersona=$this->CI->session->userdata("idfuncionario");
        
        $this->menuIndex = "index_calendario";
    }

    //Parámetros de variables globales
    public function parametrizar_modulo() {
        //En la vista se cargan los parámetros para ser enviados através de los formularios
        $this->objModulo = new Modulo($this->modulo, $this->antecesor, $this->parametro);
    }

    //Parametros del encabezado del formulario
    public function abrir_encabezado($titulo) {

        //Título del formulario
        $this->titulo = $titulo;

        //Cuerpo de la referencia (ruta) del formulario
        $i = 0;
        foreach ($this->encabezado->referencia as $referencia) {
            $modelo = $referencia["modelo"];
            $funcion = $referencia["funcion"];
            $idregistro = $referencia["idregistro"];
            $nombre_campo = $referencia["nombre_campo"];
            $this->CI->$modelo->$funcion($idregistro);
            $this->referencia[$i]["subtitulo"] = $referencia["subtitulo"];
            $this->referencia[$i]["nombre_campo"] = $this->CI->$modelo->$nombre_campo;
            $i++;
        }
    }

    public function index_calendario($idproyecto) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        $idregional=$this->idregional;
        $idpersona=$this->idpersona;
                
        $arrayPlanImplementacion=$this->CI->Macroactividad_model->obtener_plan_implementacion($idproyecto, $idregional);
        $this->CI->Periodo_model->obtener_periodos($idproyecto);
       
        $data["objPlan"] = $arrayPlanImplementacion;
        $data["objPeriodo"] = $this->CI->Periodo_model;
        $data["idregional"] = $idregional;
        $data["idpersona"] = $idpersona;
        $data["idproyecto"] = $idproyecto;
        $this->CI->load->view('Autocontrol/Calendario_view', $data);
        
    }
    
    Public function getEvents() {
        $result = $this->CI->Calendar_model->getEvents();
        echo json_encode($result);
    }

    /* Add new event */

    Public function addEvent() {
        $result = $this->CI->Calendar_model->addEvent();
        echo $result;
    }

    /* Update Event */

    Public function updateEvent() {
        $result = $this->CI->Calendar_model->updateEvent();
        echo $result;
    }

    /* Delete Event */

    Public function deleteEvent() {
        $result = $this->CI->Calendar_model->deleteEvent();
        echo $result;
    }

    Public function dragUpdateEvent() {

        $result = $this->CI->Calendar_model->dragUpdateEvent();
        echo $result;
    }
    
    Public function obtener_eventos_plan($idevento){
        $result = $this->CI->Calendar_model->obtener_eventos_plan($idevento);
        echo $result;
    }
    
    

}