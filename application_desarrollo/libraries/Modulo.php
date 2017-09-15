<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Modulo {
    
    public $mimodulo;
    public $moduloantecesor;
    public $miparametro;
    
    function __construct($mimodulo,$moduloantecesor,$miparametro){
        
        $this->mimodulo=$mimodulo;
        $this->moduloantecesor=$moduloantecesor;
        $this->miparametro=$miparametro;
        
    }
    
    
    
}

