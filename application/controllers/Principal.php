<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class Principal extends CI_CONTROLLER {

    public function __construct() {
        parent::__construct();
        
        $this->load->model("Seguridad/Usuario_model");
        $this->load->model("Seguridad/Permiso_model");
        
    }

    public function index() {

        
        $permisoPerfil = array();
        
        $arrayResultado=$this->Usuario_model->obtener_perfiles_usuario($this->session->userdata("nombre_usuario"));
        foreach ($arrayResultado->result() as $perfil) {
            $indicePerfil = $perfil->idperfil;
            $this->Permiso_model->arrayPermiso = array();
            $this->Permiso_model->obtener_permisos($perfil->idperfil);
            $permisoPerfil[$indicePerfil] = $this->Permiso_model->arrayPermiso;
        }


        $data["objPerfil"] = $arrayResultado;
        $data["arrayPerfil"] = $permisoPerfil;
        $this->load->view("plantilla/index.php", $data);
    }
    
    public function cerrar_sesion(){
        $this->session->sess_destroy();
        //$this->session->unset_userdata($datos_sesion);
        redirect(base_url() . "Login");
    }

    public function ir_a() {

        $modulo = $this->uri->segment(3);
        $pagina = $this->uri->segment(4);

        $destino = $modulo . "/" . $pagina;

        
        print redirect(base_url() . $destino);
    }

}
