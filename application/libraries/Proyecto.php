<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Proyecto {

    public $CI;
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
        $this->CI->load->model("MarcoLogico/Proyecto_model");
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->rutaJs = base_url() . "assets/js/proyecto.js";
        $this->titulo_lista = "Proyectos";
        $this->titulo_nuevo = "Nuevo Proyecto";
        $this->referencia = array();
        $this->idproyecto = $this->CI->input->post('idproyecto');
        $this->idregistro = "";
        $this->menuIndex = "index";
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

    public function index_proyecto() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;


        //Consulta los registros del proyecto
        $this->CI->Proyecto_model->obtener_proyectos();
        $data["objProyecto"] = $this->CI->Proyecto_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_lista);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        $this->CI->load->view('MarcoLogico/Lista_Proyecto_view', $data);
    }

    public function nuevo_registro() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del proyecto
        $data["objRegistro"] = $this->CI->Proyecto_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nuevo_Proyecto_view', $data);
    }

    public function editar_registro($idproyecto) {
        
        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del proyecto
        $this->CI->Proyecto_model->obtener_proyecto($idproyecto);
        $data["objRegistro"] = $this->CI->Proyecto_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nuevo_Proyecto_view', $data);
        
    }

    public function guardar_registro() {

        $data = array('nombre_proyecto' => $this->CI->input->post('nombre_proyecto'),
            'codigo_proyecto' => $this->CI->input->post('codigo_proyecto'),
            'descripcion_proyecto' => $this->CI->input->post('descripcion_proyecto'),
            'fecha_inicial_proyecto' => $this->CI->input->post('fecha_inicial_proyecto'),
            'fecha_final_proyecto' => $this->CI->input->post('fecha_final_proyecto'),
            'numero_periodos_proyecto' => $this->CI->input->post('numero_periodos_proyecto'));

        //Si existe el proyecto, procede a actualizar registros
        if ($this->idproyecto) {
            $resultadoOK = $this->CI->Proyecto_model->editar_proyecto($this->idproyecto, $data);
            //Sin no existe el proyecto, procede a insertarlo
        } else {
            $resultadoOK = $this->CI->Proyecto_model->crear_proyecto($data);
        }


        if ($resultadoOK) {
            
        } else {
            
        }
        
    }

    public function eliminar_registro($idproyecto) {
        $this->CI->Proyecto_model->eliminar_proyecto($idproyecto);
        
    }


}
