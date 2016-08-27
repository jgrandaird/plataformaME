<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Lineaaccion {

    public $CI;
    public $idlineaaccion;
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
        $this->CI->load->model("MarcoLogico/Lineaaccion_model");
        $this->CI->load->model("MarcoLogico/Objetivo_model");
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->rutaJs = base_url() . "assets/js/lineaaccion.js";
        $this->titulo_lista = "LINEAS DE ACCI&Oacute;N";
        $this->titulo_nuevo = "NUEVA L&Iacute;NEA DE ACCI&Oacute;N";
        $this->referencia = array();
        $this->idlineaaccion = $this->CI->input->post('idlineaaccion');
        $this->idobjetivo = $this->CI->input->post('idobjetivo');
        $this->idproyecto = $this->CI->input->post('idproyecto');
        $this->idregistro = $this->idobjetivo;
        $this->menuIndex = "index_lineaaccion";
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

    public function index_lineaaccion($idobjetivo) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros de la Objetivo (captura idproyecto)
        $this->CI->Objetivo_model->obtener_objetivo($idobjetivo);
        $data["objObjetivo"] = $this->CI->Objetivo_model;

        //Consulta los registros del indicador
        $this->CI->Lineaaccion_model->obtener_lineasaccion($idobjetivo);
        $data["objLineaaccion"] = $this->CI->Lineaaccion_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_lista);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Lista_Lineaaccion_view', $data);
    }

    public function nuevo_registro() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del indicador
        $data["objRegistro"] = $this->CI->Lineaaccion_model->idproyecto=$this->idproyecto;
        $data["objRegistro"] = $this->CI->Lineaaccion_model->idobjetivo=$this->idobjetivo;
        $data["objRegistro"] = $this->CI->Lineaaccion_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nueva_Lineaaccion_view', $data);
    }

    public function editar_registro($idlineaaccion) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del indicador
        $this->CI->Lineaaccion_model->obtener_lineaaccion($idlineaaccion);
        $data["objRegistro"] = $this->CI->Lineaaccion_model->idproyecto=$this->idproyecto;
        $data["objRegistro"] = $this->CI->Lineaaccion_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        return $this->CI->load->view('MarcoLogico/Nueva_Lineaaccion_view', $data);
    }

    public function guardar_registro() {

        $idobjetivo = $this->CI->input->post('idobjetivo');
        $idlineaaccion = $this->CI->input->post('idlineaaccion');
        $data = array('nombre_lineaaccion' => $this->CI->input->post('nombre_lineaaccion'),
            'descripcion_lineaaccion' => $this->CI->input->post('descripcion_lineaaccion'),
            'idobjetivo' => $idobjetivo
            );

        //Si existe el proyecto, procede a actualizar registros
        if ($idlineaaccion) {
            $resultadoOK = $this->CI->Lineaaccion_model->editar_lineaaccion($idlineaaccion, $data);
            //Sin no existe el proyecto, procede a insertarlo
        } else {
            $resultadoOK = $this->CI->Lineaaccion_model->crear_lineaaccion($data);
        }


        if ($resultadoOK) {
            
        } else {
            
        }
    }

    public function eliminar_registro($idlineaaccion) {
        $this->CI->Lineaaccion_model->eliminar_lineaaccion($idlineaaccion);
    }

}
