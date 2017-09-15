<?php

include_once APPPATH . 'libraries/Usuario.php';
include_once APPPATH . 'libraries/Perfil.php';

Class Usuario_controller extends CI_CONTROLLER {

    public $modulo = "";
    public $clase = array();
    public $menuIndex = array();

    //<editor-fold defaultstate="collapsed" desc="Constructor y carge de entorno"> 

    public function __construct() {

        parent::__construct();

        $this->modulo = $this->cargar_modulo();


        $this->clase["Usuario"] = new Usuario;
        $this->clase["Perfil"] = new Perfil;



        $this->load->library("Menu", array());
        $this->menu->rutaModulo = "Seguridad/Usuario_controller/";
        $this->menu->construir_menu_generico();
        $this->load->library("Encabezado");
        $this->load->helper('Formulario_helper');
        $this->load->helper('BarraAcciones_helper');

        $this->menuIndex["Perfil"] = "cargar_menu_index_perfil";
        $this->menuIndex["Usuario"] = "cargar_menu_index_usuario";
    }

    public function cargar_modulo() {
        if (!$this->input->post('modulo')) {

            $modulo = "Usuario";
        } else {

            $modulo = $this->input->post('modulo');
        }
        //$modulo = $this->input->post('modulo');
        return $modulo;
    }

    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc="Index de cada módulo"> 

    public function index() {
        $this->index_usuario();
    }

    public function index_usuario() {
        $this->modulo = 'Usuario';
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "";
        $this->clase[$this->modulo]->antecesor = "";
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->referencia = array();
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_usuario();
    }

    public function index_perfil($idregistro) {
        $this->modulo = 'Usuario';
        $this->clase[$this->modulo]->antecesor = "Usuario";
        $this->menu_index();
        $this->clase[$this->modulo]->modulo = $this->modulo;
        $this->clase[$this->modulo]->parametro = "&nombre_usuario=" . $idregistro;

        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;
        $this->encabezado->construir_ruta_encabezado(0, "USUARIO", "Usuario_model", "obtener_usuario", $idregistro, "nombre_usuario");
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
        $this->clase[$this->modulo]->index_check_perfiles($idregistro);
    }

    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc="Parametrización de menú y módulos"> 

    public function menu_index() {
        if ($this->modulo == "Usuario") {
            if ($this->clase[$this->modulo]->antecesor == 'Usuario') {
                $barraAcciones = array("Atras_Lista");
            } else {
                $barraAcciones = array("Nuevo_Lista", "Editar_Lista", "Eliminar_Lista");
            }
        } else {
            $barraAcciones = array("Atras_Lista");
        }
        $this->menu->filtrar_menu($barraAcciones);
        $objDestino = $this->menuIndex[$this->modulo];
        $this->$objDestino();
    }

    public function parametrizar_variablesxmodulo($modulo) {

        $this->clase[$this->modulo]->modulo = $modulo;
        if ($modulo == 'Usuario') {

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
        if ($this->modulo == "Usuario") {
            $this->index();
        }
        if ($this->modulo == "Perfil") {
            $this->index();
        }
    }

    //</editor-fold>
    //<editor-fold defaultstate="collapsed" desc="Menu Index personalizado por módulo"> 

    public function cargar_menu_index_usuario() {

        $indice = 0;
        $opcionesMenu = array();
        $opcionesMenu[$indice]["Etiqueta"] = "Perfiles";
        $opcionesMenu[$indice]["Funcion"] = base_url() . $this->menu->rutaModulo . "index_perfil";
        $opcionesMenu[$indice]["Imagen"] = base_url() . "img/permisos.png";
        $opcionesMenu[$indice]["Identificador"] = "Perfil_Lista";

        $this->menu->construir_menu_modulo($opcionesMenu);
    }

    public function cargar_menu_index_perfil() {
        
    }

    // </editor-fold>

    public function cambiar_clave() {

        $this->modulo = "Usuario";
        $arrayResultado = $this->clase[$this->modulo]->validar_usuario($this->session->userdata("nombre_usuario"));
        if ($arrayResultado->num_rows() > 0) {
            $this->clase[$this->modulo]->cambiar_clave($this->session->userdata("nombre_usuario"));
        } else {
            ?>
    <script language="JavaScript">
        alert("La contraseña actual no corresponde");
    </script>
            <?php

        }
        $this->parametrizar_variablesxmodulo($this->modulo);
        $this->clase[$this->modulo]->rutaModulo = $this->menu->rutaModulo;
        $this->clase[$this->modulo]->index_cambiar_clave();
    }

    public function adicionar_perfil_usuario() {

        $this->parametrizar_variablesxmodulo($this->modulo);
        $this->clase[$this->modulo]->adicionar_perfil();
        $funcion = $this->clase[$this->modulo]->menuIndex;

        $this->$funcion($this->clase[$this->modulo]->idregistro);
    }

}
