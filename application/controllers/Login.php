<?php

if (!defined('BASEPATH')){
    exit('No direct script access allowed');
}

Class Login extends CI_CONTROLLER {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        
        
    }

    public function index() {
        
        $this->cargar_login("");
        
    }
    
    public function cargar_login($mensaje){
        $this->load->view('login');
    }
    
    public function validar_usuario(){
       
        $datos_sesion = array(
            'nombre_usuario'  => $this->input->post('nombre_usuario'),
            'nombre_funcionario'     => $this->input->post('nombre_usuario'),
            'logged_in' => TRUE
            );

        $this->session->set_userdata($datos_sesion);
        //print $this->session->userdata("nombre_usuario");
        
       
        //$this->index("Mensaje");
        redirect(base_url() . "Principal");
    }

}
