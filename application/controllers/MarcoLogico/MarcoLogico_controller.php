<?php

include_once APPPATH . 'libraries/Proyecto.php';
include_once APPPATH . 'libraries/Objetivo.php';
include_once APPPATH . 'libraries/Indicador.php';
include_once APPPATH . 'libraries/Periodo.php';

Class MarcoLogico_controller extends CI_CONTROLLER {

    public $modulo = "";
    public $clase = array();
    public $menuIndex = array();

    //<editor-fold defaultstate="collapsed" desc="Constructor y carge de entorno"> 

    public function __construct() {

        parent::__construct();

        $this->modulo = $this->cargar_modulo();


        $this->clase["Indicador"] = new Indicador;
        $this->clase["Objetivo"] = new Objetivo;
        $this->clase["Proyecto"] = new Proyecto;
        $this->clase["Periodo"] = new Periodo;

        $this->load->library("Menu", array());
        $this->menu->rutaModulo = "MarcoLogico/MarcoLogico_controller/";
        $this->menu->construir_menu_generico();
        $this->load->library("Encabezado");

        $this->load->helper('Formulario_helper');
        $this->load->helper('BarraAcciones_helper');

        $this->menuIndex["Proyecto"] = "cargar_menu_index_proyecto";
        $this->menuIndex["Objetivo"] = "cargar_menu_index_objetivo";
        $this->menuIndex["Indicador"] = "cargar_menu_index_indicador";
        $this->menuIndex["Periodo"] = "cargar_menu_index_periodo";
    }

    public function cargar_modulo() {
        if (!$this->input->post('modulo')) {

            $modulo = "Proyecto";
        } else {

            $modulo = $this->input->post('modulo');
        }
        return $modulo;
    }

    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc="Index de cada módulo"> 

    public function index() {
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

    public function index_objetivo($idregistro) {
        $this->modulo = 'Objetivo';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $idregistro;
        $this->clase[$this->modulo]->antecesor = "Proyecto";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $idregistro, "nombre_proyecto");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_objetivo($idregistro);
    }

    public function index_indicador($idregistro) {
        $this->modulo = 'Indicador';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto') . "&idobjetivo=" . $idregistro;
        $this->clase[$this->modulo]->antecesor = "Objetivo";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto",  $this->input->post('idproyecto'), "nombre_proyecto");
        $this->encabezado->construir_ruta_encabezado(1, "OBJETIVO", "Objetivo_model", "obtener_objetivo", $idregistro, "nombre_objetivo");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_indicador($idregistro);
    }

    public function index_periodo($idregistro) {
        $this->modulo = 'Periodo';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $idregistro;
        $this->clase[$this->modulo]->antecesor = "Proyecto";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $idregistro, "nombre_proyecto");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_periodo($idregistro);
    }

    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc="Parametrización de menú y módulos"> 

    public function menu_index() {
        if ($this->modulo == "Proyecto") {
            $barraAcciones = array("Nuevo_Lista", "Editar_Lista", "Eliminar_Lista");
        } else {
            $barraAcciones = array("Atras_Lista", "Nuevo_Lista", "Editar_Lista", "Eliminar_Lista");
        }
        $this->menu->filtrar_menu($barraAcciones);
        $objDestino = $this->menuIndex[$this->modulo];
        $this->$objDestino();
    }

    public function parametrizar_variablesxmodulo($modulo) {

        $this->clase[$this->modulo]->modulo = $modulo;
        if ($modulo == 'Proyecto') {
            $barraAcciones = array("Atras_Nuevo");
            $this->menu->filtrar_menu($barraAcciones);
            $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
            $this->clase[$this->modulo]->antecesor = "";
            $this->clase[$this->modulo]->parametro = "";
            $this->encabezado->referencia = array();
            $this->clase[$this->modulo]->encabezado = $this->encabezado;
        }
        if ($modulo == 'Objetivo') {
            $barraAcciones = array("Atras_Nuevo");
            $this->menu->filtrar_menu($barraAcciones);
            $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
            $this->clase[$this->modulo]->antecesor = "Proyecto";
            $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto');
            $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
            $this->clase[$this->modulo]->encabezado = $this->encabezado;
        }
        if ($modulo == 'Indicador') {
            $barraAcciones = array("Atras_Nuevo");
            $this->menu->filtrar_menu($barraAcciones);
            $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
            $this->clase[$this->modulo]->antecesor = "Objetivo";
            $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto') . "&idobjetivo=" . $this->input->post('idobjetivo');
            $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
            $this->encabezado->construir_ruta_encabezado(1, "OBJETIVO", "Objetivo_model", "obtener_objetivo", $this->input->post('idobjetivo'), "nombre_objetivo");
            $this->clase[$this->modulo]->encabezado = $this->encabezado;
        }
        if ($modulo == 'Periodo') {
            $barraAcciones = array("Atras_Nuevo");
            $this->menu->filtrar_menu($barraAcciones);
            $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
            $this->clase[$this->modulo]->antecesor = "Proyecto";
            $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto');
            $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
            $this->clase[$this->modulo]->encabezado = $this->encabezado;
        }
    }

    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc="CRUD módulo Marco Lógico"> 

    public function nuevo_registro() {
        $this->parametrizar_variablesxmodulo($this->modulo);
        $this->clase[$this->modulo]->nuevo_registro();
    }

    public function guardar_registro() {
        $this->parametrizar_variablesxmodulo($this->modulo);
        $this->clase[$this->modulo]->guardar_registro();
        $funcion = $this->clase[$this->modulo]->menuIndex;
        $this->$funcion($this->clase[$this->modulo]->idregistro);
    }

    public function editar_registro($idregistro) {
        $this->parametrizar_variablesxmodulo($this->modulo);
        $this->clase[$this->modulo]->editar_registro($idregistro);
    }

    public function eliminar_registro($idregistro) {
        $this->clase[$this->modulo]->eliminar_registro($idregistro);
        $funcion = $this->clase[$this->modulo]->menuIndex;
        $this->$funcion($this->clase[$this->modulo]->idregistro);
    }

    public function atras() {
        if ($this->modulo == "Proyecto") {
            $this->index();
        }
        if ($this->modulo == "Objetivo") {
            $idregistro = $this->input->post('idproyecto');
            $this->index_objetivo($idregistro);
        }
        if ($this->modulo == "Indicador") {
            $idregistro = $this->input->post('idobjetivo');
            $this->index_indicador($idregistro);
        }
        if ($this->modulo == "Periodo") {
            $idregistro = $this->input->post('idproyecto');
            $this->index_periodo($idregistro);
        }
    }

    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc="Menu Index personalizado por módulo"> 


    public function cargar_menu_index_proyecto() {
        $indice = 0;
        $opcionesProyecto[$indice]["Etiqueta"] = "Objetivos";
        $opcionesProyecto[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_objetivo";
        $opcionesProyecto[$indice]["Imagen"] = base_url() . "img/objetivos.png";
        $opcionesProyecto[$indice]["Identificador"] = "Objetivo_Lista";

        $indice = $indice + 1;
        $opcionesProyecto[$indice]["Etiqueta"] = "Periodos";
        $opcionesProyecto[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_periodo";
        $opcionesProyecto[$indice]["Imagen"] = base_url() . "img/periodos.png";
        $opcionesProyecto[$indice]["Identificador"] = "Periodo_Lista";

        $this->menu->construir_menu_modulo($opcionesProyecto);
    }

    public function cargar_menu_index_objetivo() {
        $indice = 0;
        $opcionesProyecto[$indice]["Etiqueta"] = "Indicadores";
        $opcionesProyecto[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_indicador";
        $opcionesProyecto[$indice]["Imagen"] = base_url() . "img/indicadores.png";
        $opcionesProyecto[$indice]["Identificador"] = "Indicador_Lista";

        $this->menu->construir_menu_modulo($opcionesProyecto);
    }

    public function cargar_menu_index_indicador() {
        
    }

    public function cargar_menu_index_periodo() {
        
    }

    // </editor-fold>
}
