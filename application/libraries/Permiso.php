<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class Permiso {

    public $CI;
    public $idperfil;
    public $idpermiso;
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
        $this->CI->load->model("Seguridad/Permiso_model");
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->rutaJs = base_url() . "assets/js/permiso.js";
        $this->titulo_lista = "Permisos";
        $this->titulo_nuevo = "Nuevo Permiso";
        $this->referencia = array();
        $this->idperfil = $this->CI->input->post('idperfil');
        $this->idpermiso = $this->CI->input->post('idpermiso');
        $this->menuIndex = "index_permisos";
        $this->idregistro=$this->idperfil;
        
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

    public function index_permisos($idperfil) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Consulta los registros de los permisos
        $this->CI->Permiso_model->obtener_permisos($idperfil);
        $data["objPermiso"] = $this->CI->Permiso_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_lista);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('Seguridad/Lista_Permiso_view', $data);
    }

    public function nuevo_registro() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del Permiso
        $this->CI->Permiso_model->idperfil = $this->CI->input->post('idperfil');
        $data["objRegistro"] = $this->CI->Permiso_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('Seguridad/Nuevo_Permiso_view', $data);
    }

    public function editar_registro($idpermiso) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del Permiso
        $this->CI->Permiso_model->obtener_permiso($idpermiso);
        $data["objRegistro"] = $this->CI->Permiso_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('Seguridad/Nuevo_Permiso_view', $data);
    }

    public function guardar_registro() {

        $data = array('nombre_permiso' => $this->CI->input->post('nombre_permiso'),
            'codigo_permiso' => $this->CI->input->post('codigo_permiso'),
            'descripcion_permiso' => $this->CI->input->post('descripcion_permiso'),
            'ruta_permiso' => $this->CI->input->post('ruta_permiso'),
            'idperfil' => $this->CI->input->post('idperfil')
        );

        //Si existe el proyecto, procede a actualizar registros
        if ($this->idpermiso) {
            $resultadoOK = $this->CI->Permiso_model->editar_permiso($this->idpermiso, $data);
            //Si no existe el proyecto, procede a insertarlo
        } else {
            $resultadoOK = $this->CI->Permiso_model->crear_permiso($data);
        }
        if ($resultadoOK) {
            
        } else {
            
        }
    }

    public function eliminar_registro($idpermiso) {
        $this->CI->Permiso_model->eliminar_permiso($idpermiso);
    }

}
