<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Personal {

    public $CI;
    public $idpersonal;
    public $rutaJs;
    public $rutaModulo;
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
        $this->CI->load->model("Personal/Personal_model");
        $this->CI->load->model("MarcoLogico/Regional_model");
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->rutaJs = base_url() . "assets/js/personal.js";

        $this->titulo_lista = "PERSONAL";
        $this->titulo_nuevo = "NUEVO PERSONAL";
        $this->referencia = array();
        $this->idpersonal = $this->CI->input->post('idpersonal');
        $this->idregistro = "";
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

    public function index_personal() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del personal
        $this->CI->Personal_model->obtener_personal();
        $this->capturar_informacion_complemento();

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_lista);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        $data["objPersonal"] = $this->CI->Personal_model;

        //Carga la vista
        $this->CI->load->view('Personal/Lista_Personal_view', $data);
    }

    
    public function nuevo_registro() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;
        
        //Incluye js del formulario
        $data["rutaModulo"] = $this->rutaModulo;

        //Selecciona las regionales
        $this->CI->Regional_model->obtener_regionales();
        $data["objRegional"] = $this->CI->Regional_model;

        //Consulta los registros del regional
        $data["objRegistro"] = $this->CI->Personal_model;

        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('Personal/Nuevo_Personal_view', $data);
    }

    public function editar_registro($idpersona) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;
        
        //Incluye js del formulario
        $data["rutaModulo"] = $this->rutaModulo;

        //Selecciona las regionales
        $this->CI->Regional_model->obtener_regionales();
        $data["objRegional"] = $this->CI->Regional_model;

        //Consulta los registros del regional
        $this->CI->Personal_model->obtener_persona($idpersona);
        $data["objRegistro"] = $this->CI->Personal_model;

        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('Personal/Nuevo_Personal_view', $data);
    }

    public function guardar_registro() {

        $idpersona = $this->CI->input->post('idpersona');
        $data = array('identificacion_persona' => $this->CI->input->post('identificacion_persona'),
            'nombres_persona' => $this->CI->input->post('nombres_persona'),
            'apellidos_persona' => $this->CI->input->post('apellidos_persona'),
            'fecha_nacimiento_persona' => $this->CI->input->post('fecha_nacimiento_persona'),
            'idregional' => $this->CI->input->post('idregional'),
            'correo_electronico_persona' => $this->CI->input->post('correo_electronico_persona'),
            'celular_persona' => $this->CI->input->post('celular_persona'),
            'direccion_persona' => $this->CI->input->post('direccion_persona')
        );

        //Si existe la regional, procede a actualizar registros
        if ($idpersona) {
            $resultadoOK = $this->CI->Personal_model->editar_persona($idpersona, $data);
            //Sin no existe la regional, procede a insertarlo
        } else {
            $resultadoOK = $this->CI->Personal_model->crear_persona($data);
        }


        if ($resultadoOK) {
            
        } else {
            
        }
        
    }
    
    public function subir_foto_persona(){
        $nombre_soporte = $_FILES["archivo"]["tmp_name"];
        $extension_soporte = $_FILES["archivo"]["type"];
        
        $tamano_soporte = $_FILES["archivo"]["size"];
        $upload_folder = "img/funcionarios";
        
        $extension=explode("/",$extension_soporte);
        
        $nombre_foto=$this->CI->session->userdata("idfuncionario").".".$extension[1];
        $ruta_soporte = $upload_folder . "/" . $nombre_foto;

        $cadenaHTML="";
        $resultadoQuery = $this->CI->Personal_model->subir_foto_persona($this->CI->session->userdata("idfuncionario"),$ruta_soporte);
        if ($resultadoQuery->affected_rows() > 0) {
            if($this->subir_foto($upload_folder, $nombre_foto, $_FILES["archivo"]["tmp_name"])){
                $cadenaHTML="<img src='img/funcionarios/".$nombre_foto."' style='width:100px;height:130px;'/>";
            }
        }
        echo $cadenaHTML;
    }
    
    public function subir_foto($directorio, $nombre_soporte, $archivo) {

        $this->validar_ruta($directorio);
        if (!move_uploaded_file($archivo, $directorio . "/" . $nombre_soporte)) {
            return false;
        }

        return true;
    }
    
    public function validar_ruta($directorio) {

        if (!file_exists($directorio)) {
            mkdir($directorio, 0777, true);
        }
    }

    public function eliminar_registro($idpersonal) {
        $this->CI->Personal_model->eliminar_persona($idpersonal);
        
    }

    

    public function capturar_informacion_complemento() {
        $i = 0;
        foreach ($this->CI->Personal_model->arrayPersonal as $personal) {

            $this->CI->Regional_model->obtener_regional($personal->idregional);
            $personal->objRegional = $this->CI->Regional_model->nombre_regional;


            $i++;
        }
    }

    

}
