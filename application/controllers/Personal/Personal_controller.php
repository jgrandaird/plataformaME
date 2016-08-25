<?php

include_once APPPATH . 'libraries/Personal.php';

Class Personal_controller extends CI_CONTROLLER {

    public $modulo = "";
    public $clase = array();
    public $menuIndex = array();

    public function __construct() {

        parent::__construct();

        $this->modulo = $this->cargar_modulo();

        $this->clase["Personal"] = new Personal;
        
        $this->load->library("Menu", array());
        $this->menu->rutaModulo = "Personal/Personal_controller/";
        $this->menu->construir_menu_generico();
        $this->load->library("Encabezado");
        
        
        $this->load->helper('Menu');
        $this->load->helper('BarraAcciones_helper');
        
        
        
        $this->menuIndex["Personal"] = "cargar_menu_index_personal";
    }

    public function cargar_modulo() {
        if (!$this->input->post('modulo')) {

            $modulo = "Personal";
        } else {

            $modulo = $this->input->post('modulo');
        }
        return $modulo;
    }

    public function index() {
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = "Personal";
        $this->clase[$this->modulo]->parametro = "";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_personal();
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
        $this->clase[$this->modulo]->atras();
    }

    public function menu_index() {
        
        
        
        
        $this->clase[$this->modulo]->modulo=$this->modulo;
        $this->clase[$this->modulo]->parametro="";
        $this->encabezado->construir_titulo("PERSONAL");
        
        $this->clase[$this->modulo]->encabezado=$this->encabezado;
        
        if($this->modulo=="Personal"){
            $barraAcciones=array("Nuevo_Lista", "Editar_Lista", "Eliminar_Lista");
        }
        else{
            $barraAcciones=array("Atras_Lista","Nuevo_Lista", "Editar_Lista", "Eliminar_Lista");
        }
        $this->iniciar_menu($barraAcciones);
        $objDestino=$this->menuIndex[$this->modulo];
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

        $this->clase[$this->modulo]->modulo = $this->modulo;

        if ($this->modulo == "Personal") {

            if ($etiqueta == 'Nuevo') {
                $etiquetaFormulario = "Nueva Persona";
            }

            if ($etiqueta == 'Lista') {
                $etiquetaFormulario = "Personas";
            }

            $this->clase[$this->modulo]->antecesor = "";
            $this->clase[$this->modulo]->parametro = "";
            $this->encabezado->construir_titulo($etiquetaFormulario);
            $this->clase[$this->modulo]->encabezado = $this->encabezado;
        }
    }
    
    function cargar_menu_index_personal(){
        
    }

}
