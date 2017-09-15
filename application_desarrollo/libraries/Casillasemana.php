<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Casillasemana {

    public $idmacroactividad;
    public $fecha_inicial;
    public $fecha_final;
    public $anio_inicial;
    public $anio_final;
    public $mes_inicial;
    public $mes_final;
    public $numero_semanas;
    public $numero_meses;
    public $arrayMeses;
    public $arraySemanasxMes;

    public function __construct() {

        $this->idmacroactividad = "";
        $this->fecha_inicial = "";
        $this->fecha_final = "";
        $this->mes_inicial = "";
        $this->mes_final = "";
        $this->anio_inicial="";
        $this->anio_final="";
        $this->numero_semanas = 0;
        $this->numero_meses = 0;
        $this->arrayMeses = array(
            "01" => "Ene",
            "02" => "Feb",
            "03" => "Mar",
            "04" => "Abr",
            "05" => "May",
            "06" => "Jun",
            "07" => "Jul",
            "08" => "Ago",
            "09" => "Sep",
            "10" => "Oct",
            "11" => "Nov",
            "12" => "Dic"
        );
        $this->arraySemanasxMes=array();
    }

    public function obtener_numero_meses($fecha_inicial, $fecha_final) {

        $fecha_i = explode("-",$fecha_inicial);
        $fecha_f = explode("-",$fecha_final);

        $this->mes_inicial = $fecha_i[1];
        $this->mes_final = $fecha_f[1];
        
        $this->anio_inicial=$fecha_i[0];
        $this->anio_final=$fecha_f[0];
        

        $this->numero_meses = (intval($this->mes_final) - intval($this->mes_inicial))+1;
    }

    function contar_semanas_pormes($ano, $mes) {

        $data = new DateTime("$ano-$mes-01");
        $dataFimMes = new DateTime($data->format('Y-m-t'));

        $numSemanaInicio = $data->format('W');
        $numSemanaFinal = $dataFimMes->format('W') + 1;

        // Última semana do ano pode ser semana 1
        $numeroSemanas = ($numSemanaFinal < $numSemanaInicio) ? (52 + $numSemanaFinal) - $numSemanaInicio : $numSemanaFinal - $numSemanaInicio;
        $this->arraySemanasxMes[$mes]=$numeroSemanas;

        
    }
    
    function contar_semanas_pormes_4($mes){
        $this->arraySemanasxMes[$mes]=4;
    }

}

