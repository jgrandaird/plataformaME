<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Login extends CI_CONTROLLER {

    public function __construct() {
        parent::__construct();
        
        
    }

    public function index() {
        
        $this->load->view("plantilla/header_view");
        $this->load->view('home');
        $this->load->view("plantilla/footer_view"); 
        
    }

}
