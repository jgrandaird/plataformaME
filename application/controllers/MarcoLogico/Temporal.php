<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Temporal extends CI_CONTROLLER {
    
    public function __construct() {
        parent::__construct();
        
    }

    public function index() {
        
        
        $this->load->view("MarcoLogico/Temporal_view.php");
        
    }

}
