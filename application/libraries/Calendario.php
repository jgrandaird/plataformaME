<?php

include_once APPPATH . 'libraries/Modulo.php';
include_once APPPATH . 'libraries/Semaforo.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Calendario {

    public $CI;
    public $idevento;
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
    public $idregional;
    public $idpersona;

    public function __construct() {

        $this->CI = & get_instance();
        $this->CI->load->model("Autocontrol/Calendar_model");
        $this->CI->load->model('Planimplementacion/Macroactividad_model');
        $this->CI->load->model('MarcoLogico/Periodo_model');
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->rutaJs = base_url() . "assets/js/main.js";
        $this->titulo_lista = "Programador";
        $this->titulo_nuevo = "";
        $this->referencia = array();
        $this->idevento = $this->CI->input->post('id');
        $this->idregistro = $this->CI->input->post('idproyecto');
        $this->idregional = $this->CI->session->userdata("idregional_funcionario");
        $this->idpersona = $this->CI->session->userdata("idfuncionario");

        $this->menuIndex = "index_calendario";
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

    public function index_calendario($idproyecto) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        $idregional = $this->idregional;
        $idpersona = $this->idpersona;

        $arrayPlanImplementacion = $this->CI->Macroactividad_model->obtener_plan_implementacion($idproyecto, $idregional);
        $this->CI->Periodo_model->obtener_periodos($idproyecto);

        $data["objPlan"] = $arrayPlanImplementacion;
        $data["objPeriodo"] = $this->CI->Periodo_model;
        $data["idregional"] = $idregional;
        $data["idpersona"] = $idpersona;
        $data["idproyecto"] = $idproyecto;
        $this->CI->load->view('Autocontrol/Calendario_view', $data);
    }

    //<editor-fold defaultstate="collapsed" desc="CRUD CALENDARIO"> 

    Public function getEvents() {

        $arrayEventos = array();
        $result = $this->CI->Calendar_model->getEvents();

        foreach ($result as $evento) {
            $objEvent = new stdClass();
            $objEvent->id = $evento->id;
            $objEvent->title = $evento->title;
            $objEvent->date = $evento->date;
            $objEvent->description = $evento->description;

            //En caso que la actividad esté antes de la fecha actual y aún sigue en estado programada
            //de manera forzosa se modifica el estado de actividad a rojo
            if ($evento->date < date('Y-m-d') && $evento->realizacion === 'Programada') {
                $objEvent->color = "#F2DEDE";
                $objEvent->textColor = "#A94471";
            }
            //Si está dentro de los términos, es decir posterior a la fecha actual se mantiene 
            //el color de estado programada
            else {
                $objEvent->color = $evento->color;
                $objEvent->textColor = $evento->textColor;
            }
            $objEvent->realizacion = $evento->realizacion;
            $objEvent->idproyecto = $evento->idproyecto;
            $objEvent->idregional = $evento->idregional;
            $objEvent->idpersona = $evento->idpersona;

            array_push($arrayEventos, $objEvent);
        }
        echo json_encode($arrayEventos);
    }

    //Adiciona un nuevo evento
    Public function addEvent() {
        $result = $this->CI->Calendar_model->addEvent();
        
        //Permite determinar un color del semáforo al evento insertado
        $this->capturar_estado_evento($this->CI->Calendar_model->id);
        echo $result;
    }

    //Actualiza un evento
    Public function updateEvent() {
        $result = $this->CI->Calendar_model->updateEvent();
        //Permite determinar un color del semáforo al evento insertado
        $this->capturar_estado_evento($this->idevento);
        echo $result;
    }

    //Elimina un evento
    Public function deleteEvent() {
        $result = $this->CI->Calendar_model->deleteEvent();
        echo $result;
    }

    //Arrastra un evento y actualiza fecha de realización
    Public function dragUpdateEvent() {
        $result = $this->CI->Calendar_model->dragUpdateEvent();
        echo $result;
    }

    //</editor-fold>

    //Captura el estado del evento para proceder a clasificarlo en el semaforo
    Public function capturar_estado_evento($idevento){
        
        $this->CI->Calendar_model->obtener_evento($idevento);
        
        //Captura estado del evento
        $realizacion = $this->CI->Calendar_model->realizacion;
        
        //Captura el número de soportes del evento
        $existencia_soporte = $this->CI->Calendar_model->obtener_numero_soportes_evento($idevento);
        
        //Establece el color del semaforo para el evento
        $estado = $this->monitorear_evento($realizacion, $existencia_soporte);
        $arrayEstado = explode(",", $estado);
        $estadoEvento = $arrayEstado[0];
        $estadoLetra = $arrayEstado[1];
        if ($estado !== $this->CI->Calendar_model->color) {
            $this->CI->Calendar_model->actualizar_estado_evento($idevento, $estadoEvento, $estadoLetra);
        }
        
    }
    
    //Asigna color al evento
    Public function monitorear_evento($realizacion, $existencia_soporte) {
        $estado = "";
        $colorletra = "";
        $objSemaforo=new Semaforo();

        if ($realizacion === "Programada") {
            $estado = $this->CI->Calendar_model->color;
            $colorletra = $this->CI->Calendar_model->textColor;
        }
        if ($realizacion === "Realizada") {
            if ($existencia_soporte > 0) {
                $estado = $objSemaforo->success;
                $colorletra = $objSemaforo->successTexto;
            } else {
                $estado = $objSemaforo->warning;
                $colorletra = $objSemaforo->warningTexto;
            }
        }
        if ($realizacion === "Cancelada") {
            $estado = $objSemaforo->gris;
            $colorletra = $objSemaforo->grisTexto;
        }
        return $estado . "," . $colorletra;
    }

    //Consulta las actividades del pi asociados a un evento
    Public function obtener_eventos_plan($idevento) {
        $result = $this->CI->Calendar_model->obtener_eventos_plan($idevento);
        echo $result;
    }

}
