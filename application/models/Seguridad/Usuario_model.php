<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public $nombre_usuario;
    public $clave_usuario;
    public $idpersona;
    public $arrayUsuario;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arrayUsuario = array();
        $this->numUsuario = 0;
    }

    function obtener_usuarios() {

        $arrayUsuario = $this->Crud_model->consultar_registros('Usuario');
        $i = 0;
        foreach ($arrayUsuario->result() as $usuario) {
            $this->arrayUsuario[$i] = $usuario;
            $i++;
        }
        $this->numUsuario = $i;
    }

    function obtener_usuario($nombre_usuario) {

        $arrayUsuario = $this->Crud_model->consultar_registro('Usuario', 'nombre_usuario', $nombre_usuario);

        $i = 0;
        foreach ($arrayUsuario->result() as $usuario) {

            $this->nombre_usuario = $usuario->nombre_usuario;
            $this->clave_usuario = $usuario->clave_usuario;
            $this->idpersona = $usuario->idpersona;
            $i++;
        }
    }

    function crear_usuario($arrayData) {
        return $this->Crud_model->crear_registro('Usuario', $arrayData);
    }

    function editar_usuario($nombre_usuario, $arrayData) {
        return $this->Crud_model->editar_registro('Usuario', 'nombre_usuario', $nombre_usuario, $arrayData);
    }

    function eliminar_usuario($nombre_usuario) {
        $this->Crud_model->eliminar_registro('Usuario', 'nombre_usuario', $nombre_usuario);
    }

    function validar_usuario($nombre_usuario, $clave_usuario) {
        $arrayResultado = $this->Crud_model->consultar_registros_abierto("SELECT usuario.nombre_usuario,personal.nombres_persona,personal.apellidos_persona,personal.idpersona "
                . " FROM usuario,personal "
                . " WHERE "
                . " usuario.idpersona=personal.idpersona AND "
                . " usuario.nombre_usuario='$nombre_usuario' AND"
                . " usuario.clave_usuario='$clave_usuario'");
        return $arrayResultado;
    }
    
    function cambiar_clave($nombre_usuario,$nueva_clave){
        return $this->Crud_model->sentencia_registro_abierto("UPDATE usuario SET clave_usuario='$nueva_clave' WHERE nombre_usuario='$nombre_usuario'");
    }

    function eliminar_perfil_usuario($nombre_usuario) {
        $this->Crud_model->eliminar_registro('Usuario_perfil', 'nombre_usuario', $nombre_usuario);
    }

    function adicionar_perfil_usuario($arrayData) {

        return $this->Crud_model->crear_registro('Usuario_perfil', $arrayData);
    }

    function obtener_perfil_usuario($nombre_usuario, $idperfil) {
        $arrayResultado = $this->Crud_model->consultar_registros_abierto("SELECT Usuario_perfil.nombre_usuario "
                . " FROM Usuario_perfil"
                . " WHERE "
                . " Usuario_perfil.nombre_usuario='$nombre_usuario' AND"
                . " Usuario_perfil.idperfil='$idperfil'");
        return $arrayResultado->num_rows();
    }

    function obtener_perfiles_usuario($nombre_usuario) {

        $arrayResultado = $this->Crud_model->consultar_registros_abierto("SELECT perfil.idperfil,perfil.nombre_perfil,perfil.icono_perfil "
                . " FROM Usuario_perfil,perfil"
                . " WHERE "
                . " Usuario_perfil.idperfil=perfil.idperfil AND "
                . " Usuario_perfil.nombre_usuario='$nombre_usuario'");

        return $arrayResultado;
    }

}
