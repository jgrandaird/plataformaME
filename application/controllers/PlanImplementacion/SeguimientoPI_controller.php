<?php

include_once APPPATH . 'libraries/Proyecto.php';
include_once APPPATH . 'libraries/Calendario.php';
include_once APPPATH . 'libraries/Macroactividad.php';
include_once APPPATH . 'libraries/Soporte.php';


class SeguimientoPI_controller extends CI_Controller {

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
        $this->clase["Soporte"] = new Soporte;

        $this->load->library("Menu", array());
        $this->menu->rutaModulo = "Planimplementacion/SeguimientoPI_controller/";
        $this->menu->construir_menu_generico();
        $this->load->library("Encabezado");

        $this->load->helper('Formulario_helper');
        $this->load->helper('BarraAcciones_helper');

        $this->menuIndex["Proyecto"] = "cargar_menu_index_proyecto";
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

    //<editor-fold defaultstate="collapsed" desc="Index seguimiento PI"> 


    Public function index() {
        $this->index_proyecto();
    }

    Public function index_proyecto() {
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

    Public function index_seguimiento_pi($idregistro) {
        $this->modulo = 'Macroactividad';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $idregistro;
        $this->clase[$this->modulo]->antecesor = "Proyecto";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->clase[$this->modulo]->rutaModulo=$this->menu->rutaModulo;
        $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $idregistro, "nombre_proyecto");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_seguimiento_pi($idregistro, $this->session->userdata("idregional_funcionario"), 7);
    }

    Public function cambiar_periodo($idproyecto, $idperiodo) {
        $this->modulo = 'Macroactividad';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $idproyecto;
        $this->clase[$this->modulo]->antecesor = "Proyecto";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->clase[$this->modulo]->rutaModulo=$this->menu->rutaModulo;
        $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $idproyecto, "nombre_proyecto");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_seguimiento_pi($idproyecto, $this->session->userdata("idregional_funcionario"), $idperiodo);
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

    public function menu_atras() {
        $barraAcciones = array("Atras_Lista");
        $this->menu->filtrar_menu($barraAcciones);
    }

    //</editor-fold>






    public function atras() {
        if ($this->modulo == "Proyecto") {
            $this->index();
            //$this->index_macroactividad($this->input->post('idproyecto'));
        }
        if ($this->modulo == "Consulta_Macroactividad") {
            $this->index_macroactividad($this->input->post('idproyecto'));
        }
    }

    public function cargar_menu_index_proyecto() {

        $indice = 0;
        $opcionesMenu[$indice]["Etiqueta"] = "Seguimiento";
        $opcionesMenu[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_seguimiento_pi";
        $opcionesMenu[$indice]["Imagen"] = base_url() . "img/seguimientopi.png";
        $opcionesMenu[$indice]["Identificador"] = "SeguimientoPI_Lista";
        $this->menu->construir_menu_modulo($opcionesMenu);
    }
    
    public function cargar_menu_index_macroactividad(){
        
    }

}
