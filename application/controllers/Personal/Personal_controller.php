<?php

include_once APPPATH . 'libraries/Personal.php';

Class Personal_controller extends CI_CONTROLLER {

    public $modulo = "";
    public $clase = array();
    public $menuIndex = array();

    //<editor-fold defaultstate="collapsed" desc="Constructor y carge de entorno"> 
    
    public function __construct() {

        parent::__construct();

        $this->modulo = $this->cargar_modulo();

        $this->clase["Personal"] = new Personal;
        
        $this->load->library("Menu", array());
        $this->menu->rutaModulo = "Personal/Personal_controller/";
        $this->menu->construir_menu_generico();
        $this->load->library("Encabezado");
        $this->load->helper('Formulario_helper');
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

    //</editor-fold>
    
    //<editor-fold defaultstate="collapsed" desc="Index de cada módulo"> 
    
    public function index(){
        $this->index_personal();
    }
    
    public function index_personal() {
        
        $this->modulo = 'Personal';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "";
        $this->clase[$this->modulo]->antecesor = "";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->referencia = array();
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_personal();
        
        
    }
    //</editor-fold>
    
    //<editor-fold defaultstate="collapsed" desc="Parametrización de menú y módulos"> 
    
    public function menu_index() {
        if ($this->modulo == "Personal") {
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
        if ($modulo == 'Personal') {
            
            $barraAcciones = array("Atras_Nuevo");
            $this->menu->filtrar_menu($barraAcciones);
            $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
            
            $this->clase[$this->modulo]->antecesor = "";
            $this->clase[$this->modulo]->parametro = "";
            $this->encabezado->referencia = array();
            $this->clase[$this->modulo]->encabezado = $this->encabezado;
        }
        
    }

    //</editor-fold>
    
    //<editor-fold defaultstate="collapsed" desc="CRUD módulo seguridad"> 
    
    public function nuevo_registro() {
        $this->parametrizar_variablesxmodulo($this->modulo);
        $this->clase[$this->modulo]->rutaModulo=$this->menu->rutaModulo;
        $this->clase[$this->modulo]->nuevo_registro();
    }

    public function guardar_registro() {
        $this->parametrizar_variablesxmodulo($this->modulo);
        $this->clase[$this->modulo]->rutaModulo=$this->menu->rutaModulo;
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
        $this->clase[$this->modulo]->rutaModulo=$this->menu->rutaModulo;
        $this->clase[$this->modulo]->editar_registro($idregistro);
    }

    public function atras() {
        if ($this->modulo == "Personal") {
            $this->index();
        }
        
    }

    //</editor-fold>
    
    public function subir_foto(){
        echo $this->clase[$this->modulo]->subir_foto_persona();
    }
    
    //<editor-fold defaultstate="collapsed" desc="Menu Index personalizado por módulo"> 
    
    
    function cargar_menu_index_personal(){
        
    }
    
    //</editor-fold>

}
