<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Personal {

    public $CI;
    public $rutaJs;
    public $objModulo;

    public function __construct() {

        $this->CI = & get_instance();
        $this->CI->load->model("Personal/Personal_model");
        $this->CI->load->model("MarcoLogico/Regional_model");
        $this->CI->load->library("Menu", array());
        $this->CI->menu->rutaModulo = "Personal/Personal_controller/";
        $this->CI->menu->construir_menu_generico();
        $this->CI->load->helper('Menu');
        $this->CI->load->helper('BarraAcciones_helper');
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->rutaJs = base_url() . "assets/js/personal.js";
    }

    public function parametrizar_modulo() {

        $parametro = "";
        $this->objModulo = new Modulo("Personal", "", $parametro);
    }

    public function index_personal() {

        //Parametriza la barra de acciones
        $menuFormulario = array("Nuevo_Lista", "Editar_Lista", "Eliminar_Lista");
        $this->iniciar_menu($menuFormulario);
        $data["Menu"] = $this->CI->menu->arrayMenu;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del personal
        $this->CI->Personal_model->obtener_personal();
        $this->capturar_informacion_complemento();


        $data["objPersonal"] = $this->CI->Personal_model;

        //Carga la vista
        $this->CI->load->view('Personal/Lista_Personal_view', $data);
    }

    public function nuevo_registro() {

        //Parametriza la barra de acciones
        $menuFormulario = array("Atras_Nuevo");
        $this->iniciar_menu($menuFormulario);
        $data["Menu"] = $this->CI->menu->arrayMenu;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Selecciona las regionales
        $this->CI->Regional_model->obtener_regionales();
        $data["objRegional"] = $this->CI->Regional_model;

        //Consulta los registros del regional
        $data["objRegistro"] = $this->CI->Personal_model;

        //Carga la vista
        $this->CI->load->view('Personal/Nuevo_Personal_view', $data);
    }

    public function editar_registro($idpersona) {

        //Parametriza la barra de acciones
        $menuFormulario = array("Atras_Nuevo");
        $this->iniciar_menu($menuFormulario);
        $data["Menu"] = $this->CI->menu->arrayMenu;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Selecciona las regionales
        $this->CI->Regional_model->obtener_regionales();
        $data["objRegional"] = $this->CI->Regional_model;

        //Consulta los registros del regional
        $this->CI->Personal_model->obtener_persona($idpersona);
        $data["objRegistro"] = $this->CI->Personal_model;

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
        $this->index_personal();
    }

    public function eliminar_registro($idpersonal) {
        $this->CI->Personal_model->eliminar_persona($idpersonal);
        $this->index_personal();
    }

    public function iniciar_menu($menuFormulario) {

        $arrayMenuEstandar = array();
        for ($i = 0; $i < sizeof($menuFormulario); $i++) {
            $llave = $menuFormulario[$i];
            $arrayMenuEstandar[$i]["Identificador"] = $llave;
        }
        construir_menu_estadar($arrayMenuEstandar, $this->CI->menu);
    }

    public function atras() {
        $this->index_personal();
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
