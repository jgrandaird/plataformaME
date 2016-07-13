<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Periodo {

    public $CI;
    public $rutaJs;
    public $idproyecto;
    public $objModulo;
    public $barraAcciones;
    public $nombreProyecto;
    public $antecesor;

    public function __construct() {

        $this->CI = & get_instance();
        $this->CI->load->model("MarcoLogico/Periodo_model");
        $this->CI->load->model("MarcoLogico/Proyecto_model");
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->CI->load->helper('Formulario_helper');
        $this->rutaJs = base_url() . "assets/js/periodo.js";
    }

    public function parametrizar_modulo() {

        $this->objModulo = new Modulo("Periodo", $this->antecesor, $this->parametro);
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
    
    public function obtener_informacion_predecesor($idproyecto){
        $this->CI->Proyecto_model->obtener_proyecto($idproyecto);
        $this->nombreProyecto=$this->CI->Proyecto_model->nombre_proyecto;
        
        
    }
    
    public function index_periodo($idproyecto) {

        
        
        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo($idproyecto);
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del pediodo
        $this->CI->Periodo_model->obtener_periodos($idproyecto);
        
        //Informacion predecesor
        $this->abrir_encabezado();
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;
        
        $data["objPeriodo"] = $this->CI->Periodo_model;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Lista_Periodo_view', $data);
    }

    public function nuevo_registro() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo($this->CI->input->post('idproyecto'));
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del periodo
        $this->CI->Periodo_model->idproyecto=$this->CI->input->post('idproyecto');
        $data["objRegistro"] = $this->CI->Periodo_model;
                
        //Informacion predecesor
        $this->obtener_informacion_predecesor($this->CI->input->post('idproyecto'));
        $data["nombreProyecto"] = $this->nombreProyecto;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nuevo_Periodo_view', $data);
    }

    public function editar_registro() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        $idperiodo = $this->CI->uri->segment(4);
        $idproyecto = $this->CI->input->post('idproyecto');
        
        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo($idproyecto);
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del periodo
        $this->CI->Periodo_model->obtener_periodo($idperiodo);
        $data["objRegistro"] = $this->CI->Periodo_model;

        //Informacion predecesor
        $this->obtener_informacion_predecesor($idproyecto);
        $data["nombreProyecto"] = $this->nombreProyecto;
        
        //Carga la vista
        $this->CI->load->view('MarcoLogico/Nuevo_Periodo_view', $data);
    }

    public function guardar_registro() {

        $idproyecto = $this->CI->input->post('idproyecto');
        $idperiodo = $this->CI->input->post('idperiodo');
        $data = array('codigo_periodo' => $this->CI->input->post('codigo_periodo'),
            'fecha_inicio_periodo' => $this->CI->input->post('fecha_inicio_periodo'),
            'fecha_final_periodo' => $this->CI->input->post('fecha_final_periodo'),
            'idproyecto' => $this->CI->input->post('idproyecto')
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
        $this->index_periodo($idproyecto);
    }

    public function eliminar_registro($idperiodo) {
        $idproyecto = $this->CI->input->post('idproyecto');
        $this->CI->Periodo_model->eliminar_periodo($idperiodo);
        $this->index_periodo($idproyecto);
    }

    public function atras() {
        $idproyecto = $this->CI->input->post('idproyecto');
        $this->index_periodo($idproyecto);
    }

}
