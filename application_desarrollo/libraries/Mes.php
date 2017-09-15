<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mes {

    public $arraySemanas;
    public $semana;
    public $mes;
    public $dia;
    
 
    
    public function __construct() {

        $this->arraySemanas[1]= "1,8";
        $this->arraySemanas[2]= "9,16";
        $this->arraySemanas[3]= "17,24";
        $this->arraySemanas[4]= "25,31";
        $this->semana="";
        $this->mes="";
        $this->dia="";
        
    }
    
    public function obtener_dias($semana){
        return $this->arraySemanas[$semana];
    }
    
    public function obtener_mes($fecha){
        $cadenaFecha=explode("-",$fecha);
        $this->mes=$cadenaFecha[1];
    }
    
    public function obtener_dia($fecha){
        $cadenaFecha=explode("-",$fecha);
        $this->dia=$cadenaFecha[2];
    }
    
    public function obtener_semana($dia){
        $diaNumerico=ltrim($dia,"0");
        if($diaNumerico >= 1 && $diaNumerico<=8){
            $this->semana=1;
        }
        if($diaNumerico >= 9 && $diaNumerico<=16){
            $this->semana=2;
        }
        if($diaNumerico >= 17 && $diaNumerico<=24){
            $this->semana=3;
        }
        if($diaNumerico >= 25 && $diaNumerico<=31){
            $this->semana=4;
        }
        
    }
}

