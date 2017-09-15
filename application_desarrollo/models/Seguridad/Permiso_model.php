<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permiso_model extends CI_Model {

    public $idpermiso;
    public $nombre_permiso;
    public $codigo_permiso;
    public $descripcion_permiso;
    public $ruta_permiso;
    public $idperfil;
    public $arrayPermiso;

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
        $this->arrayPermiso = array();
        $this->numPermiso = 0;
    }

    function obtener_permisos($idperfil) {

        $arrayPermisos = $this->Crud_model->consultar_registro('Permiso', 'idperfil', $idperfil);
        $i = 0;
        foreach ($arrayPermisos->result() as $permiso) {
            $this->arrayPermiso[$i] = $permiso;
            $i++;
        }
        $this->numPermiso = $i;
    }

    function obtener_permiso($idpermiso) {

        $arrayPermisos = $this->Crud_model->consultar_registro('Permiso', 'idpermiso', $idpermiso);

        $i = 0;
        foreach ($arrayPermisos->result() as $permiso) {

            $this->idpermiso = $permiso->idpermiso;
            $this->codigo_permiso = $permiso->codigo_permiso;
            $this->nombre_permiso = $permiso->nombre_permiso;
            $this->descripcion_permiso = $permiso->descripcion_permiso;
            $this->ruta_permiso = $permiso->ruta_permiso;
            $this->idperfil = $permiso->idperfil;
            $i++;
        }
    }

    function crear_permiso($arrayData) {
        return $this->Crud_model->crear_registro('Permiso', $arrayData);
    }

    function editar_permiso($idpermiso, $arrayData) {
        return $this->Crud_model->editar_registro('Permiso', 'idpermiso', $idpermiso, $arrayData);
    }

    function eliminar_permiso($idpermiso) {
        $this->Crud_model->eliminar_registro('Permiso', 'idpermiso', $idpermiso);
    }

}
