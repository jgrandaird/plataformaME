<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Periodo {

    public $CI;
    public $idperiodo;
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
        $this->CI->load->model("MarcoLogico/Periodo_model");
        $this->CI->load->model("MarcoLogico/Proyecto_model");
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->rutaJs = base_url() . "assets/js/periodo.js";
        $this->titulo_lista = "PERIODOS";
        $this->titulo_nuevo = "NUEVO PERIODO";
        $this->referencia = array();
        $this->idperiodo = $this->CI->input->post('idperiodo');
        $this->idproyecto = $this->CI->input->post('idproyecto');
        $this->idregistro = $this->idproyecto;
        $this->menuIndex = "index_periodo";
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

    public function index_periodo($idproyecto) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del pediodo
        $this->CI->Periodo_model->obtener_periodos($idproyecto);
        $data["objPeriodo"] = $this->CI->Periodo_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_lista);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Lista_Periodo_view', $data);
    }

    public function nuevo_registro() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del periodo
        $this->CI->Periodo_model->idproyecto = $this->CI->input->post('idproyecto');
        $data["objRegistro"] = $this->CI->Periodo_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nuevo_Periodo_view', $data);
    }

    public function editar_registro($idperiodo) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del periodo
        $this->CI->Periodo_model->obtener_periodo($idperiodo);
        $data["objRegistro"] = $this->CI->Periodo_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nuevo_Periodo_view', $data);
    }

    public function guardar_registro() {

        $idproyecto = $this->CI->input->post('idproyecto');
        $idperiodo = $this->CI->input->post('idperiodo');
        $data = array('codigo_periodo' => $this->CI->input->post('codigo_periodo'),
            'fecha_inicio_periodo' => $this->CI->input->post('fecha_inicio_periodo'),
            'fecha_final_periodo' => $this->CI->input->post('fecha_final_periodo'),
            'idproyecto' => $idproyecto
        );

        //Si existe el periodo, procede a actualizar registros
        if ($idperiodo) {
            $resultadoOK = $this->CI->Periodo_model->editar_periodo($idperiodo, $data);
            //Sin no existe el periodo, procede a insertarlo
        } else {
            $resultadoOK = $this->CI->Periodo_model->crear_periodo($data);
        }


        if ($resultadoOK) {
            
        } else {
            
        }
    }

    public function eliminar_registro($idperiodo) {
        $this->CI->Periodo_model->eliminar_periodo($idperiodo);
    }

}
