<?php

include_once APPPATH . 'libraries/Modulo.php';

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class Usuario {

    public $CI;
    public $nombre_usuario;
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
        $this->CI->load->model("Seguridad/Usuario_model");
        $this->CI->load->model("Personal/Personal_model");
        $this->CI->load->helper('ReferenciaScript_helper');
        $this->rutaJs = base_url() . "assets/js/usuario.js";
        $this->titulo_lista = "Usuarios";
        $this->titulo_nuevo = "Nuevo Usuario";
        $this->referencia = array();
        $this->nombre_usuario = $this->CI->input->post('nombre_usuario');
        $this->idregistro = "";
        $this->menuIndex = "index_usuario";
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

    public function index_usuario() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Consulta los registros del Perfil
        $this->CI->Usuario_model->obtener_usuarios();

        //Obtiene el nombre de usuario
        $arrayPersona = $this->obtener_funcionario_usuario();
        
        //Obtiene los perfiles del usuario
        $arrayPerfiles = $this->obtener_perfiles_usuario();

        $data["objUsuario"] = $this->CI->Usuario_model;
        $data["objPersona"] = $arrayPersona;
        $data["arrayPerfiles"] = $arrayPerfiles;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_lista);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('Seguridad/Lista_Usuario_view', $data);
    }

    public function obtener_funcionario_usuario() {
        $arrayPersona = array();
        foreach ($this->CI->Usuario_model->arrayUsuario as $usuario) {
            $indicePersona = $usuario->idpersona;
            $objPersona = new $this->CI->Personal_model;
            $objPersona->obtener_persona($indicePersona);
            $arrayPersona[$indicePersona] = $objPersona;
        }
        return $arrayPersona;
    }

    public function obtener_perfiles_usuario() {

        foreach ($this->CI->Usuario_model->arrayUsuario as $usuario) {
            $indiceUsuario = $usuario->nombre_usuario;
            $objUsuario = new $this->CI->Usuario_model;
            $arrayResultado = $objUsuario->obtener_perfiles_usuario($usuario->nombre_usuario);
            $coma = "";
            $cadenaPerfil = "";
            foreach ($arrayResultado->result() as $perfil) {
                $cadenaPerfil = $cadenaPerfil . $coma . $perfil->nombre_perfil;
                $coma = ",";
            }
            $arrayPerfiles[$indiceUsuario] = $cadenaPerfil;
        }
        return $arrayPerfiles;
    }

    public function index_check_perfiles($idregistro) {

        $this->titulo_lista = "PERFILES DE USUARIO";

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del personal
        $this->CI->Perfil_model->obtener_perfiles();
        $arrayPerfilesU = array();
        foreach ($this->CI->Perfil_model->arrayPerfil as $perfil) {
            $indicePerfil = $perfil->idperfil;
            $numPerfiles = $this->CI->Usuario_model->obtener_perfil_usuario($idregistro, $perfil->idperfil);
            if ($numPerfiles > 0) {
                $arrayPerfilesU[$indicePerfil] = 1;
            } else {
                $arrayPerfilesU[$indicePerfil] = 0;
            }
        }

        $data["objPerfil"] = $this->CI->Perfil_model;
        $data["arrayPerfilesU"] = $arrayPerfilesU;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_lista);
        $data["Titulo"] = $this->titulo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('Seguridad/Lista_PerfilCheck_view', $data);
    }

    public function nuevo_registro() {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Consulta los registros del Perfil
        $data["objRegistro"] = $this->CI->Usuario_model;

        //Selecciona los objetivos
        $this->CI->Personal_model->obtener_personal();
        $data["objPersona"] = $this->CI->Personal_model;


        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('Seguridad/Nuevo_Usuario_view', $data);
    }

    public function editar_registro($nombre_usuario) {

        //Parametriza la barra de acciones
        $data["Menu"] = $this->barraAcciones;

        //Parametriza el comportamiento del modulo
        $this->parametrizar_modulo();
        $data["objModulo"] = $this->objModulo;

        //Incluye js del formulario
        $data["rutaJs"] = $this->rutaJs;

        //Selecciona los funcionarios
        $this->CI->Personal_model->obtener_personal();
        $data["objPersona"] = $this->CI->Personal_model;
        
        //Consulta los registros del Objetivo
        $this->CI->Usuario_model->obtener_usuario($nombre_usuario);
        $data["objRegistro"] = $this->CI->Usuario_model;

        //Informacion predecesor
        $this->abrir_encabezado($this->titulo_nuevo);
        $data["Titulo"] = $this->titulo_nuevo;
        $data["Referencia"] = $this->referencia;

        //Carga la vista
        $this->CI->load->view('Seguridad/Nuevo_Usuario_view', $data);
    }

    public function guardar_registro() {

        $data = array('nombre_usuario' => $this->CI->input->post('nombre_usuario'),
            'clave_usuario' => $this->CI->input->post('clave_usuario'),
            'idpersona' => $this->CI->input->post('idpersona')
        );



        //Si existe el proyecto, procede a actualizar registros
        if ($this->CI->input->post('nombre_usuario')) {
            $resultadoOK = $this->CI->Usuario_model->editar_usuario($this->CI->input->post('nombre_usuario'), $data);
            if (!$resultadoOK) {
                $resultadoOK = $this->CI->Usuario_model->crear_usuario($data);
            }
        }
        if ($resultadoOK) {
            
        } else {
            
        }
    }

    public function eliminar_registro($nombre_usuario) {
        $this->CI->Usuario_model->eliminar_usuario($nombre_usuario);
    }

    public function adicionar_perfil() {



        $numPerfil = $this->CI->input->post('numPerfil');
        $nombre_usuario = $this->CI->input->post('nombre_usuario');

        $this->CI->Usuario_model->eliminar_perfil_usuario($nombre_usuario);
        for ($i = 0; $i < $numPerfil; $i++) {
            $nombre_check = "checkbox_registro[" . $i . "]";
            $idperfil = $this->CI->input->post($nombre_check);

            $data = array('idperfil' => $idperfil,
                'nombre_usuario' => $nombre_usuario
            );
            if ($idperfil) {
                $conteo = $this->CI->Usuario_model->obtener_perfil_usuario($nombre_usuario, $idperfil);
                if ($conteo > 0) {
                    
                } else {
                    $this->CI->Usuario_model->adicionar_perfil_usuario($data);
                }
            }
        }
    }

}
