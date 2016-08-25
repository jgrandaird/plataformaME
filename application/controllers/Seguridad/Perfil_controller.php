<?php

include_once APPPATH . 'libraries/Perfil.php';
include_once APPPATH . 'libraries/Permiso.php';

Class Perfil_controller extends CI_CONTROLLER {

    public $modulo = "";
    public $clase = array();
    public $menuIndex = array();

    //<editor-fold defaultstate="collapsed" desc="Constructor y carge de entorno"> 
    
    public function __construct() {

        parent::__construct();

        $this->modulo = $this->cargar_modulo();


        $this->clase["Perfil"] = new Perfil;
        $this->clase["Permiso"] = new Permiso;


        $this->load->library("Menu", array());
        $this->menu->rutaModulo = "Seguridad/Perfil_controller/";
        $this->menu->construir_menu_generico();
        $this->load->library("Encabezado");
        $this->load->helper('Formulario_helper');
        $this->load->helper('BarraAcciones_helper');

        $this->menuIndex["Perfil"] = "cargar_menu_index_perfil";
        $this->menuIndex["Permiso"] = "cargar_menu_index_permiso";
    }

    public function cargar_modulo() {
        if (!$this->input->post('modulo')) {

            $modulo = "Perfil";
        } else {

            $modulo = $this->input->post('modulo');
        }
        //$modulo = $this->input->post('modulo');
        return $modulo;
    }

    //</editor-fold>
    
    //<editor-fold defaultstate="collapsed" desc="Index de cada módulo"> 

    public function index() {
        $this->modulo = 'Perfil';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "";
        $this->clase[$this->modulo]->antecesor = "";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->referencia = array();
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_perfil();
    }

    public function index_permisos($idregistro) {
        $this->modulo = 'Permiso';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "&idperfil=" . $idregistro;
        $this->clase[$this->modulo]->antecesor = "Perfil";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->construir_ruta_encabezado(0, "PERFIL", "Perfil_model", "obtener_perfil", $idregistro, "nombre_perfil");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_permisos($idregistro);
    }

    //</editor-fold>

    //<editor-fold defaultstate="collapsed" desc="Parametrización de menú y módulos"> 
    
    public function menu_index() {
        if ($this->modulo == "Perfil") {
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
        if ($modulo == 'Perfil') {
            
            $barraAcciones = array("Atras_Nuevo");
            $this->menu->filtrar_menu($barraAcciones);
            $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
            
            $this->clase[$this->modulo]->antecesor = "";
            $this->clase[$this->modulo]->parametro = "";
            $this->encabezado->referencia = array();
            $this->clase[$this->modulo]->encabezado = $this->encabezado;
        }
        if ($modulo == 'Permiso') {
            
            $barraAcciones = array("Atras_Nuevo");
            $this->menu->filtrar_menu($barraAcciones);
            $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
            
            $this->clase[$this->modulo]->antecesor = "Perfil";
            $this->clase[$this->modulo]->parametro = "&idperfil=" . $this->input->post('idperfil');
            $this->encabezado->construir_ruta_encabezado(0, "PERFIL", "Perfil_model", "obtener_perfil", $this->input->post('idperfil'), "nombre_perfil");
            $this->clase[$this->modulo]->encabezado = $this->encabezado;
        }
    }

    //</editor-fold>
    
    //<editor-fold defaultstate="collapsed" desc="CRUD módulo seguridad"> 

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
        if ($this->modulo == "Perfil") {
            $this->index();
        }
        if ($this->modulo == "Permiso") {
            $idregistro = $this->input->post('idperfil');
            $this->index_permisos($idregistro);
        }
    }

    //</editor-fold>
    
    //<editor-fold defaultstate="collapsed" desc="Menu Index personalizado por módulo"> 

    public function cargar_menu_index_perfil() {

        $indice = 0;
        $opcionesMenu=array();
        $opcionesMenu[$indice]["Etiqueta"] = "Permisos";
        $opcionesMenu[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_permisos";
        $opcionesMenu[$indice]["Imagen"] = base_url() . "img/permisos.png";
        $opcionesMenu[$indice]["Identificador"] = "Permiso_Lista";

        $this->menu->construir_menu_modulo($opcionesMenu);
    }

    public function cargar_menu_index_permiso() {
        
    }

    // </editor-fold>
}
