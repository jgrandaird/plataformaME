<?php

include_once APPPATH . 'libraries/Novedad.php';

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class Novedad {

    public $CI;
    public $idnovedad;
    

    public function __construct() {

        $this->CI = & get_instance();
        $this->CI->load->model("Planimplementacion/Novedad_model");
        $this->idnovedad = $this->CI->input->post('idnovedad');
    }

    
    

    public function index_novedad($idnovedad) {

        //Consulta los registros de los permisos
        $this->CI->Novedad_model->obtener_novedades($idnovedad);
        $data["objNovedad"] = $this->CI->Novedad_model;

        //Carga la vista
        $this->CI->load->view('Planimplementacion/Lista_Novedad_view', $data);
    }

    

    public function guardar_registro() {

        $this->idnovedad=$this->CI->input->post('idnovedad');
        //$input_fecha_novedad="fecha_novedad_".$this->CI->input->post('idevento');
        //$input_contenido_novedad="contenido_novedad_".$this->CI->input->post('idevento');
        $idevento=$this->CI->input->post('idevento');
        $data = array('fecha_novedad' => $this->CI->input->post('fecha_novedad_'.$idevento),
            'contenido_novedad' => $this->CI->input->post('contenido_novedad_'.$idevento),
            'idpersona' => $this->CI->input->post('idpersona'),
            'idevento' => $this->CI->input->post('idevento')
        );

        //Si existe la novedad, procede a actualizar registros
        if ($this->idnovedad) {
            $resultadoOK = $this->CI->Novedad_model->editar_novedad($this->idnovedad, $data);
            //Si no existe la novedad, procede a insertarla
        } else {
            $resultadoOK = $this->CI->Novedad_model->crear_novedad($data);
        }
        if ($resultadoOK) {
            
        } else {
            
        }
    }

    public function eliminar_registro($idnovedad) {
        $this->CI->Novedad_model->eliminar_novedad($idnovedad);
    }

}

