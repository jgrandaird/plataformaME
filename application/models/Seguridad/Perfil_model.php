<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_model extends CI_Model {

    public $idperfil;
    public $nombre_perfil;
    public $descripcion_perfil;
    public $arrayPerfil;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arrayPerfil = array();
        $this->numPerfil = 0;
    }

    function obtener_perfiles() {

        $arrayPerfiles = $this->Crud_model->consultar_registros('Perfil');
        $i = 0;
        foreach ($arrayPerfiles->result() as $perfil) {
            $this->arrayPerfil[$i] = $perfil;
            $i++;
        }
        $this->numPerfil = $i;
    }

    function obtener_perfil($idperfil) {

        $arrayPerfil = $this->Crud_model->consultar_registro('Perfil', 'idperfil', $idperfil);

        $i = 0;
        foreach ($arrayPerfil->result() as $perfil) {

            $this->idperfil = $perfil->idperfil;
            $this->nombre_perfil = $perfil->nombre_perfil;
            $this->descripcion_perfil = $perfil->descripcion_perfil;
            $i++;
        }
    }

    function crear_perfil($arrayData) {
        return $this->Crud_model->crear_registro('Perfil', $arrayData);
    }

    function editar_perfil($idperfil, $arrayData) {
        return $this->Crud_model->editar_registro('Perfil', 'idperfil', $idperfil, $arrayData);
    }

    function eliminar_perfil($idperfil) {
        $this->Crud_model->eliminar_registro('Perfil', 'idperfil', $idperfil);
    }

}
