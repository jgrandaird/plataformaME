<?php

include_once APPPATH . 'libraries/Modulo.php';
include_once APPPATH . 'libraries/Casillasemana.php';
include_once APPPATH . 'libraries/Semaforo.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Macroactividad {

    public $CI;
    public $idmacroactividad;
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
        $this->CI->load->model("Marcologico/Objetivo_model");
        $this->CI->load->model("Personal/Personal_model");
        $this->CI->load->model("Marcologico/Regional_model");
        $this->CI->load->model("Marcologico/Lineaaccion_model");
        $this->CI->load->model("Soporte/Soporte_model");
        $this->rutaJs = base_url() . "assets/js/macroactividad.js";
        $this->titulo_lista = "PLAN DE IMPLEMENTACI&Oacute;N";
        $this->titulo_nuevo = "NUEVA ACTIVIDAD";
        $this->referencia = array();
        $this->idmacroactividad = $this->CI->input->post('idmacroactividad');
        $this->idperiodo = $this->CI->input->post('idperiodo');
        $this->idregional = $this->CI->input->post('idregional');
        $this->idproyecto = $this->CI->input->post('idproyecto');
        $this->idregistro = $this->idperiodo;
        $this->menuIndex = "index_macroactividad";
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
    public function index_macroactividad($idproyecto, $idregional, $idperiodo) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros de la Macroactividad
        $arrayResponsables = array();
        $arregloPersonas = array();
        $this->CI->Macroactividad_model->obtener_macroactividades($idproyecto, $idregional, $idperiodo);
        foreach ($this->CI->Macroactividad_model->arrayMacroactividad as $macroactividad) {
            $arrayResponsables = $this->CI->Macroactividad_model->obtener_todopersonal_macroactividad($macroactividad->idmacroactividad);
            $indice = $macroactividad->idmacroactividad;
            $arregloPersonas[$indice] = "";
            $coma = "";
            if ($arrayResponsables->num_rows() > 0) {
                foreach ($arrayResponsables->result() as $responsables) {

                    $arregloPersonas[$indice] = $arregloPersonas[$indice] . $coma . $responsables->nombres_persona . " " . $responsables->apellidos_persona;
                    $coma = ",";
                }
            }
        }

        $arrayMesSemana = $this->obtener_todos_mes_semana();

        $this->CI->Periodo_model->obtener_periodo($idperiodo);



        $objCasilla = $this->crear_encabezado_meses($this->CI->Periodo_model->fecha_inicio_periodo, $this->CI->Periodo_model->fecha_final_periodo);

        $data["objCasilla"] = $objCasilla;
        $data["arregloPersonas"] = $arregloPersonas;
        $data["arrayMesSemana"] = $arrayMesSemana;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_lista);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        $data["objMacroactividad"] = $this->CI->Macroactividad_model;


        //Carga la vista
        $this->CI->load->view('Planimplementacion/Lista_Macroactividad_view', $data);
    }

    //
    public function index_consulta_macroactividad($idproyecto, $idregional, $idperiodo) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = base_url() . "assets/js/macroactividad_consulta.js";

        //Consulta los registros de la Macroactividad
        $arrayResponsables = array();
        $arregloPersonas = array();
        $this->CI->Macroactividad_model->obtener_macroactividades($idproyecto, $idregional, $idperiodo);
        foreach ($this->CI->Macroactividad_model->arrayMacroactividad as $macroactividad) {
            $arrayResponsables = $this->CI->Macroactividad_model->obtener_todopersonal_macroactividad($macroactividad->idmacroactividad);
            $indice = $macroactividad->idmacroactividad;
            $arregloPersonas[$indice] = "";
            $coma = "";
            if ($arrayResponsables->num_rows() > 0) {
                foreach ($arrayResponsables->result() as $responsables){

                    $arregloPersonas[$indice] = $arregloPersonas[$indice] . $coma . $responsables->nombres_persona . " " . $responsables->apellidos_persona;
                    $coma = ",";
                }
            }
        }

        $arrayMesSemana = $this->obtener_todos_mes_semana();

        $this->CI->Periodo_model->obtener_periodo($idperiodo);



        $objCasilla = $this->crear_encabezado_meses($this->CI->Periodo_model->fecha_inicio_periodo, $this->CI->Periodo_model->fecha_final_periodo);

        $this->CI->Periodo_model->obtener_periodos($idproyecto);

        $data["objCasilla"] = $objCasilla;
        $data["objPeriodo"] = $this->CI->Periodo_model;
        $data["arregloPersonas"] = $arregloPersonas;
        $data["arrayMesSemana"] = $arrayMesSemana;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_lista);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;
        $data["idproyecto"] = $idproyecto;
        $data["objMacroactividad"] = $this->CI->Macroactividad_model;
        $data["rutaModulo"] = $this->rutaModulo;

        //Carga la vista
        $this->CI->load->view('Autocontrol/Lista_Consulta_Macroactividad_view', $data);
    }

    public function index_album($idproyecto, $idregional, $idperiodo) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros de la Macroactividad
        $arrayResponsables = array();
        $arregloPersonas = array();
        $this->CI->Macroactividad_model->obtener_macroactividades($idproyecto, $idregional, $idperiodo);
        foreach ($this->CI->Macroactividad_model->arrayMacroactividad as $macroactividad) {
            $arrayResponsables = $this->CI->Macroactividad_model->obtener_todopersonal_macroactividad($macroactividad->idmacroactividad);
            $indice = $macroactividad->idmacroactividad;
            $arregloPersonas[$indice] = "";
            $coma = "";
            if ($arrayResponsables->num_rows() > 0) {
                foreach ($arrayResponsables->result() as $responsables) {

                    $arregloPersonas[$indice] = $arregloPersonas[$indice] . $coma . $responsables->nombres_persona . " " . $responsables->apellidos_persona;
                    $coma = ",";
                }
            }
        }

        $arrayMesSemana = $this->obtener_todos_mes_semana();

        $this->CI->Periodo_model->obtener_periodo($idperiodo);



        $objCasilla = $this->crear_encabezado_meses($this->CI->Periodo_model->fecha_inicio_periodo, $this->CI->Periodo_model->fecha_final_periodo);

        $data["objCasilla"] = $objCasilla;
        $data["arregloPersonas"] = $arregloPersonas;
        $data["arrayMesSemana"] = $arrayMesSemana;
        $data["idproyecto"] = $idproyecto;

        //Informacion predecesor
        $this->abrir_encabezado("ALBUM ACTIVIDADES PLAN DE IMPLEMENTACIÓN");
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        $data["objMacroactividad"] = $this->CI->Macroactividad_model;


        //Carga la vista
        $this->CI->load->view('Autocontrol/Lista_Album_Macroactividad_view', $data);
    }
    
    Public function index_linea_tiempo($idmacroactividad) {

        $this->titulo_lista = "LINEA DE TIEMPO";

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        //$data["rutaJs"] = $this->rutaJs;
        $data["rutaJs"] = base_url() . "assets/js/macroactividad_consulta.js";

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_lista);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        $idperiodo = $this->CI->input->post('idperiodo');
        $idproyecto = $this->CI->input->post('idproyecto');
        $idregional = $this->CI->input->post('idregional');

        $this->CI->Macroactividad_model->obtener_macroactividad($idmacroactividad);
        $data["nombre_macroactividad"] = $this->CI->Macroactividad_model->nombre_macroactividad;

        $objEventos = $this->CI->Macroactividad_model->obtener_eventos_macroactividad($idmacroactividad);
        $data["objEventos"] = $objEventos;

        $arraySoportes = $this->obtener_soportes_evento($objEventos);
        $data["arraySoportes"] = $arraySoportes;
        
        $arrayColorEvento = $this->colorear_actividad($objEventos);
        
        $data["arrayColorEvento"] = $arrayColorEvento;
        $data["rutaModulo"] = $this->rutaModulo;
        $data["idproyecto"] = $this->CI->input->post('idperiodo');

        

        //Carga la vista
        $this->CI->load->view('Autocontrol/Linea_tiempo_view', $data);
    }
    
    
    public function index_tablero_control($idproyecto, $idregional, $idperiodo) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = base_url() . "assets/js/macroactividad_consulta.js";
        
        $this->titulo_lista = "TABLERO DE CONTROL ".  strtoupper($this->CI->session->userdata("nombre_funcionario"));

        //Consulta los registros de la Macroactividad
        $this->CI->Macroactividad_model->obtener_macroactividades($idproyecto, $idregional, $idperiodo);
        $arrayMacroactividad=array();
        $arrayColorMacroactividad=array();
        $arrayColores=array();
        $arrayTotalMacroactividad=array();
        //Recorre las macroactividades
        foreach ($this->CI->Macroactividad_model->arrayMacroactividad as $macroactividad) {
            $indice=$macroactividad->idmacroactividad;
            //Verifica que la macroactividad pertenece al usuario en sesión
            $numMacroactividad=$this->CI->Macroactividad_model->obtener_personal_macroactividad($macroactividad->idmacroactividad, $this->CI->session->userdata("idfuncionario"));
            //Si pertenece..
            if($numMacroactividad>0){
                $arrayMacroactividad[$indice]=$macroactividad;
                //Consulta el estado de los eventos asociados a la macroactividad
                $arrayColores=$this->obtener_eventos_macroactividad_funcionario($indice,$this->CI->session->userdata("idfuncionario"));
                $arrayColorMacroactividad[$indice]=$arrayColores;
                $arrayTotalMacroactividad[$indice]=$this->contar_eventos_macroactividad($arrayColorMacroactividad[$indice]);
                
            }
            
            
        }

        $this->CI->Periodo_model->obtener_periodos($idproyecto);
        $data["objPeriodo"] = $this->CI->Periodo_model;
        $data["arrayColorMacroactividad"] = $arrayColorMacroactividad;
        $data["arrayTotalMacroactividad"] = $arrayTotalMacroactividad;
        


        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_lista);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;
        $data["objSemaforo"] = new Semaforo();
        $data["idproyecto"] = $idproyecto;
        $data["arrayMacroactividad"] = $arrayMacroactividad;
        $data["rutaModulo"] = $this->rutaModulo;

        //Carga la vista
        $this->CI->load->view('Autocontrol/Tablero_control_view', $data);
    }
    
    //Consulta los eventos de un funcionario asociados a una actividad del pi para tener referencia del estado (color)
    function obtener_eventos_macroactividad_funcionario($idmacroactividad,$idfuncionario){
        $objColores=$this->CI->Macroactividad_model->obtener_eventos_macroactividad_funcionario($idmacroactividad,$idfuncionario);
        $objSemaforo = new Semaforo();
        foreach($objColores->result() as $color){
            $estadoEvento=$color->color;
            if ($color->date < date('Y-m-d') && $color->realizacion === 'Programada') {
                $estadoEvento="#F2DEDE";
            }
            
            $objSemaforo->acumular_color($estadoEvento);
        }
        return $objSemaforo->arrayAcumColor;
        
    }
    
    public function contar_eventos_macroactividad($arrayMacroactividad){
        $total=0;
        foreach($arrayMacroactividad as $totalparcial){
            
            $total=$total+$totalparcial;    
            
            
        }
        return $total;
        
    }

    public function crear_encabezado_meses($fecha_inicio, $fecha_fin) {


        $objCasilla = new Casillasemana();
        $objCasilla->obtener_numero_meses($fecha_inicio, $fecha_fin);

        for ($s = intval($objCasilla->mes_inicial); $s < intval($objCasilla->mes_inicial) + $objCasilla->numero_meses; $s++) {
            $indiceSemana = $s;
            if ($s <= 9) {
                $indiceSemana = "0" . $s;
            }
            //$objCasilla->contar_semanas_pormes($objCasilla->mes_inicial, $indiceSemana);
            $objCasilla->contar_semanas_pormes_4($indiceSemana);
        }

        return $objCasilla;
    }

    public function index_check_personal($idmacroactividad) {

        $this->titulo_lista = "RESPONSABLES DE ACTIVIDAD";

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

        $idperiodo = $this->CI->input->post('idperiodo');
        $idproyecto = $this->CI->input->post('idproyecto');
        $idregional = $this->CI->input->post('idregional');

        $data["objResposanbles"] = $this->CI->Macroactividad_model->obtener_todopersonal_macroactividad($idmacroactividad);

        //Carga la vista
        $this->CI->load->view('Personal/Lista_PersonalCheck_view', $data);
    }

    function obtener_todos_mes_semana() {
        $arrayMesSemana = array();
        foreach ($this->CI->Macroactividad_model->arrayMacroactividad as $macroactividad) {
            $indiceActividad = $macroactividad->idmacroactividad;
            $arrayResultado = $this->CI->Macroactividad_model->obtener_todos_mes_semana($macroactividad->idmacroactividad);
            $arrayMesSemana[$indiceActividad] = $arrayResultado;
        }

        return $arrayMesSemana;
    }

    function obtener_soportes_evento($objEvento) {
        $arraySoportes = array();
        
        foreach ($objEvento->result() as $evento) {
            $indiceEvento = $evento->id;
            $objSoporte = new $this->CI->Soporte_model;
            $objSoporte->obtener_soportes($indiceEvento);
            $arraySoportes[$indiceEvento] = $objSoporte->arraySoportes;
        }
        return $arraySoportes;
    }

    function colorear_actividad($objEvento) {

        $arrayColorEvento = array();
        foreach ($objEvento->result() as $evento) {

            $indiceEvento = $evento->id;
            $objSemaforo = new Semaforo();
            $color = $objSemaforo->colorear($evento->date, $evento->color);
            $colorDefinitivo=$objSemaforo->arrayColor[$color];
            $arrayColorEvento[$indiceEvento] = $colorDefinitivo;
        }
        return $arrayColorEvento;
    }

    //<editor-fold defaultstate="collapsed" desc="CRUD Macroactividad"> 

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

        $this->abrir_encabezado($this->titulo_lista);
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

        $this->abrir_encabezado($this->titulo_lista);
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
            'idperiodo' => $this->CI->input->post('idperiodo'),
            'idlineaaccion' => $this->CI->input->post('idlineaaccion')
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
    }

    public function eliminar_registro($idmacroactividad) {
        $idproyecto = $this->CI->input->post('idproyecto');
        $idregional = $this->CI->input->post('idregional');
        $idperiodo = $this->CI->input->post('idperiodo');

        $this->CI->Macroactividad_model->eliminar_macroactividad($idmacroactividad);
    }

    //</editor-fold>

    public function adicionar_mes_semana($input_celda) {
        $celda = $this->CI->input->post($input_celda);

        $arrayDato = explode("_", $input_celda);
        $idmacroactividad = $arrayDato[1];
        $mes = $arrayDato[2];
        $semana = $arrayDato[3];
        //print $celda;

        if ($celda == 1) {

            $data = array('idmacroactividad' => $idmacroactividad,
                'mes' => $mes,
                'semana' => $semana
            );
            $this->CI->Macroactividad_model->adicionar_mes_semana($data);
        } else {
            //$arrayResultado = $this->CI->Macroactividad_model->obtener_mes_semana($idmacroactividad, $mes, $semana);
            //if ($arrayResultado->affected_rows() > 0) {
            $this->CI->Macroactividad_model->eliminar_mes_semana($idmacroactividad, $mes, $semana);
            //}
        }
    }

    public function capturar_informacion_complemento() {
        $i = 0;
        foreach ($this->CI->Personal_model->arrayPersonal as $personal) {

            $this->CI->Regional_model->obtener_regional($personal->idregional);
            $personal->objRegional = $this->CI->Regional_model->nombre_regional;


            $i++;
        }
    }

    public function adicionar_personal() {

        $numPersonal = $this->CI->input->post('numPersonal');
        $idmacroactividad = $this->CI->input->post('idmacroactividad');
        $this->CI->Macroactividad_model->eliminar_personal_macroactividad($idmacroactividad);
        for ($i = 0; $i < $numPersonal; $i++) {
            $nombre_check = "checkbox_registro[" . $i . "]";
            $idpersonal = $this->CI->input->post($nombre_check);

            $data = array('idmacroactividad' => $idmacroactividad,
                'idpersonal' => $idpersonal
            );
            if ($idpersonal) {
                $conteo = $this->CI->Macroactividad_model->obtener_personal_macroactividad($idmacroactividad, $idpersonal);
                if ($conteo > 0) {
                    
                } else {
                    $this->CI->Macroactividad_model->adicionar_personal_macroactividad($data);
                }
            }
        }
    }

    public function cargar_lineasaccion() {
        $idobjetivo = $this->CI->input->post('idobjetivo');
        $idlineaaccion = $this->CI->input->post('idlineaaccion');
        $this->CI->Lineaaccion_model->obtener_lineasaccion($idobjetivo);
        echo construir_select($this->CI->Lineaaccion_model->arrayLineaaccion, 'idlineaaccion', "nombre_lineaaccion", 'idlineaaccion', $idlineaaccion);
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
