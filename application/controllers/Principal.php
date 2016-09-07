<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class Principal extends CI_CONTROLLER {

    public function __construct() {
        parent::__construct();
        $this->load->model("Seguridad/Perfil_model");
        $this->load->model("Seguridad/Permiso_model");
        
    }

    public function index() {

        

//print $this->session->userdata("nombre_usuario");
        
        $permisoPerfil = array();
        $this->Perfil_model->obtener_perfiles();
        foreach ($this->Perfil_model->arrayPerfil as $perfil) {
            $indicePerfil = $perfil->idperfil;
            $this->Permiso_model->arrayPermiso = array();
            $this->Permiso_model->obtener_permisos($perfil->idperfil);
            $permisoPerfil[$indicePerfil] = $this->Permiso_model->arrayPermiso;
        }


        $data["objPerfil"] = $this->Perfil_model;
        $data["arrayPerfil"] = $permisoPerfil;
        $this->load->view("plantilla/index.php", $data);
    }
    
    public function cerrar_sesion(){
        
        $this->session->unset_userdata($datos_sesion);
        redirect(base_url() . "Login");
    }

    public function ir_a() {

        $modulo = $this->uri->segment(3);
        $pagina = $this->uri->segment(4);

        $destino = $modulo . "/" . $pagina;

        //return $this->load->view(base_url().$destino);
        print redirect(base_url() . $destino);
    }

}
