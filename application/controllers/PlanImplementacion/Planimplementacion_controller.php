<?php

include_once APPPATH . 'libraries/Proyecto.php';
include_once APPPATH . 'libraries/Periodo.php';
include_once APPPATH . 'libraries/Regional.php';
include_once APPPATH . 'libraries/Macroactividad.php';

Class Planimplementacion_controller extends CI_CONTROLLER {

    public $modulo = "";
    public $clase = array();
    public $menuIndex = array();

    public function __construct() {

        parent::__construct();

        //Inicializa el modulo
        $this->modulo = $this->cargar_modulo();

        $this->clase["Proyecto"] = new Proyecto;
        $this->clase["Periodo"] = new Periodo;
        $this->clase["Regional"] = new Regional;
        $this->clase["Macroactividad"] = new Macroactividad;

        $this->load->library("Menu", array());
        $this->menu->rutaModulo = "Planimplementacion/planimplementacion_controller/";
        $this->menu->construir_menu_generico();
        $this->load->library("Encabezado");

        $this->load->helper('Menu');
        $this->load->helper('BarraAcciones_helper');


        $this->menuIndex["Proyecto"] = "cargar_menu_index_planimplementacion";
        $this->menuIndex["Regional"] = "cargar_menu_index_regional";
        $this->menuIndex["Periodo"] = "cargar_menu_index_periodo";
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

    public function index() {
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = "Proyecto";
        $this->clase[$this->modulo]->parametro = "";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_proyecto();
    }

    public function index_regional($idregistro) {
        $this->modulo = 'Regional';
        $this->clase[$this->modulo]->modulo = "Regional";
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $idregistro;
        $this->encabezado->construir_encabezado("REGIONALES", 0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $idregistro, "nombre_proyecto");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_regional();
    }

    public function index_periodo($idregistro) {

        $this->modulo = 'Periodo';
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->antecesor = "Regional";
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto') . "&idregional=" . $idregistro;

        $this->encabezado->construir_encabezado("PERIODOS", 0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
        $this->encabezado->construir_encabezado("PERIODOS", 1, "REGIONAL", "Regional_model", "obtener_regional", $idregistro, "nombre_regional");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;

        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_periodo($this->input->post('idproyecto'));
    }

    public function index_macroactividad($idregistro) {
        $this->modulo = 'Macroactividad';
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->antecesor = "Periodo";
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto') . "&idregional=" . $this->input->post('idregional') . "&idperiodo=" . $idregistro;

        $this->encabezado->construir_encabezado("PLAN IMPLEMENTACION", 0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
        $this->encabezado->construir_encabezado("PLAN IMPLEMENTACION", 1, "REGIONAL", "Regional_model", "obtener_regional", $this->input->post('idregional'), "nombre_regional");
        $this->encabezado->construir_encabezado("PLAN IMPLEMENTACION", 2, "PERIODO", "Periodo_model", "obtener_periodo", $idregistro, "codigo_periodo");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;

        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_macroactividad($this->input->post('idproyecto'), $this->input->post('idregional'), $idregistro);
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

    public function eliminar_registro($idregistro) {
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->crear_encabezado_nuevo('Lista');
        $this->clase[$this->modulo]->eliminar_registro($idregistro);
    }

    public function editar_registro($idregistro) {
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->crear_encabezado_nuevo('Lista');
        $this->clase[$this->modulo]->editar_registro($idregistro);
    }

    public function atras() {
        if ($this->modulo == "Macroactividad") {
            $idregistro = $this->input->post('idperiodo');
            $this->index_macroactividad($idregistro);
        }
        if ($this->modulo == "Periodo") {
            $idregistro = $this->input->post('idregional');
            $this->index_periodo($idregistro);
        }
        if ($this->modulo == "Regional") {
            $idregistro = $this->input->post('idproyecto');
            $this->index_regional($idregistro);
        }
        if ($this->modulo == "Proyecto") {
            $this->index();
        }
    }

    public function iniciar_menu($menuProyecto) {

        $arrayMenuEstandar = array();
        for ($i = 0; $i < sizeof($menuProyecto); $i++) {
            $llave = $menuProyecto[$i];
            $arrayMenuEstandar[$i]["Identificador"] = $llave;
        }


        construir_menu_estadar($arrayMenuEstandar, $this->menu);
    }

    public function cargar_menu_index_planimplementacion() {
        $indice = sizeof($this->menu->arrayMenu);
        $opcionesProyecto[$indice]["Etiqueta"] = "Regional";
        $opcionesProyecto[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_regional";
        $opcionesProyecto[$indice]["Imagen"] = base_url() . "img/regionales.png";
        $opcionesProyecto[$indice]["Identificador"] = "Regional_Lista";

        construir_menu_modulo($opcionesProyecto, $this->menu, $indice);
    }

    public function cargar_menu_index_regional() {


        $indice = sizeof($this->menu->arrayMenu);
        $opcionesProyecto[$indice]["Etiqueta"] = "Periodos";
        $opcionesProyecto[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_periodo";
        $opcionesProyecto[$indice]["Imagen"] = base_url() . "img/periodos.png";
        $opcionesProyecto[$indice]["Identificador"] = "Periodo_Lista";

        construir_menu_modulo($opcionesProyecto, $this->menu, $indice);
    }

    public function cargar_menu_index_periodo() {


        $indice = sizeof($this->menu->arrayMenu);
        $opcionesProyecto[$indice]["Etiqueta"] = "Actividades";
        $opcionesProyecto[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_macroactividad";
        $opcionesProyecto[$indice]["Imagen"] = base_url() . "img/actividades.png";
        $opcionesProyecto[$indice]["Identificador"] = "Actividad_Lista";
        

        construir_menu_modulo($opcionesProyecto, $this->menu, $indice);
    }

    public function cargar_menu_index_macroactividad() {
        
        $indice = sizeof($this->menu->arrayMenu);
        $opcionesProyecto[$indice]["Etiqueta"] = "Responsables";
        $opcionesProyecto[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_responsables";
        $opcionesProyecto[$indice]["Imagen"] = base_url() . "img/responsables.png";
        $opcionesProyecto[$indice]["Identificador"] = "Reponsable_Lista";
        
        construir_menu_modulo($opcionesProyecto, $this->menu, $indice);
        
    }

    public function menu_index() {
        if ($this->modulo == "Proyecto") {
            $barraAcciones = array();
        } elseif ($this->modulo == "Macroactividad") {
            $barraAcciones = array("Atras_Lista", "Nuevo_Lista", "Editar_Lista", "Eliminar_Lista");
        } else {
            $barraAcciones = array("Atras_Lista");
        }
        $this->iniciar_menu($barraAcciones);
        $objDestino = $this->menuIndex[$this->modulo];
        $this->$objDestino();
    }

    public function crear_encabezado_nuevo($etiqueta) {

        $this->clase[$this->modulo]->modulo = $this->modulo;

        if ($this->modulo == "Macroactividad") {

            if ($etiqueta == 'Nuevo') {
                $etiquetaFormulario = "NUEVO PLAN IMPLEMENTACI&Oacute;N";
            }

            if ($etiqueta == 'Lista') {
                $etiquetaFormulario = "PLAN IMPLEMENTACI&Oacute;N";
            }

            $this->clase[$this->modulo]->antecesor = "Periodo";
            $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto') . "&idregional=" . $this->input->post('idregional') . "&idperiodo=" . $this->input->post('idperiodo');

            $this->encabezado->construir_encabezado("PLAN IMPLEMENTACION", 0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
            $this->encabezado->construir_encabezado("PLAN IMPLEMENTACION", 1, "REGIONAL", "Regional_model", "obtener_regional", $this->input->post('idregional'), "nombre_regional");
            $this->encabezado->construir_encabezado("PLAN IMPLEMENTACION", 2, "PERIODO", "Periodo_model", "obtener_periodo", $this->input->post('idperiodo'), "codigo_periodo");
            $this->clase[$this->modulo]->encabezado = $this->encabezado;
        }



        if ($this->modulo == "Indicador") {

            if ($etiqueta == 'Nuevo') {
                $etiquetaFormulario = "NUEVO INDICADOR";
            }

            if ($etiqueta == 'Lista') {
                $etiquetaFormulario = "INDICADORES";
            }
            $this->clase[$this->modulo]->antecesor = "Objetivo";
            $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto') . "&idobjetivo=" . $this->input->post('idobjetivo');

            $this->encabezado->construir_encabezado("NUEVO INDICADOR", 0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
            $this->encabezado->construir_encabezado("NUEVO INDICADOR", 1, "OBJETIVO", "Objetivo_model", "obtener_objetivo", $this->input->post('idobjetivo'), "nombre_objetivo");
            $this->clase[$this->modulo]->encabezado = $this->encabezado;
        }
    }

}
