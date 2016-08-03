<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Macroactividad {

    public $CI;
    public $rutaJs;
    public $objModulo;
    public $objDepto;
    public $barraAcciones;
    public $modulo;
    public $parametro;
    public $antecesor;
    public $encabezado;
    public $titulo;
    public $referencia = array();

    public function __construct() {

        $this->CI = & get_instance();
        $this->CI->load->model("Planimplementacion/Macroactividad_model");
        $this->CI->load->model("Marcologico/Objetivo_model");
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->CI->load->helper('Formulario_helper');
        $this->rutaJs = base_url() . "assets/js/macroactividad.js";
    }

    public function parametrizar_modulo() {

        $this->objModulo = new Modulo($this->modulo, $this->antecesor, $this->parametro);
    }

    public function abrir_encabezado() {

        $this->titulo = $this->encabezado->titulo;
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

    public function index_macroactividad($idproyecto, $idregional, $idperiodo) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del regional
        $this->CI->Macroactividad_model->obtener_macroactividades($idproyecto, $idregional, $idperiodo);


        $this->abrir_encabezado();
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;
        $data["objMacroactividad"] = $this->CI->Macroactividad_model;

        //Carga la vista
        $this->CI->load->view('Planimplementacion/Lista_Macroactividad_view', $data);
    }

    public function nuevo_registro() {

        $idproyecto = $this->CI->input->post('idproyecto');

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Selecciona los objetivos
        $this->CI->Objetivo_model->obtener_objetivos($idproyecto);
        $data["objObjetivo"] = $this->CI->Objetivo_model;

        //Consulta los registros del plan de implementacion
        $this->CI->Macroactividad_model->idproyecto = $this->CI->input->post('idproyecto');
        $this->CI->Macroactividad_model->idregional = $this->CI->input->post('idregional');
        $this->CI->Macroactividad_model->idperiodo = $this->CI->input->post('idperiodo');
        $data["objRegistro"] = $this->CI->Macroactividad_model;

        $this->abrir_encabezado();
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('Planimplementacion/Nueva_Macroactividad_view', $data);
    }

    public function editar_registro($idmacroactividad) {

        $idproyecto = $this->CI->input->post('idproyecto');

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //$idregional = $this->CI->uri->segment(4);
        //Selecciona los paises
        $this->CI->Objetivo_model->obtener_objetivos($idproyecto);
        $data["objObjetivo"] = $this->CI->Objetivo_model;

        $this->abrir_encabezado();
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        //Consulta los registros del plan
        $this->CI->Macroactividad_model->obtener_macroactividad($idmacroactividad);
        $data["objRegistro"] = $this->CI->Macroactividad_model;



        //Carga la vista
        $this->CI->load->view('Planimplementacion/Nueva_Macroactividad_view', $data);
    }

    public function guardar_registro() {

        $idmacroactividad = $this->CI->input->post('idmacroactividad');
        $idproyecto = $this->CI->input->post('idproyecto');
        $idregional = $this->CI->input->post('idregional');
        $idperiodo = $this->CI->input->post('idperiodo');

        $data = array('codigo_macroactividad' => $this->CI->input->post('codigo_macroactividad'),
            'nombre_macroactividad' => $this->CI->input->post('nombre_macroactividad'),
            'descripcion_macroactividad' => $this->CI->input->post('descripcion_macroactividad'),
            'idproyecto' => $this->CI->input->post('idproyecto'),
            'idobjetivo' => $this->CI->input->post('idobjetivo'),
            'idregional' => $this->CI->input->post('idregional'),
            'idperiodo' => $this->CI->input->post('idperiodo')
        );

        //Si existe la regional, procede a actualizar registros
        if ($idmacroactividad) {
            $resultadoOK = $this->CI->Macroactividad_model->editar_macroactividad($idmacroactividad, $data);
            //Sin no existe la regional, procede a insertarlo
        } else {
            $resultadoOK = $this->CI->Macroactividad_model->crear_macroactividad($data);
        }


        if ($resultadoOK) {
            
        } else {
            
        }
        $this->index_macroactividad($idproyecto, $idregional, $idperiodo);
    }

    public function eliminar_registro($idmacroactividad) {
        $idproyecto = $this->CI->input->post('idproyecto');
        $idregional = $this->CI->input->post('idregional');
        $idperiodo = $this->CI->input->post('idperiodo');
        
        $this->CI->Macroactividad_model->eliminar_macroactividad($idmacroactividad);
        $this->index_macroactividad($idproyecto, $idregional, $idperiodo);
    }

    public function atras() {
        $idproyecto = $this->CI->input->post('idproyecto');
        $idregional = $this->CI->input->post('idregional');
        $idperiodo = $this->CI->input->post('idperiodo');
        $this->index_macroactividad($idproyecto, $idregional, $idperiodo);
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

        echo construir_select($this->CI->Depto_model->arrayDeptos, 'iddepto', 'nombre_depto', 'iddepto', $iddepto);
    }

    public function cargar_municipios() {
        $iddepto = $this->CI->input->post('iddepto');
        $idmunicipio = $this->CI->input->post('idmunicipio');
        $this->CI->Municipio_model->obtener_municipiosxdepto($iddepto);
        echo construir_select($this->CI->Municipio_model->arrayMunicipios, 'idmunicipio', 'nombre_municipio', 'idmunicipio', $idmunicipio);
    }

}
