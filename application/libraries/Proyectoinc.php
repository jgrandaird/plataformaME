<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Proyectoinc {

    public $CI;
    public $rutaJs;
    public $objModulo;
    public $barraAcciones;
    

    public function __construct() {

        $this->CI = & get_instance();
        $this->CI->load->model("MarcoLogico/Proyecto_model");
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->rutaJs=base_url()."assets/js/proyecto.js";
        
        
    }

    public function parametrizar_modulo(){

        $parametro="";
        $this->objModulo=new Modulo("Proyecto", "", $parametro);
        
    }
    
    public function index_proyecto() {
        
        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;
        
        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"]=$this->objModulo;
        
        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;
        
        //Consulta los registros del proyecto
        $this->CI->Proyecto_model->obtener_proyectos();
        $data["objProyecto"] = $this->CI->Proyecto_model;
        
        //Carga la vista
        $this->CI->load->view('MarcoLogico/Lista_Proyecto_view', $data);
    }

    public function nuevo_registro() {

        //Parametriza la barra de acciones
        //$menuFormulario=array("Atras_Nuevo");
        //$this->iniciar_menu($menuFormulario);
        //$data["Menu"] = $this->CI->menu->arrayMenu;
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"]=$this->objModulo;
        
        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;
        
        //Consulta los registros del proyecto
        $data["objRegistro"] = $this->CI->Proyecto_model;
        
        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nuevo_Proyecto_view', $data);
    }

    public function editar_registro() {

        //Parametriza la barra de acciones
        /*
        $menuFormulario=array("Atras_Nuevo");
        $this->iniciar_menu($menuFormulario);
        $data["Menu"] = $this->CI->menu->arrayMenu;
        */
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"]=$this->objModulo;
        
        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;
        
        $idproyecto = $this->CI->uri->segment(4);
        
        //Consulta los registros del proyecto
        $this->CI->Proyecto_model->obtener_proyecto($idproyecto);
        $data["objRegistro"] = $this->CI->Proyecto_model;
        
        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nuevo_Proyecto_view', $data);
    }

    public function guardar_registro() {

        $idproyecto = $this->CI->input->post('idproyecto');
        $data = array('nombre_proyecto' => $this->CI->input->post('nombre_proyecto'),
            'codigo_proyecto' => $this->CI->input->post('codigo_proyecto'),
            'descripcion_proyecto' => $this->CI->input->post('descripcion_proyecto'),
            'fecha_inicial_proyecto' => $this->CI->input->post('fecha_inicial_proyecto'),
            'fecha_final_proyecto' => $this->CI->input->post('fecha_final_proyecto'),
            'numero_periodos_proyecto' => $this->CI->input->post('numero_periodos_proyecto'));

        //Si existe el proyecto, procede a actualizar registros
        if ($idproyecto) {
            $resultadoOK = $this->CI->Proyecto_model->editar_proyecto($idproyecto, $data);
            //Sin no existe el proyecto, procede a insertarlo
        } else {
            $resultadoOK = $this->CI->Proyecto_model->crear_proyecto($data);
        }


        if ($resultadoOK) {
            
        } else {
            
        }
        $this->index_proyecto();
    }

    public function eliminar_registro($idproyecto) {
        $this->CI->Proyecto_model->eliminar_proyecto($idproyecto);
        $this->index_proyecto();
    }

    public function atras(){
        $this->index_proyecto();
    }

}
