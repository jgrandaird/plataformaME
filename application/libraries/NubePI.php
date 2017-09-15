<?php

include_once APPPATH . 'libraries/Modulo.php';


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class NubePI {

    public $CI;
    public $idperiodo;
    public $idregional;
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
    public $rutaModulo;

    public function __construct() {

        $this->CI = & get_instance();
        $this->CI->load->model("Planimplementacion/Macroactividad_model");
        $this->CI->load->model("Marcologico/Periodo_model");
        $this->CI->load->model("Marcologico/Regional_model");
        /*
        $this->CI->load->model("Planimplementacion/Macroactividad_model");
        $this->CI->load->model("Marcologico/Objetivo_model");
        $this->CI->load->model("Personal/Personal_model");
        $this->CI->load->model("Marcologico/Regional_model");
        $this->CI->load->model("Marcologico/Lineaaccion_model");
        $this->CI->load->model("Soporte/Soporte_model");
        $this->CI->load->model("Autocontrol/Calendar_model");
        $this->CI->load->model("Autocontrol/Periodo_model");
        */
        $this->rutaJs = base_url() . "assets/js/nubepi.js";
        $this->titulo_lista = "NUBE DE IMPLEMENTACI&Oacute;N";
        $this->titulo_nuevo = "NUEVA ACTIVIDAD";
        $this->referencia = array();
        $this->idmacroactividad = $this->CI->input->post('idmacroactividad');
        $this->idproyecto = $this->idproyecto;
        $this->idperiodo = $this->CI->input->post('idperiodo');
        $this->idregistro = $this->idproyecto;
        $this->menuIndex = "index_proyecto";
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

    //Permite visualizar el plan implementación para su posterior diligenciamiento
    public function index_proyecto() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_lista);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('MarcoLogico/Lista_Proyecto_view', $data);
    }
    
    function index_nube_pi($idproyecto,$idperiodo,$idregional){
        
        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = base_url() . "assets/js/nubepi.js";
        
        $this->titulo_lista = "NUBE DE IMPLEMENTACIÓN";
        $this->CI->Periodo_model->obtener_periodos($idproyecto);
        $this->CI->Regional_model->obtener_regionales();
        
        
        $this->abrir_encabezado($this->titulo_lista);
        
        $data["idperiodo"] = $idperiodo;
        $data["objRegional"] = $this->CI->Regional_model;
        $data["objPeriodo"] = $this->CI->Periodo_model;
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;
        $data["idproyecto"] = $idproyecto;
        $data["rutaModulo"] = $this->rutaModulo;
        

        //Carga la vista
        $this->CI->load->view('Planimplementacion/NubePI_view', $data);
        
        
    }
    
    function esfuerzo_pi_planeado($idproyecto,$idperiodo,$idregional){
        
        
        
        $objMacroactividad=$this->CI->Macroactividad_model->consolidado_actividad_pi_planeado($idproyecto,$idperiodo,$idregional);//$idproyecto
        $j=0;
        $arrayCarga=array();
        foreach($objMacroactividad->result() as $macroactividad){
            
            $obj=new stdclass;

            $obj->text=$macroactividad->nombres_persona." ".$macroactividad->apellidos_persona;//." [".$macroactividad->cantidad."]"
            $obj->weight=$macroactividad->cantidad;
        
            $arrayCarga[$j]=$obj;
            $j++;
        }
        $array_json=json_encode($arrayCarga);
        print $array_json;
        //print "Hola";
        
        
    }
    
    function esfuerzo_pi_ejecutado($idproyecto,$idperiodo,$idregional){
        
        
        
        $objMacroactividad=$this->CI->Macroactividad_model->consolidado_actividad_pi_ejecutado($idproyecto,$idperiodo,$idregional);//$idproyecto
        $j=0;
        $arrayCarga=array();
        foreach($objMacroactividad->result() as $macroactividad){
            
            $obj=new stdclass;

            $obj->text=$macroactividad->nombres_persona." ".$macroactividad->apellidos_persona;//." [".$macroactividad->cantidad."]"
            $obj->weight=$macroactividad->cantidad;
        
            $arrayCarga[$j]=$obj;
            $j++;
        }
        $array_json=json_encode($arrayCarga);
        print $array_json;
        //print "Hola";
        
        
    }
    
}