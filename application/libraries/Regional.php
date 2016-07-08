<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Regional {

    public $CI;
    public $rutaJs;
    public $objModulo;
    public $objDepto;
    public $barraAcciones;
    public $modulo;
    public $parametro;
    public $encabezado;
    public $titulo;
    public $referencia=array();

    public function __construct() {

        $this->CI = & get_instance();
        $this->CI->load->model("MarcoLogico/Regional_model");
        $this->CI->load->model("MarcoLogico/Pais_model");
        $this->CI->load->model("MarcoLogico/Depto_model");
        $this->CI->load->model("MarcoLogico/Municipio_model");
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->CI->load->helper('Formulario_helper');
        $this->rutaJs = base_url() . "assets/js/regional.js";
    }

    public function parametrizar_modulo() {

        $this->objModulo = new Modulo("Regional", "", $this->parametro);
    }
    
    public function abrir_encabezado(){
        
        $this->titulo=$this->encabezado->titulo;
        $i=0;
        foreach($this->encabezado->referencia as $referencia){
            $modelo=$referencia["modelo"];
            $funcion=$referencia["funcion"];
            $idregistro=$referencia["idregistro"];
            $nombre_campo=$referencia["nombre_campo"];
            $this->CI->$modelo->$funcion($idregistro);
            $this->referencia[$i]["subtitulo"]=$referencia["subtitulo"];
            $this->referencia[$i]["nombre_campo"]=$this->CI->$modelo->$nombre_campo;
            $i++;
        }
    }

    public function index_regional() {

        
        
        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del regional
        $this->CI->Regional_model->obtener_regionales();
        $this->capturar_informacion_complemento();
        
        $this->abrir_encabezado();
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;
        $data["objRegional"] = $this->CI->Regional_model;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Lista_Regional_view', $data);
    }

    public function nuevo_registro() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Selecciona los paises
        $this->CI->Pais_model->obtener_paises();
        $data["objPais"] = $this->CI->Pais_model;

        //Consulta los registros del regional
        $data["objRegistro"] = $this->CI->Regional_model;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nueva_Regional_view', $data);
    }

    public function editar_registro($idregional) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //$idregional = $this->CI->uri->segment(4);
        
        //Selecciona los paises
        $this->CI->Pais_model->obtener_paises();
        $data["objPais"] = $this->CI->Pais_model;
        
        //Consulta los registros del regional
        $this->CI->Regional_model->obtener_regional($idregional);
        $data["objRegistro"] = $this->CI->Regional_model;
        
        

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nueva_Regional_view', $data);
    }

    public function guardar_registro() {

        $idregional = $this->CI->input->post('idregional');
        $data = array('nombre_regional' => $this->CI->input->post('nombre_regional'),
            'codigo_regional' => $this->CI->input->post('codigo_regional'),
            'idpais' => $this->CI->input->post('idpais'),
            'iddepto' => $this->CI->input->post('iddepto'),
            'idmunicipio' => $this->CI->input->post('idmunicipio')
        );

        //Si existe la regional, procede a actualizar registros
        if ($idregional) {
            $resultadoOK = $this->CI->Regional_model->editar_regional($idregional, $data);
            //Sin no existe la regional, procede a insertarlo
        } else {
            $resultadoOK = $this->CI->Regional_model->crear_regional($data);
        }


        if ($resultadoOK) {
            
        } else {
            
        }
        $this->index_regional();
    }

    public function eliminar_registro($idregional) {
        $this->CI->Regional_model->eliminar_regional($idregional);
        $this->index_regional();
    }

    public function atras() {
        $this->index_regional();
    }

    public function capturar_informacion_complemento() {
        $i = 0;
        foreach ($this->CI->Regional_model->arrayRegionales as $regional) {
            
            $this->CI->Pais_model->obtener_pais($regional->idpais);
            $regional->objPais = $this->CI->Pais_model->nombre_pais;
                       
            $this->CI->Depto_model->obtener_depto($regional->iddepto);
            $regional->objDepto = $this->CI->Depto_model->nombre_depto;
            
            $this->CI->Municipio_model->obtener_municipio($regional->idmunicipio);
            $regional->objMunicipio = $this->CI->Municipio_model->nombre_municipio;
            
            
            $i++;
        }
        
        
    }

    public function cargar_deptos() {
        $idpais = $this->CI->input->post('idpais');
        $iddepto = $this->CI->input->post('iddepto');
        $this->CI->Depto_model->obtener_deptosxpais($idpais);

        echo construir_select($this->CI->Depto_model->arrayDeptos, 'iddepto', 'nombre_depto', 'iddepto',$iddepto);
    }

    public function cargar_municipios() {
        $iddepto = $this->CI->input->post('iddepto');
        $idmunicipio = $this->CI->input->post('idmunicipio');
        $this->CI->Municipio_model->obtener_municipiosxdepto($iddepto);
        echo construir_select($this->CI->Municipio_model->arrayMunicipios, 'idmunicipio', 'nombre_municipio', 'idmunicipio',$idmunicipio);
    }

}
