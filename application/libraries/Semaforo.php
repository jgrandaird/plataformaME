<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Semaforo {

    public $color;
    public $fecha_hoy;
    public $arrayColor = array();
    public $arrayTextoColor = array();
    public $success;
    public $info;
    public $warning;
    public $danger;
    public $gris;
    public $successTexto;
    public $infoTexto;
    public $warningTexto;
    public $dangerTexto;
    public $grisTexto;
    public $arrayAcumColor;
    public $arrayBarraColor;
    public $arrayEtiquetaColor;

    public function __construct() {
        $this->color = "#D9EDF7";
        $this->fecha_hoy = date("Y-m-d");
        
        
                
        
        //Colores del evento
        $this->success = "#DFF0D8";
        $this->info = "#D9EDF7";
        $this->warning = "#FCF8E3";
        $this->danger = "#F2DEDE";
        $this->gris = "#F5F5F5";

        //Colores del texto del evento
        $this->successTexto = "#3C959A";
        $this->infoTexto = "#286090";
        $this->warningTexto = "#D6A455";
        $this->dangerTexto = "#A94471";
        $this->grisTexto = "#808080";
        
        //Inicio de acumulador de colores
        $this->arrayAcumColor=array();
        $this->arrayAcumColor[$this->success]=0;
        $this->arrayAcumColor[$this->info]=0;
        $this->arrayAcumColor[$this->warning]=0;
        $this->arrayAcumColor[$this->danger]=0;
        $this->arrayAcumColor[$this->gris]=0;
        
        //Inicio de acumulador de colores
        $this->arrayEtiquetaColor=array();
        $this->arrayEtiquetaColor[$this->success]="Actividad realizada con soporte";
        $this->arrayEtiquetaColor[$this->info]="Actividad programada";
        $this->arrayEtiquetaColor[$this->warning]="Actividad realizada sin soporte";
        $this->arrayEtiquetaColor[$this->danger]="Actividad programada vencida";
        $this->arrayEtiquetaColor[$this->gris]="Actividad cancelada";

        //Programada (AZUL)
        $this->arrayColor[$this->info] = "info";
        
        //Realizada con soporte (VERDE)
        $this->arrayColor[$this->success] = "success";

        //Realizada sin soporte (AMARILLA)
        $this->arrayColor[$this->warning] = "warning";

        //Programada sin registro (ROJO)
        $this->arrayColor[$this->danger] = "danger";

        //Cancelada (GRIS)
        $this->arrayColor[$this->gris] = "gris";
        
        //Programada (AZUL)
        $this->arrayBarraColor[$this->info] = "progress-bar progress-bar-info";
        
        //Realizada con soporte (VERDE)
        $this->arrayBarraColor[$this->success] = "progress-bar progress-bar-success";

        //Realizada sin soporte (AMARILLA)
        $this->arrayBarraColor[$this->warning] = "progress-bar progress-bar-warning";

        //Programada sin registro (ROJO)
        $this->arrayBarraColor[$this->danger] = "progress-bar progress-bar-danger";

        //Cancelada (GRIS)
        $this->arrayBarraColor[$this->gris] = "";
    }

    public function colorear($fecha_actividad, $color) {
    
        
        
        $color_actividad = $color;
        if ($fecha_actividad < $this->fecha_hoy && $color === $this->color) {
            $color_actividad = $this->danger;
        }
        return $color_actividad;
    }
    
    public function acumular_color($color){
        
        if($this->success===$color || $this->info===$color || $this->warning === $color || $this->danger === $color || $this->gris === $color){
            $this->arrayAcumColor[$color]++;
        }
        
    }
    
    public function obtener_color_hexadecimal($color){
        
        $colorHexadecimal="";
        if($color==='success'){
            $colorHexadecimal = "#DFF0D8";
        }
        
        if($color==='info'){
            $colorHexadecimal = "#D9EDF7";
        }
        
        if($color==='warning'){
            $colorHexadecimal = "#FCF8E3";
        }
        
        if($color==='danger'){
            $colorHexadecimal = "#F2DEDE";
        }
        
        if($color==='gris'){
            $colorHexadecimal = "#F5F5F5";
        }
        return $colorHexadecimal;
    }

}
