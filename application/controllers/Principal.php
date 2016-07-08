<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Principal extends CI_CONTROLLER {
    
    public function __construct() {
        parent::__construct();
        
    }

    public function index() {
        
        
        $this->load->view("plantilla/index.php");
        
    }
    
    public function ir_a(){
        
        $modulo = $this->uri->segment(3);
        $pagina = $this->uri->segment(4);
        
        $destino=$modulo."/".$pagina;
            
        //return $this->load->view(base_url().$destino);
        print redirect(base_url().$destino);
    }
    
}
