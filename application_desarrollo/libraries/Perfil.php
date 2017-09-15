<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class Perfil {

    public $CI;
    public $idperfil;
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
        $this->CI->load->model("Seguridad/Perfil_model");
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->rutaJs = base_url() . "assets/js/perfil.js";
        $this->titulo_lista = "Perfiles";
        $this->titulo_nuevo = "Nuevo Perfil";
        $this->referencia = array();
        $this->idperfil = $this->CI->input->post('idperfil');
        $this->idregistro="";
        $this->menuIndex = "index_personal";
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

    public function index_perfil() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Consulta los registros del Perfil
        $this->CI->Perfil_model->obtener_perfiles();
        $data["objPerfil"] = $this->CI->Perfil_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_lista);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('Seguridad/Lista_Perfil_view', $data);
    }

    public function nuevo_registro() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del Perfil
        $data["objRegistro"] = $this->CI->Perfil_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('Seguridad/Nuevo_Perfil_view', $data);
    }

    public function editar_registro($idperfil) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del Objetivo
        $this->CI->Perfil_model->obtener_perfil($idperfil);
        $data["objRegistro"] = $this->CI->Perfil_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('Seguridad/Nuevo_Perfil_view', $data);
    }

    public function guardar_registro() {

        $data = array('nombre_perfil' => $this->CI->input->post('nombre_perfil'),
            'descripcion_perfil' => $this->CI->input->post('descripcion_perfil'),
            'icono_perfil' => $this->CI->input->post('icono_perfil')
                    );

        //Si existe el proyecto, procede a actualizar registros
        if ($this->idperfil) {
            $resultadoOK = $this->CI->Perfil_model->editar_perfil($this->idperfil, $data);
            //Si no existe el proyecto, procede a insertarlo
        } else {
            $resultadoOK = $this->CI->Perfil_model->crear_perfil($data);
        }
        if ($resultadoOK) {
            
        } else {
            
        }
    }

    public function eliminar_registro($idperfil) {
        $this->CI->Perfil_model->eliminar_perfil($idperfil);
    }
    
    
    

}
