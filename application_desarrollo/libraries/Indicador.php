<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Indicador {

    public $CI;
    public $idindicador;
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
        $this->CI->load->model("MarcoLogico/Indicador_model");
        $this->CI->load->model("MarcoLogico/Objetivo_model");
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->rutaJs = base_url() . "assets/js/indicador.js";
        $this->titulo_lista = "INDICADORES";
        $this->titulo_nuevo = "NUEVO INDICADOR";
        $this->referencia = array();
        $this->idobjetivo = $this->CI->input->post('idobjetivo');
        $this->idproyecto = $this->CI->input->post('idproyecto');
        $this->idindicador = $this->CI->input->post('idindicador');
        $this->idregistro = $this->idobjetivo;
        $this->menuIndex = "index_indicador";
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

    public function index_indicador($idobjetivo) {

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
        $this->CI->Indicador_model->obtener_indicadores($idobjetivo);
        $data["objIndicador"] = $this->CI->Indicador_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_lista);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Lista_Indicador_view', $data);
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
        $data["objRegistro"] = $this->CI->Indicador_model->idproyecto=$this->idproyecto;
        $data["objRegistro"] = $this->CI->Indicador_model->idobjetivo=$this->idobjetivo;
        $data["objRegistro"] = $this->CI->Indicador_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nuevo_Indicador_view', $data);
    }

    public function editar_registro($idindicador) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del indicador
        $this->CI->Indicador_model->obtener_indicador($idindicador);
        $data["objRegistro"] = $this->CI->Indicador_model->idproyecto=$this->idproyecto;
        $data["objRegistro"] = $this->CI->Indicador_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        return $this->CI->load->view('MarcoLogico/Nuevo_Indicador_view', $data);
    }

    public function guardar_registro() {

        $idproyecto = $this->CI->input->post('idproyecto');
        $idobjetivo = $this->CI->input->post('idobjetivo');
        $idindicador = $this->CI->input->post('idindicador');
        $data = array('nombre_indicador' => $this->CI->input->post('nombre_indicador'),
            'codigo_indicador' => $this->CI->input->post('codigo_indicador'),
            'descripcion_indicador' => $this->CI->input->post('descripcion_indicador'),
            'meta' => $this->CI->input->post('meta'),
            'tipo_indicador' => $this->CI->input->post('tipo_indicador'),
            'frecuencia_medicion_indicador' => $this->CI->input->post('frecuencia_medicion_indicador'),
            'idobjetivo' => $this->CI->input->post('idobjetivo'));

        //Si existe el proyecto, procede a actualizar registros
        if ($idindicador) {
            $resultadoOK = $this->CI->Indicador_model->editar_indicador($idindicador, $data);
            //Sin no existe el proyecto, procede a insertarlo
        } else {
            $resultadoOK = $this->CI->Indicador_model->crear_indicador($data);
        }


        if ($resultadoOK) {
            
        } else {
            
        }
    }

    public function eliminar_registro($idindicador) {


        $this->CI->Indicador_model->eliminar_indicador($idindicador);
    }

}
