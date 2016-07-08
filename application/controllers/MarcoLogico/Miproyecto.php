<?php

include_once APPPATH . 'libraries/Proyectoinc.php';
include_once APPPATH . 'libraries/Objetivo.php';
include_once APPPATH . 'libraries/Indicador.php';
include_once APPPATH . 'libraries/Periodo.php';

Class Miproyecto extends CI_CONTROLLER {

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
        $this->clase["Proyecto"] = new Proyectoinc;
        $this->clase["Periodo"] = new Periodo;
        
        $this->load->library("Menu", array());
        $this->menu->rutaModulo="MarcoLogico/MiProyecto/";
        $this->menu->construir_menu_generico();
        $this->load->helper('Menu');
        $this->load->helper('BarraAcciones_helper');
        
        $this->menuIndex["Proyecto"]="cargar_menu_index_proyecto";
        $this->menuIndex["Objetivo"]="cargar_menu_index_objetivo";
        $this->menuIndex["Indicador"]="cargar_menu_index_indicador";
        $this->menuIndex["Periodo"]="cargar_menu_index_periodo";
        
        
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
        $this->clase[$this->modulo]->barraAcciones=$this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_proyecto();
    }

    public function index_objetivo($idregistro) {

        $this->modulo = 'Objetivo';
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones=$this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_objetivo($idregistro);
    }

    public function index_indicador($idregistro) {
        $this->modulo = 'Indicador';
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones=$this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_indicador($idregistro);
    }
    
    public function index_periodo($idregistro) {
        $this->modulo = 'Periodo';
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones=$this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_periodo($idregistro);
    }

    public function nuevo_registro() {
        $barraAcciones=array("Atras_Nuevo");
        $this->iniciar_menu($barraAcciones);
        $this->clase[$this->modulo]->barraAcciones=$this->menu->arrayMenu;
        $this->clase[$this->modulo]->nuevo_registro();
    }

    public function guardar_registro() {
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones=$this->menu->arrayMenu;
        $this->clase[$this->modulo]->guardar_registro();
    }
    
    public function editar_registro() {
        $barraAcciones=array("Atras_Nuevo");
        $this->iniciar_menu($barraAcciones);
        $this->clase[$this->modulo]->barraAcciones=$this->menu->arrayMenu;
        $this->clase[$this->modulo]->editar_registro();
    }

    public function eliminar_registro($idregistro) {
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones=$this->menu->arrayMenu;
        $this->clase[$this->modulo]->eliminar_registro($idregistro);
    }
 
    public function atras(){
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones=$this->menu->arrayMenu;
        $this->clase[$this->modulo]->atras();
    }

    public function iniciar_menu($menuProyecto) {

        $arrayMenuEstandar = array();
        for($i=0;$i<sizeof($menuProyecto);$i++){
            $llave=$menuProyecto[$i];
            $arrayMenuEstandar[$i]["Identificador"] = $llave;
        }
        
        
        construir_menu_estadar($arrayMenuEstandar, $this->menu);
        
    }
    
    public function cargar_menu_index_proyecto() {
        $indice=sizeof($this->menu->arrayMenu);
        $opcionesProyecto[$indice]["Etiqueta"] = "Objetivos";
        $opcionesProyecto[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo."index_objetivo";
        $opcionesProyecto[$indice]["Imagen"] = base_url() . "img/objetivos.png";
        $opcionesProyecto[$indice]["Identificador"] = "Objetivo_Lista";
        
        $indice=$indice+1;
        $opcionesProyecto[$indice]["Etiqueta"] = "Periodos";
        $opcionesProyecto[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo."index_periodo";
        $opcionesProyecto[$indice]["Imagen"] = base_url() . "img/periodos.png";
        $opcionesProyecto[$indice]["Identificador"] = "Periodo_Lista";

        construir_menu_modulo($opcionesProyecto, $this->menu, $indice);
    }
    
    public function cargar_menu_index_objetivo() {
        $indice=sizeof($this->menu->arrayMenu);
        $opcionesProyecto[$indice]["Etiqueta"] = "Indicadores";
        $opcionesProyecto[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo."index_indicador";
        $opcionesProyecto[$indice]["Imagen"] = base_url() . "img/indicadores.png";
        $opcionesProyecto[$indice]["Identificador"] = "Indicador_Lista";

        construir_menu_modulo($opcionesProyecto, $this->menu, $indice);
    }
    
    public function cargar_menu_index_indicador() {
        
        
    }
    
    public function cargar_menu_index_periodo() {
        
        
    }
    
    public function menu_index(){
        if($this->modulo=="Proyecto"){
            $barraAcciones=array("Nuevo_Lista", "Editar_Lista", "Eliminar_Lista");
        }
        else{
            $barraAcciones=array("Atras_Lista","Nuevo_Lista", "Editar_Lista", "Eliminar_Lista");
        }
        $this->iniciar_menu($barraAcciones);
        $objDestino=$this->menuIndex[$this->modulo];
        $this->$objDestino();
        
    }
    
}