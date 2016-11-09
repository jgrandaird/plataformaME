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

        //Programada (AZUL)
        $this->arrayColor[$this->info] = "info";
        
        //Realizada con soporte (VERDE)
        $this->arrayColor[$this->success] = "success";

        //Realizada sin soporte (AMARILLA)
        $this->arrayColor[$this->warning] = "warning";

        //Programada sin registro (ROJO)
        $this->arrayColor[$this->danger] = "danger";

        //Cancelada (GRIS)
        $this->arrayColor[$this->gris] = "";
    }

    public function colorear($fecha_actividad, $color) {

        $color_actividad = $color;
        if ($fecha_actividad < $this->fecha_hoy && $color === $this->color) {
            $color_actividad = $this->danger;
        }
        return $color_actividad;
    }

}
