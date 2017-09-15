<?php

include_once APPPATH . 'libraries/Personal.php';
include_once APPPATH . 'libraries/Usuario.php';

Class Principal extends CI_CONTROLLER {

    public function __construct() {
        parent::__construct();

        $this->modulo = $this->cargar_modulo();

        $this->clase["Personal"] = new Personal;
        $this->clase["Usuario"] = new Usuario;

        $this->load->library("Menu", array());
        $this->menu->rutaModulo = "Principal/";
        $this->menu->construir_menu_generico();
        $this->load->library("Encabezado");
        $this->load->helper('Formulario_helper');
        $this->load->helper('BarraAcciones_helper');

        $this->menuIndex["Personal"] = "cargar_menu_index_personal";
        $this->menuIndex["Usuario"] = "cargar_menu_index_usuario";

        $this->load->model("Seguridad/Usuario_model");
        $this->load->model("Seguridad/Permiso_model");
        $this->load->model("Personal/Personal_model");
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


        $permisoPerfil = array();

        $arrayResultado = $this->Usuario_model->obtener_perfiles_usuario($this->session->userdata("nombre_usuario"));
        foreach ($arrayResultado->result() as $perfil) {
            $indicePerfil = $perfil->idperfil;
            $this->Permiso_model->arrayPermiso = array();
            $this->Permiso_model->obtener_permisos($perfil->idperfil);
            $permisoPerfil[$indicePerfil] = $this->Permiso_model->arrayPermiso;
            $this->identificar_perfil_monitoreo($indicePerfil);
        }

        $objPersona = new $this->Personal_model;
        $objPersona->obtener_persona($this->session->userdata("idfuncionario"));
        $data["icono_usuario"] = $this->icono_usuario($objPersona->sexo);
        $data["objPerfil"] = $arrayResultado;
        $data["arrayPerfil"] = $permisoPerfil;
        $this->load->view("plantilla/index.php", $data);
    }

    public function icono_usuario($sexo) {
        $iconosexo = "fa-male";
        if ($sexo === 'M') {
            $iconosexo = "fa-female";
        } else {
            $iconosexo = "fa-male";
        }
        return $iconosexo;
    }
    
    //El perfil de código 9 (Planeación y seguimiento) permitirá la edición de las actividades. Es una solución temporal hasta personalizar por usuario el superusuario
    public function identificar_perfil_monitoreo($perfil){
                
        if($perfil==='9'){
            $this->session->set_userdata('perfil_monitoreo',1);
        }
        
    }

    public function cerrar_sesion() {
        $this->session->sess_destroy();
        //$this->session->unset_userdata($datos_sesion);
        redirect(base_url() . "Login");
    }

    public function modificar_perfil($idregistro) {

        $this->parametrizar_variablesxmodulo($this->modulo);
        $this->clase[$this->modulo]->rutaModulo = $this->menu->rutaModulo;
        $this->clase[$this->modulo]->editar_registro($idregistro);
    }

    public function index_cambiar_clave() {
        $this->modulo = "Usuario";
        $this->parametrizar_variablesxmodulo($this->modulo);
        $this->clase[$this->modulo]->rutaModulo = $this->menu->rutaModulo;
        $this->clase[$this->modulo]->index_cambiar_clave();
    }

    public function guardar_registro() {
        $this->parametrizar_variablesxmodulo($this->modulo);
        $this->clase[$this->modulo]->rutaModulo = $this->menu->rutaModulo;
        $this->clase[$this->modulo]->guardar_registro();
        //$funcion = $this->clase[$this->modulo]->menuIndex;
        $this->modificar_perfil($this->session->userdata("idfuncionario"));
    }

	public function verificar_session(){
        $nombre_sesion=$this->session->userdata("nombre_usuario");
        echo $nombre_sesion;
    }
	
    public function parametrizar_variablesxmodulo($modulo) {

        $this->clase[$this->modulo]->modulo = $modulo;


        $barraAcciones = array("");
        $this->menu->filtrar_menu($barraAcciones);
        $this->clase[$this->modulo]->barraAcciones = $this->menu->arrayMenu;

        $this->clase[$this->modulo]->antecesor = "";
        $this->clase[$this->modulo]->parametro = "";
        $this->encabezado->referencia = array();
        $this->clase[$this->modulo]->encabezado = $this->encabezado;
    }

    function cargar_menu_index_personal() {
        
    }

    function cargar_menu_index_usuario() {
        
    }

}
