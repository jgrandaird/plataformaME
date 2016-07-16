<?php

include_once APPPATH . 'libraries/Proyecto.php';
include_once APPPATH . 'libraries/Objetivo.php';
include_once APPPATH . 'libraries/Indicador.php';
include_once APPPATH . 'libraries/Periodo.php';

Class MarcoLogico_controller extends CI_CONTROLLER {

    public $modulo = "";
    public $clase = array();
    public $menuIndex = array();

    public function __construct() {

        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->modulo = $this->cargar_modulo();


        $this->clase["Indicador"] = new Indicador;
        $this->clase["Objetivo"] = new Objetivo;
        $this->clase["Proyecto"] = new Proyecto;
        $this->clase["Periodo"] = new Periodo;

        $this->load->library("Menu", array());
        $this->menu->rutaModulo = "MarcoLogico/MarcoLogico_controller/";
        $this->menu->construir_menu_generico();
        $this->load->library("Encabezado");

        $this->load->helper('Menu');
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

    public function index() {
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = "Proyecto";
        $this->clase[$this->modulo]->parametro = "";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_proyecto();
    }

    public function index_objetivo($idregistro) {
        $this->modulo = 'Objetivo';
        $this->clase[$this->modulo]->modulo = "Objetivo";
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $idregistro;
        $this->encabezado->construir_encabezado("OBJETIVOS", 0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $idregistro, "nombre_proyecto");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_objetivo($idregistro);
    }

    public function index_indicador($idregistro) {
        $this->modulo = 'Indicador';

        $this->clase[$this->modulo]->modulo = "Periodo";
        $this->clase[$this->modulo]->antecesor = "Regional";
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto') . "&idobjetivo=" . $idregistro;

        $this->encabezado->construir_encabezado("INDICADOR", 0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
        $this->encabezado->construir_encabezado("INDICADOR", 1, "OBJETIVO", "Objetivo_model", "obtener_objetivo", $idregistro, "nombre_objetivo");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;

        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_indicador($idregistro);
    }

    public function index_periodo($idregistro) {

        //Inicializa módulo
        $this->modulo = 'Periodo';
        $this->clase[$this->modulo]->modulo = "Periodo";

        //Parametriza variables de paso por url
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $idregistro;

        //Parametriza encabezado
        $this->encabezado->construir_encabezado("REGIONALES", 0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $idregistro, "nombre_proyecto");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;

        //Construye barra de acciones
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;

        //LLamado a la construcción del formulario
        $this->clase[$this->modulo]->index_periodo($idregistro);
    }

    public function nuevo_registro() {

        $barraAcciones = array("Atras_Nuevo");
        $this->iniciar_menu($barraAcciones);
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        
        $this->crear_encabezado_nuevo('Nuevo');
        $this->clase[$this->modulo]->nuevo_registro();
    }

    public function guardar_registro() {
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->crear_encabezado_nuevo('Lista');
        $this->clase[$this->modulo]->guardar_registro();
    }

    public function editar_registro($idregistro) {
        $barraAcciones = array("Atras_Nuevo");
        $this->iniciar_menu($barraAcciones);
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->crear_encabezado_nuevo('Nuevo');
        $this->clase[$this->modulo]->editar_registro($idregistro);
    }

    public function eliminar_registro($idregistro) {
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->crear_encabezado_nuevo('Nuevo');
        $this->clase[$this->modulo]->eliminar_registro($idregistro);
    }

    public function atras() {



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

        if ($this->modulo == "Proyecto") {
            $this->index();
        }
    }

    public function menu_index() {
        if ($this->modulo == "Proyecto") {
            $barraAcciones = array("Nuevo_Lista", "Editar_Lista", "Eliminar_Lista");
        } else {
            $barraAcciones = array("Atras_Lista", "Nuevo_Lista", "Editar_Lista", "Eliminar_Lista");
        }
        $this->iniciar_menu($barraAcciones);
        $objDestino = $this->menuIndex[$this->modulo];
        $this->$objDestino();
    }

    public function iniciar_menu($menuProyecto) {

        $arrayMenuEstandar = array();
        for ($i = 0; $i < sizeof($menuProyecto); $i++) {
            $llave = $menuProyecto[$i];
            $arrayMenuEstandar[$i]["Identificador"] = $llave;
        }


        construir_menu_estadar($arrayMenuEstandar, $this->menu);
    }

    public function crear_encabezado_nuevo($etiqueta) {

        if ($this->modulo == "Objetivo") {

            if($etiqueta=='Nuevo'){
                $etiquetaFormulario="Nuevo Objetivo";
            }
            
            if($etiqueta=='Lista'){
                $etiquetaFormulario="Objetivos";
            }
            
            
            $this->clase[$this->modulo]->modulo = "Objetivo";
            $this->clase[$this->modulo]->antecesor = "Proyecto";
            $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto');

            $this->encabezado->construir_encabezado($etiquetaFormulario, 0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
            $this->clase[$this->modulo]->encabezado = $this->encabezado;
        }
        
        if ($this->modulo == "Indicador") {

            $this->clase[$this->modulo]->modulo = "Indicador";
            $this->clase[$this->modulo]->antecesor = "Objetivo";
            $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto') . "&idobjetivo=" . $this->input->post('idobjetivo');

            $this->encabezado->construir_encabezado("NUEVO INDICADOR", 0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
            $this->encabezado->construir_encabezado("NUEVO INDICADOR", 1, "OBJETIVO", "Objetivo_model", "obtener_objetivo", $this->input->post('idobjetivo'), "nombre_objetivo");
            $this->clase[$this->modulo]->encabezado = $this->encabezado;
        }
        
        
    }

    public function cargar_menu_index_proyecto() {
        $indice = sizeof($this->menu->arrayMenu);
        $opcionesProyecto[$indice]["Etiqueta"] = "Objetivos";
        $opcionesProyecto[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_objetivo";
        $opcionesProyecto[$indice]["Imagen"] = base_url() . "img/objetivos.png";
        $opcionesProyecto[$indice]["Identificador"] = "Objetivo_Lista";

        $indice = $indice + 1;
        $opcionesProyecto[$indice]["Etiqueta"] = "Periodos";
        $opcionesProyecto[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_periodo";
        $opcionesProyecto[$indice]["Imagen"] = base_url() . "img/periodos.png";
        $opcionesProyecto[$indice]["Identificador"] = "Periodo_Lista";

        construir_menu_modulo($opcionesProyecto, $this->menu, $indice);
    }

    public function cargar_menu_index_objetivo() {
        $indice = sizeof($this->menu->arrayMenu);
        $opcionesProyecto[$indice]["Etiqueta"] = "Indicadores";
        $opcionesProyecto[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_indicador";
        $opcionesProyecto[$indice]["Imagen"] = base_url() . "img/indicadores.png";
        $opcionesProyecto[$indice]["Identificador"] = "Indicador_Lista";

        construir_menu_modulo($opcionesProyecto, $this->menu, $indice);
    }

    public function cargar_menu_index_indicador() {
        
    }

    public function cargar_menu_index_periodo() {
        
    }

}
