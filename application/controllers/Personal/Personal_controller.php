<?php


include_once APPPATH . 'libraries/Personal.php';

Class Personal_controller extends CI_CONTROLLER {

    public $modulo = "";
    public $clase = array();

    public function __construct() {

        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->modulo = $this->cargar_modulo();

        $this->clase["Personal"] = new Personal;
        
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
        $this->clase[$this->modulo]->index_personal();
    }

    public function nuevo_registro() {
        $this->clase[$this->modulo]->nuevo_registro();
    }

    public function guardar_registro() {
        $this->clase[$this->modulo]->guardar_registro();
    }

    public function eliminar_registro($idregistro) {
        $this->clase[$this->modulo]->eliminar_registro($idregistro);
    }

    public function editar_registro($idregistro) {
        $this->clase[$this->modulo]->editar_registro($idregistro);
    }
    
    public function atras(){
        $this->clase[$this->modulo]->atras();
    }   

}


