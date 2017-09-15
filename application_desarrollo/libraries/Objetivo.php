<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class Objetivo {

    public $CI;
    public $idobjetivo;
    public $idproyecto;
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
        $this->CI->load->model("MarcoLogico/Objetivo_model");
        $this->CI->load->model("MarcoLogico/Proyecto_model");
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->rutaJs = base_url() . "assets/js/objetivo.js";
        $this->titulo_lista = "OBJETIVOS";
        $this->titulo_nuevo = "NUEVO OBJETIVO";
        $this->referencia = array();
        $this->idobjetivo = $this->CI->input->post('idobjetivo');
        $this->idproyecto = $this->CI->input->post('idproyecto');
        $this->idregistro = $this->idproyecto;
        $this->menuIndex = "index_objetivo";
    }

    //Parámetros de variables globales
    public function parametrizar_modulo() {
        //En la vista se cargan los parámetros para ser enviados através de los formularios
        $this->objModulo = new Modulo($this->modulo, $this->antecesor, $this->parametro);
    }

    //Parametros del encabezado del formulario
    public function abrir_encabezado($titulo) {

        //Título del formulario
        $this->titulo = $titulo;

        //Cuerpo de la referencia (ruta) del formulario
        $i = 0;
        foreach ($this->encabezado->referencia as $referencia) {
            $modelo = $referencia["modelo"];
            $funcion = $referencia["funcion"];
            $idregistro = $referencia["idregistro"];
            $nombre_campo = $referencia["nombre_campo"];
            $this->CI->$modelo->$funcion($idregistro);
            $this->referencia[$i]["subtitulo"] = $referencia["subtitulo"];
            $this->referencia[$i]["nombre_campo"] = $this->CI->$modelo->$nombre_campo;
            $i++;
        }
    }

    public function index_objetivo($idproyecto) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo($idproyecto);
        $data["objModulo"] = $this->objModulo;

        //Consulta los registros del Objetivo
        $this->CI->Objetivo_model->obtener_objetivos($idproyecto);
        $data["objObjetivo"] = $this->CI->Objetivo_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_lista);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Lista_Objetivo_view', $data);
    }

    public function nuevo_registro() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del Objetivo
        $this->CI->Objetivo_model->idproyecto = $this->CI->input->post('idproyecto');
        $data["objRegistro"] = $this->CI->Objetivo_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nuevo_Objetivo_view', $data);
    }

    public function editar_registro($idobjetivo) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del Objetivo
        $this->CI->Objetivo_model->obtener_objetivo($idobjetivo);
        $data["objRegistro"] = $this->CI->Objetivo_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nuevo_Objetivo_view', $data);
    }

    public function guardar_registro() {

        $idproyecto = $this->CI->input->post('idproyecto');
        $idobjetivo = $this->CI->input->post('idobjetivo');
        $data = array('nombre_objetivo' => $this->CI->input->post('nombre_objetivo'),
            'codigo_objetivo' => $this->CI->input->post('codigo_objetivo'),
            'descripcion_objetivo' => $this->CI->input->post('descripcion_objetivo'),
            'idproyecto' => $idproyecto);

        //Si existe el proyecto, procede a actualizar registros
        if ($idobjetivo) {
            $resultadoOK = $this->CI->Objetivo_model->editar_objetivo($idobjetivo, $data);
            //Sin no existe el proyecto, procede a insertarlo
        } else {
            $resultadoOK = $this->CI->Objetivo_model->crear_objetivo($data);
        }


        if ($resultadoOK) {
            
        } else {
            
        }
    }

    public function eliminar_registro($idobjetivo) {

        $this->CI->Objetivo_model->eliminar_objetivo($idobjetivo);
    }

}
