<?php

include_once APPPATH . 'libraries/Proyecto.php';
include_once APPPATH . 'libraries/Periodo.php';
include_once APPPATH . 'libraries/Regional.php';
include_once APPPATH . 'libraries/Macroactividad.php';
include_once APPPATH . 'libraries/Personal.php';

Class Planimplementacion_controller extends CI_CONTROLLER {

    public $modulo = "";
    public $clase = array();
    public $menuIndex = array();

    //<editor-fold defaultstate="collapsed" desc="Constructor y carge de entorno"> 

    public function __construct() {

        parent::__construct();

        //Inicializa el modulo
        $this->modulo = $this->cargar_modulo();

        $this->clase["Proyecto"] = new Proyecto;
        $this->clase["Periodo"] = new Periodo;
        $this->clase["Regional"] = new Regional;
        $this->clase["Macroactividad"] = new Macroactividad;
        $this->clase["Personal"] = new Personal;

        $this->load->library("Menu", array());
        $this->menu->rutaModulo = "Planimplementacion/planimplementacion_controller/";
        $this->menu->construir_menu_generico();
        $this->load->library("Encabezado");

        $this->load->helper('Formulario_helper');
        $this->load->helper('BarraAcciones_helper');


        $this->menuIndex["Proyecto"] = "cargar_menu_index_planimplementacion";
        $this->menuIndex["Regional"] = "cargar_menu_index_regional";
        $this->menuIndex["Periodo"] = "cargar_menu_index_periodo";
        $this->menuIndex["Macroactividad"] = "cargar_menu_index_macroactividad";
        $this->menuIndex["Personal"] = "cargar_menu_index_personal";
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

    public function index_regional($idregistro) {

        $this->modulo = 'Regional';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $idregistro;
        $this->clase[$this->modulo]->antecesor = "Proyecto";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $idregistro, "nombre_proyecto");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_regional();
    }

    public function index_periodo($idregistro) {

        $this->modulo = 'Periodo';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto') . "&idregional=" . $idregistro;
        $this->clase[$this->modulo]->antecesor = "Regional";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
        $this->encabezado->construir_ruta_encabezado(1, "REGIONAL", "Regional_model", "obtener_regional", $idregistro, "nombre_regional");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_periodo($this->input->post('idproyecto'));
    }

    public function index_macroactividad($idregistro) {


        $this->modulo = 'Macroactividad';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto') . "&idregional=" . $this->input->post('idregional') . "&idperiodo=" . $idregistro;
        $this->clase[$this->modulo]->antecesor = "Periodo";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
        $this->encabezado->construir_ruta_encabezado(1, "REGIONAL", "Regional_model", "obtener_regional", $this->input->post('idregional'), "nombre_regional");
        $this->encabezado->construir_ruta_encabezado(2, "PERIODO", "Periodo_model", "obtener_periodo", $idregistro, "codigo_periodo");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_macroactividad($this->input->post('idproyecto'), $this->input->post('idregional'), $idregistro);
    }

    public function index_responsables($idregistro) {


        $this->modulo = 'Macroactividad';
        $this->menu_atras();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto') . "&idregional=" . $this->input->post('idregional') . "&idperiodo=" . $this->input->post('idperiodo') . "&idmacroactividad=" . $idregistro;
        $this->clase[$this->modulo]->antecesor = "Macroactividad";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
        $this->encabezado->construir_ruta_encabezado(1, "REGIONAL", "Regional_model", "obtener_regional", $this->input->post('idregional'), "nombre_regional");
        $this->encabezado->construir_ruta_encabezado(2, "PERIODO", "Periodo_model", "obtener_periodo", $this->input->post('idperiodo'), "codigo_periodo");
        $this->encabezado->construir_ruta_encabezado(3, "ACTIVIDAD", "Macroactividad_model", "obtener_macroactividad", $idregistro, "nombre_macroactividad");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_check_personal($idregistro);
    }
    
    public function index_linea_tiempo($idregistro) {


        $this->modulo = 'Macroactividad';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto') . "&idregional=" . $this->input->post('idregional') . "&idperiodo=" . $this->input->post('idperiodo') . "&idmacroactividad=" . $idregistro;
        $this->clase[$this->modulo]->antecesor = "Macroactividad";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
        $this->encabezado->construir_ruta_encabezado(1, "REGIONAL", "Regional_model", "obtener_regional", $this->input->post('idregional'), "nombre_regional");
        $this->encabezado->construir_ruta_encabezado(2, "PERIODO", "Periodo_model", "obtener_periodo", $this->input->post('idperiodo'), "codigo_periodo");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_linea_tiempo($idregistro);
    }

    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc="Parametrización de menú y módulos"> 

    public function menu_index() {
        
        if ($this->modulo == "Proyecto") {
            $barraAcciones = array();
        } elseif ($this->modulo == "Macroactividad") {
            $barraAcciones = array("Atras_Lista", "Nuevo_Lista", "Editar_Lista", "Eliminar_Lista");
            
        } else {
            $barraAcciones = array("Atras_Lista");
        }
        $this->menu->filtrar_menu($barraAcciones);
        $objDestino = $this->menuIndex[$this->modulo];
        $this->$objDestino();
    }

    public function parametrizar_variablesxmodulo($modulo) {

        $this->clase[$this->modulo]->modulo = $modulo;
        if ($modulo == 'Macroactividad') {

            $barraAcciones = array("Atras_Nuevo");
            $this->menu->filtrar_menu($barraAcciones);
            $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;

            $this->clase[$this->modulo]->antecesor = "Periodo";
            $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto') . "&idregional=" . $this->input->post('idregional') . "&idperiodo=" . $this->input->post('idperiodo');
            $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
            $this->encabezado->construir_ruta_encabezado(1, "REGIONAL", "Regional_model", "obtener_regional", $this->input->post('idregional'), "nombre_regional");
            $this->encabezado->construir_ruta_encabezado(2, "PERIODO", "Periodo_model", "obtener_periodo", $this->input->post('idperiodo'), "codigo_periodo");
            $this->clase[$this->modulo]->encabezado = $this->encabezado;
        }
        if ($modulo == 'Personal') {

            $barraAcciones = array("Atras_Nuevo");
            $this->menu->filtrar_menu($barraAcciones);
            $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;

            $this->clase[$this->modulo]->antecesor = "Macroactividad";
            $this->clase[$this->modulo]->parametro = "&idproyecto=" . $this->input->post('idproyecto') . "&idregional=" . $this->input->post('idregional') . "&idperiodo=" . $this->input->post('idperiodo') . "&idmacroactividad=" . $this->input->post('idmacroactividad');
            $this->encabezado->construir_ruta_encabezado(0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'), "nombre_proyecto");
            $this->encabezado->construir_ruta_encabezado(1, "REGIONAL", "Regional_model", "obtener_regional", $this->input->post('idregional'), "nombre_regional");
            $this->encabezado->construir_ruta_encabezado(2, "PERIODO", "Periodo_model", "obtener_periodo", $this->input->post('idperiodo'), "codigo_periodo");
            $this->encabezado->construir_ruta_encabezado(3, "ACTIVIDAD", "Macroactividad_model", "obtener_macroactividad", $this->input->post('idmacroactividad'), "nombre_macroactividad");
            $this->clase[$this->modulo]->encabezado = $this->encabezado;
        }
    }

    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc="CRUD módulo PI"> 

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

    public function eliminar_registro($idregistro) {
        $this->clase[$this->modulo]->eliminar_registro($idregistro);
        $funcion = $this->clase[$this->modulo]->menuIndex;
        $this->$funcion($this->clase[$this->modulo]->idregistro);
    }

    public function editar_registro($idregistro) {
        $this->parametrizar_variablesxmodulo($this->modulo);
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

    //</editor-fold>

    
    public function cargar_lineasaccion(){
        $this->clase[$this->modulo]->cargar_lineasaccion();
    }
    
    public function adicionar_personal() {
        
        $this->parametrizar_variablesxmodulo($this->modulo);
        $this->clase[$this->modulo]->adicionar_personal();
        $funcion = $this->clase[$this->modulo]->menuIndex;

        $this->$funcion($this->clase[$this->modulo]->idregistro);
        
        
         
    }

    public function adicionar_mes_semana($input_celda){
        $this->parametrizar_variablesxmodulo($this->modulo);
        $this->clase[$this->modulo]->adicionar_mes_semana($input_celda);
        //$funcion = $this->clase[$this->modulo]->menuIndex;
    }
    
    public function menu_atras(){
        $barraAcciones = array("Atras_Lista");
        $this->menu->filtrar_menu($barraAcciones);
    }
    
    //<editor-fold defaultstate="collapsed" desc="Menu Index personalizado por módulo"> 

    public function cargar_menu_index_planimplementacion() {
        $indice = 0;
        $opcionesMenu = array();
        $opcionesMenu[$indice]["Etiqueta"] = "Regional";
        $opcionesMenu[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_regional";
        $opcionesMenu[$indice]["Imagen"] = base_url() . "img/regionales.png";
        $opcionesMenu[$indice]["Identificador"] = "Regional_Lista";

        $this->menu->construir_menu_modulo($opcionesMenu);
    }

    public function cargar_menu_index_regional() {
        $indice = 0;
        $opcionesMenu = array();
        $opcionesMenu[$indice]["Etiqueta"] = "Periodos";
        $opcionesMenu[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_periodo";
        $opcionesMenu[$indice]["Imagen"] = base_url() . "img/periodos.png";
        $opcionesMenu[$indice]["Identificador"] = "Periodo_Lista";

        $this->menu->construir_menu_modulo($opcionesMenu);
    }

    public function cargar_menu_index_periodo() {
        $indice = 0;
        $opcionesMenu = array();
        $opcionesMenu[$indice]["Etiqueta"] = "Actividades";
        $opcionesMenu[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_macroactividad";
        $opcionesMenu[$indice]["Imagen"] = base_url() . "img/actividades.png";
        $opcionesMenu[$indice]["Identificador"] = "Actividad_Lista";

        $this->menu->construir_menu_modulo($opcionesMenu);
    }

    public function cargar_menu_index_macroactividad() {

        $indice = 0;
        $opcionesMenu = array();
        $opcionesMenu[$indice]["Etiqueta"] = "Responsables";
        $opcionesMenu[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_responsables";
        $opcionesMenu[$indice]["Imagen"] = base_url() . "img/responsables.png";
        $opcionesMenu[$indice]["Identificador"] = "Reponsable_Lista";

        $indice++;
        $opcionesMenu[$indice]["Etiqueta"] = "Línea de Tiempo";
        $opcionesMenu[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_linea_tiempo";
        $opcionesMenu[$indice]["Imagen"] = base_url() . "img/lineatiempo.png";
        $opcionesMenu[$indice]["Identificador"] = "Lineatiempo_Lista";
        
        $this->menu->construir_menu_modulo($opcionesMenu);
    }

    public function cargar_menu_index_personal() {
        $indice = 0;
        $opcionesMenu = array();
        $opcionesMenu[$indice]["Etiqueta"] = "Responsables";
        $opcionesMenu[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "adicionar_responsables";
        $opcionesMenu[$indice]["Imagen"] = base_url() . "img/adicionar_responsables.png";
        $opcionesMenu[$indice]["Identificador"] = "Reponsable_Lista";

        
        
        
        
        $this->menu->construir_menu_modulo($opcionesMenu);
    }

    //</editor-fold>
}
