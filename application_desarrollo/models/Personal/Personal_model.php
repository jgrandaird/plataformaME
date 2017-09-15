<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_model extends CI_Model {

    public $idpersona;
    public $identificacion_persona;
    public $nombres_persona;
    public $apellidos_persona;
    public $fecha_nacimiento_persona;
    public $idregional;
    public $correo_electronico_persona;
    public $celular_persona;
    public $direccion_persona;
    public $foto_persona;
    public $sexo;
    public $objRegional;
    public $arrayPersonal;
    public $numPersonal;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arrayPersonal = array();
        $this->numPersonal=0;
    }

    function obtener_personal() {

        $arrayPersonal = $this->Crud_model->consultar_registros('Personal');
        $i = 0;
        foreach ($arrayPersonal->result() as $persona) {
            $this->arrayPersonal[$i] = $persona;
            $i++;
        }
        $this->numPersonal=$i;
        
    }

    function obtener_persona($idpersona) {

        $arrayPersonal = $this->Crud_model->consultar_registro('Personal', 'idpersona', $idpersona);

        $i = 0;
        foreach ($arrayPersonal->result() as $persona) {

            $this->idpersona = $persona->idpersona;
            $this->identificacion_persona = $persona->identificacion_persona;
            $this->nombres_persona = $persona->nombres_persona;
            $this->apellidos_persona = $persona->apellidos_persona;
            $this->fecha_nacimiento_persona = $persona->fecha_nacimiento_persona;
            $this->idregional = $persona->idregional;
            $this->correo_electronico_persona = $persona->correo_electronico_persona;
            $this->celular_persona = $persona->celular_persona;
            $this->direccion_persona = $persona->direccion_persona;
            $this->foto_persona = $persona->foto_persona;
            $this->sexo = $persona->sexo;
            $i++;
        }
    }

    function crear_persona($arrayData) {
        return $this->Crud_model->crear_registro('Personal', $arrayData);
    }

    function editar_persona($idpersona, $arrayData) {
        return $this->Crud_model->editar_registro('Personal', 'idpersona', $idpersona, $arrayData);
    }

    function eliminar_persona($idpersona) {
        $this->Crud_model->eliminar_registro('Personal', 'idpersona', $idpersona);
    }
    
    function subir_foto_persona($idpersona,$ruta) {
        $this->Crud_model->sentencia_registro_abierto("UPDATE personal SET foto_persona=NULL WHERE idpersona='$idpersona'");
        return $this->Crud_model->sentencia_registro_abierto("UPDATE personal SET foto_persona='$ruta' WHERE idpersona='$idpersona'");
    }
    
    function obtener_datos_persona(){
        
        $arrayPersonal = $this->Crud_model->consultar_registros('Personal');
        $i = 0;
        $arrayDatoPersona=array();
        foreach ($arrayPersonal->result() as $persona) {
            $indicePersona=$persona->idpersona;
            $arrayDatoPersona[$indicePersona]=$persona->nombres_persona." ".$persona->apellidos_persona;
            $i++;
        }
        return $arrayDatoPersona;
        
    }
   
    
}
