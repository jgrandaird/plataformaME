<?php


include_once APPPATH . 'libraries/Regional.php';

Class Regional_controller extends CI_CONTROLLER {

    public $modulo = "";
    public $clase = array();
    public $menuIndex = array();

    public function __construct() {

        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->modulo = $this->cargar_modulo();

        $this->clase["Regional"] = new Regional;
        
        $this->load->library("Menu", array());
        $this->menu->rutaModulo = "MarcoLogico/Regional_controller/";
        $this->menu->construir_menu_generico();
         $this->load->library("Encabezado");
        $this->load->helper('Menu');
        $this->load->helper('BarraAcciones_helper');
        
        $this->menuIndex["Regional"]="cargar_menu_index_regional";
        
    }

    public function cargar_modulo() {
        if (!$this->input->post('modulo')) {

            $modulo = "Regional";
        } else {

            $modulo = $this->input->post('modulo');
        }
        return $modulo;
    }

    public function index() {
        
        
        $this->menu_index();
        $this->clase[$this->modulo]->barraAcciones=$this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_regional();
        
        
        /*
        $this->menu_index();
        $this->clase[$this->modulo]->modulo="Regional";
        $this->clase[$this->modulo]->parametro="";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->clase[$this->modulo]->index_regional();
         * */
         
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

    public function editar_registro($idregistro) {
        $barraAcciones=array("Atras_Nuevo");
        $this->iniciar_menu($barraAcciones);
        $this->clase[$this->modulo]->barraAcciones=$this->menu->arrayMenu;
        $this->clase[$this->modulo]->editar_registro($idregistro);
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
    
    public function cargar_deptos(){
        $this->clase[$this->modulo]->cargar_deptos();
    }
    
    public function cargar_municipios(){
        $this->clase[$this->modulo]->cargar_municipios();
    }

    public function iniciar_menu($menuProyecto) {

        $arrayMenuEstandar = array();
        for($i=0;$i<sizeof($menuProyecto);$i++){
            $llave=$menuProyecto[$i];
            $arrayMenuEstandar[$i]["Identificador"] = $llave;
        }
        
        
        construir_menu_estadar($arrayMenuEstandar, $this->menu);
        
    }
    
    public function menu_index(){
        
        $this->modulo = 'Regional';
        $this->clase[$this->modulo]->modulo="Regional";
        $this->clase[$this->modulo]->parametro="";
        $this->encabezado->construir_titulo("REGIONALES");
        
        $this->clase[$this->modulo]->encabezado=$this->encabezado;
        
        if($this->modulo=="Regional"){
            $barraAcciones=array("Nuevo_Lista", "Editar_Lista", "Eliminar_Lista");
        }
        else{
            $barraAcciones=array("Atras_Lista","Nuevo_Lista", "Editar_Lista", "Eliminar_Lista");
        }
        $this->iniciar_menu($barraAcciones);
        $objDestino=$this->menuIndex[$this->modulo];
        $this->$objDestino();
        
    }
    
    public function cargar_menu_index_regional(){
        
    }
    
}


