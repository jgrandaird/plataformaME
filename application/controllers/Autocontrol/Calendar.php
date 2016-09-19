<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

include_once APPPATH . 'libraries/Proyecto.php';
include_once APPPATH . 'libraries/Calendario.php';
include_once APPPATH . 'libraries/Macroactividad.php';


class Calendar extends CI_Controller {

    public $modulo = "";
    public $clase = array();
    public $menuIndex = array();
    
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->modulo = $this->cargar_modulo();
        $this->clase["Proyecto"] = new Proyecto;
        $this->clase["Calendario"] = new Calendario;
        $this->clase["Macroactividad"] = new Macroactividad;
        
        
        
        $this->load->library("Menu", array());
        $this->menu->rutaModulo = "Autocontrol/Calendar/";
        $this->menu->construir_menu_generico();
        $this->load->library("Encabezado");

        $this->load->helper('Formulario_helper');
        $this->load->helper('BarraAcciones_helper');

        $this->menuIndex["Proyecto"] = "cargar_menu_index_proyecto";
        $this->menuIndex["Calendario"] = "cargar_menu_index_calendario";
        $this->menuIndex["Macroactividad"] = "cargar_menu_index_macroactividad";
        
        
        
    }

    public function cargar_modulo() {
        if (!$this->input->post('modulo')) {

            $modulo = "Proyecto";
        } else {

            $modulo = $this->input->post('modulo');
        }
        return $modulo;
    }
    
    /* Home page Calendar view  */

    Public function index() {
        //$this->index_calendario(12, 1, 7);
        $this->index_proyecto();
    }
    
    
    Public function index_proyecto(){
        $this->modulo = 'Proyecto';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "";
        $this->clase[$this->modulo]->antecesor = "";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->referencia = array();
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_proyecto();
    }
    

    Public function index_calendario($idregistro) {//
        $this->modulo = 'Calendario';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $idregistro;
        $this->clase[$this->modulo]->antecesor = "Proyecto";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $idregistro, "nombre_proyecto");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_calendario($idregistro);
        
    }
    
    Public function index_macroactividad($idregistro) {//
        $this->modulo = 'Macroactividad';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $idregistro;
        $this->clase[$this->modulo]->antecesor = "Proyecto";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $idregistro, "nombre_proyecto");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_consulta_macroactividad($idregistro,$this->session->userdata("idregional_funcionario"),7);
        
    }
    
    public function index_linea_tiempo($idregistro) {


        $this->modulo = 'Macroactividad';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto') . "&idregional=" . $this->session->userdata("idregional_funcionario") . "&idperiodo=7&idmacroactividad=" . $idregistro;
        $this->clase[$this->modulo]->antecesor = "Proyecto";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
        $this->encabezado->construir_ruta_encabezado(1, "REGIONAL", "Regional_model", "obtener_regional", $this->session->userdata("idregional_funcionario"), "nombre_regional");
        $this->encabezado->construir_ruta_encabezado(2, "PERIODO", "Periodo_model", "obtener_periodo", 7, "codigo_periodo");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_linea_tiempo($idregistro);
    }
    
    public function menu_index() {
        if ($this->modulo == "Proyecto") {
            $barraAcciones = array();
        } else {
            $barraAcciones = array("Atras_Lista");
        }
        $this->menu->filtrar_menu($barraAcciones);
        $objDestino = $this->menuIndex[$this->modulo];
        $this->$objDestino();
    }

    /* Get all Events */

    Public function cambiar_periodo($idperiodo) {

        //$this->Calendar_model->ejemplo();

        $this->index_calendario(12, 1, $idperiodo);
    }

    Public function getEvents() {
        $this->parametrizar_variablesxmodulo($this->modulo);
        $result=$this->clase["Calendario"]->getEvents();
        //$result = $this->Calendar_model->getEvents();
        return json_encode($result);
    }

    /* Add new event */

    Public function addEvent() {
        $this->parametrizar_variablesxmodulo($this->modulo);
        $result=$this->clase["Calendario"]->addEvent();
        //$result = $this->Calendar_model->addEvent();
        echo $result;
    }

    /* Update Event */

    Public function updateEvent() {
        $this->parametrizar_variablesxmodulo($this->modulo);
        $result=$this->clase["Calendario"]->updateEvent();
        //$result = $this->Calendar_model->updateEvent();
        echo $result;
    }

    /* Delete Event */

    Public function deleteEvent() {
        $this->parametrizar_variablesxmodulo($this->modulo);
        $result=$this->clase["Calendario"]->deleteEvent();
        //$result = $this->Calendar_model->deleteEvent();
        echo $result;
    }

    Public function dragUpdateEvent() {
        $this->parametrizar_variablesxmodulo($this->modulo);
        $result=$this->clase["Calendario"]->dragUpdateEvent();

        //$result = $this->Calendar_model->dragUpdateEvent();
        echo $result;
    }
    
    Public function obtener_eventos_plan($idevento){
        $result=$this->clase["Calendario"]->obtener_eventos_plan($idevento);
        //$result = $this->Calendar_model->obtener_eventos_plan($idevento);
        print $result;
    }
    
    public function parametrizar_variablesxmodulo($modulo) {

        $this->clase[$this->modulo]->modulo = $modulo;

        if ($modulo == 'Calendario') {
            $barraAcciones = array("Atras_Nuevo");
            $this->menu->filtrar_menu($barraAcciones);
            $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
            $this->clase[$this->modulo]->antecesor = "Proyecto";
            $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto');
            $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
            $this->clase[$this->modulo]->encabezado = $this->encabezado;
        }

        
    }
    
    
    public function cargar_menu_index_proyecto() {
        $indice = 0;
        $opcionesMenu[$indice]["Etiqueta"] = "Programador";
        $opcionesMenu[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_calendario";
        $opcionesMenu[$indice]["Imagen"] = base_url() . "img/calendario.png";
        $opcionesMenu[$indice]["Identificador"] = "Programador_Lista";

        $indice = 1;
        $opcionesMenu[$indice]["Etiqueta"] = "Actividades";
        $opcionesMenu[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_macroactividad";
        $opcionesMenu[$indice]["Imagen"] = base_url() . "img/actividades.png";
        $opcionesMenu[$indice]["Identificador"] = "Actividad_Lista";
        

        $this->menu->construir_menu_modulo($opcionesMenu);
    }
    
    public function cargar_menu_index_calendario() {
        $indice = 0;
        $opcionesProyecto[$indice]["Etiqueta"] = "Buscador";
        $opcionesProyecto[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_calendario";
        $opcionesProyecto[$indice]["Imagen"] = base_url() . "img/buscar.png";
        $opcionesProyecto[$indice]["Identificador"] = "Buscador_Lista";

        

        $this->menu->construir_menu_modulo($opcionesProyecto);
    }
    
    public function cargar_menu_index_macroactividad() {

        $indice = 0;
        $opcionesMenu = array();
        $opcionesMenu[$indice]["Etiqueta"] = "Línea de Tiempo";
        $opcionesMenu[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_linea_tiempo";
        $opcionesMenu[$indice]["Imagen"] = base_url() . "img/lineatiempo.png";
        $opcionesMenu[$indice]["Identificador"] = "Lineatiempo_Lista";
        
        $this->menu->construir_menu_modulo($opcionesMenu);
    }

}
