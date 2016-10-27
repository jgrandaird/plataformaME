<?php

include_once APPPATH . 'libraries/Modulo.php';


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Soporte {

    public $CI;
    public $idsoporte;
    public $idevento;
    public $idmacroactividad;
    public $idperiodo_soporte;
    public $idregional_soporte;
    public $idproyecto_soporte;
    public $rutaJs;
    public $barraAcciones;
    public $antecesor;
    public $modulo;
    public $parametro;
    public $titulo_nuevo;
    public $titulo_lista;
    public $referencia;
    public $menuIndex;
    public $idregistro;

    public function __construct() {

        $this->CI = & get_instance();
        $this->CI->load->model("Planimplementacion/Macroactividad_model");
        $this->CI->load->model("Marcologico/Regional_model");
        $this->CI->load->model("Marcologico/Proyecto_model");
        $this->CI->load->model("Marcologico/Periodo_model");
        $this->CI->load->model("Soporte/Soporte_model");
        $this->rutaJs = base_url() . "assets/js/soporte.js";
        $this->titulo_lista = "LISTADO SOPORTES";
        $this->titulo_nuevo = "NUEVO SOPORTE";
        $this->referencia = array();
        $this->idmacroactividad = $this->CI->input->post('idmacroactividad_soporte');
        $this->idperiodo_soporte = $this->CI->input->post('idperiodo_soporte');
        $this->idregional_soporte = $this->CI->input->post('idregional_soporte');
        $this->idproyecto_soporte = $this->CI->input->post('idproyecto_soporte');
        $this->idregistro = $this->idevento;
        $this->menuIndex = "index_soporte";
    }

    public function guardar_registro() {

        $idproyecto_soporte = $this->CI->input->post('idproyecto_soporte');
        $idregional_soporte = $this->CI->input->post('idregional_soporte');
        $idperiodo_soporte = $this->CI->input->post('idperiodo_soporte');
        $idevento_soporte = $this->CI->input->post('idevento_soporte');
        $nombre_soporte = $_FILES["archivo"]["name"];
        $extension_soporte = $_FILES["archivo"]["type"];
        $tamano_soporte = $_FILES["archivo"]["size"];
        $upload_folder = "soportes" . "/" . $idproyecto_soporte . "_" . $idregional_soporte;
        $ruta_soporte = $upload_folder . "/" . $nombre_soporte;

        $arrayData = array(
            'nombre_soporte' => $nombre_soporte,
            'tamano_soporte' => $tamano_soporte,
            'extension_soporte' => $extension_soporte,
            'ruta_soporte' => $ruta_soporte,
            'idevento' => $idevento_soporte,
            'idproyecto' => $idproyecto_soporte,
            'idregional' => $idregional_soporte,
            'idperiodo' => $idperiodo_soporte
        );
        $resultadoQuery = $this->CI->Soporte_model->crear_soporte($arrayData);
        if ($resultadoQuery->affected_rows() > 0) {
            $this->subir_soporte($upload_folder, $nombre_soporte, $_FILES["archivo"]["tmp_name"]);
            $this->obtener_soportes_html($idevento_soporte);
        }
    }

    public function subir_soporte($directorio, $nombre_soporte, $archivo) {


        //$return = Array("ok" => TRUE);
        $this->validar_ruta($directorio);
        if (!move_uploaded_file($archivo, $directorio . "/" . $nombre_soporte)) {
            $return = Array("ok" => FALSE, "msg" => "$ruta_soporte: Ocurrio un error al subir el archivo. No pudo guardarse", "status" => "error");
        }

        //echo json_encode($return);
    }

    public function validar_ruta($directorio) {

        if (!file_exists($directorio)) {
            mkdir($directorio, 0777, true);
        }
    }
    
    public function obtener_soportes_html($idevento){
        $this->CI->Soporte_model->obtener_soportes($idevento);
        $html="";
        foreach ($this->CI->Soporte_model->arraySoportes as $soporte){
            $cadenaVisualizada=substr($soporte->nombre_soporte,0,20);
            if(strlen($cadenaVisualizada)===20){
                $cadenaVisualizada=$cadenaVisualizada."...";
            }
            $html.="<div class='list-group-item' title='".$soporte->nombre_soporte."'><a href='".$soporte->ruta_soporte."' id='href_download_".$soporte->idsoporte."' download>".$cadenaVisualizada."</a><a href='javascript:eliminar_soporte(".$soporte->idsoporte.")'  ><span class='glyphicon glyphicon-trash pull-right' aria-hidden='true'></span></a></div>";
        }
        print $html;
    }
    
    public function eliminar_soporte($idsoporte){
        
        $ruta_soporte=$this->obtener_ruta($idsoporte);
        $this->CI->Soporte_model->eliminar_soporte($idsoporte);
        $this->eliminar_fichero($ruta_soporte);
    }
    
    public function obtener_ruta($idsoporte){
        $this->CI->Soporte_model->obtener_soporte($idsoporte);
        return $this->CI->Soporte_model->ruta_soporte;
    }
    
    public function eliminar_fichero($ruta_soporte){
        unlink($ruta_soporte);
        
    }
    
    

}
