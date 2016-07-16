<?php

include_once APPPATH . 'libraries/Proyecto.php';
include_once APPPATH . 'libraries/Periodo.php';
include_once APPPATH . 'libraries/Regional.php';

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

        $this->load->library("Menu", array());
        $this->menu->rutaModulo = "Planimplementacion/planimplementacion_controller/";
        $this->menu->construir_menu_generico();
        $this->load->library("Encabezado");
        
        $this->load->helper('Menu');
        $this->load->helper('BarraAcciones_helper');
        

        $this->menuIndex["Proyecto"] = "cargar_menu_index_planimplementacion";
        $this->menuIndex["Regional"] = "cargar_menu_index_regional";
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
        $this->clase[$this->modulo]->modulo="Proyecto";
        $this->clase[$this->modulo]->parametro="";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_proyecto();
    }

    public function index_regional($idregistro) {
        $this->modulo = 'Regional';
        $this->clase[$this->modulo]->modulo="Regional";
        $this->clase[$this->modulo]->parametro="&idproyecto=".$idregistro;
        $this->encabezado->construir_encabezado("REGIONALES", 0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $idregistro,"nombre_proyecto");
        $this->clase[$this->modulo]->encabezado=$this->encabezado;
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones=$this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_regional();
    }

    public function index_periodo($idregistro) {
        
        $this->modulo = 'Periodo';
        $this->clase[$this->modulo]->modulo="Periodo";
        $this->clase[$this->modulo]->antecesor="Regional";
        $this->clase[$this->modulo]->parametro="&idproyecto=".$this->input->post('idproyecto')."&idregional=".$idregistro;
        
        $this->encabezado->construir_encabezado("PERIDOOS", 0, "PROYECTO", "Proyecto_model", "obtener_proyecto", $this->input->post('idproyecto'),"nombre_proyecto");
        $this->encabezado->construir_encabezado("PERIDOOS", 1, "REGIONAL", "Regional_model", "obtener_regional", $idregistro,"nombre_regional");
        $this->clase[$this->modulo]->encabezado=$this->encabezado;
        
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones=$this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_periodo($this->input->post('idproyecto'));
    }
    
    public function index_actividad($idregistro) {
        $this->modulo = 'Actividad';
        $this->clase[$this->modulo]->index_indicador($idregistro);
    }

    public function nuevo_registro() {
        $barraAcciones = array("Atras_Nuevo");
        $this->clase[$this->modulo]->barraAcciones = $barraAcciones;
        $this->clase[$this->modulo]->nuevo_registro();
    }

    public function guardar_registro() {
        $this->clase[$this->modulo]->guardar_registro();
    }

    public function eliminar_registro($idregistro) {
        $this->clase[$this->modulo]->eliminar_registro($idregistro);
    }

    public function editar_registro() {
        $barraAcciones = array("Atras_Nuevo");
        $this->clase[$this->modulo]->barraAcciones = $barraAcciones;
        $this->clase[$this->modulo]->editar_registro();
    }

    public function atras() {
        if($this->modulo=="Regional"){
            $idregistro=$this->input->post('idproyecto');
            $this->index_regional($idregistro);
        }
        if($this->modulo=="Proyecto"){
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
        $opcionesProyecto[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_actividad";
        $opcionesProyecto[$indice]["Imagen"] = base_url() . "img/actividades.png";
        $opcionesProyecto[$indice]["Identificador"] = "Actividad_Lista";

        construir_menu_modulo($opcionesProyecto, $this->menu, $indice);
    }
    
    public function menu_index() {
        if ($this->modulo == "Proyecto") {
            $barraAcciones = array();
        } else {
            $barraAcciones = array("Atras_Lista");
        }
        $this->iniciar_menu($barraAcciones);
        $objDestino = $this->menuIndex[$this->modulo];
        $this->$objDestino();
    }

}
