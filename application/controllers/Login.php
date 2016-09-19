<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class Login extends CI_CONTROLLER {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("Seguridad/Usuario_model");
        $this->load->model("Personal/Personal_model");
        $this->load->model("MarcoLogico/Regional_model");
        
    }

    public function index() {

        $this->cargar_login("");
    }

    public function cargar_login($mensaje) {
        $data["Mensaje"] = $mensaje;
        $this->load->view('login', $data);
    }

    public function validar_usuario() {

        $nombre_usuario = $this->input->post('nombre_usuario');
        $clave_usuario = $this->input->post('clave_usuario');
        $arrayResultado = $this->Usuario_model->validar_usuario($nombre_usuario, $clave_usuario);
        if ($arrayResultado->num_rows() > 0) {
            foreach ($arrayResultado->result() as $usuario) {
                $this->Personal_model->obtener_persona($usuario->idpersona);
                $this->Regional_model->obtener_regional($this->Personal_model->idregional);
                $datos_sesion = array(
                    'nombre_usuario' => $usuario->nombre_usuario,
                    'nombre_funcionario' => $usuario->nombres_persona . " " . $usuario->apellidos_persona,
                    'idfuncionario' => $this->Personal_model->idpersona,
                    'idregional_funcionario' => $this->Personal_model->idregional,
                    'nombreregional_funcionario' => $this->Regional_model->nombre_regional,
                    'logged_in' => TRUE
                );
            }
            $this->session->set_userdata($datos_sesion);
            redirect(base_url() . "Principal");
        } else {
            $Mensaje = "Nombre de usuario o contraseña incorrecto";
            $this->cargar_login($Mensaje);
        }
    }

}
