<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function consultar_registros($entidad) {
        $arrayRegistros = $this->db->get($entidad);
        if ($arrayRegistros->num_rows() > 0) {
            return $arrayRegistros;
        } else {
            return $arrayRegistros;
        }
    }

    function consultar_registro($entidad, $identificador, $id) {

        $this->db->where($identificador, $id);
        $query = $this->db->get($entidad);
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            //return $query;//false;
            return $query;
        }
    }
    
    function consultar_registros_abierto($consulta) {
        $arrayRegistros = $this->db->query($consulta);
        if ($arrayRegistros->num_rows() > 0) {
            return $arrayRegistros;
        } else {
            return $arrayRegistros;
        }
    }

    function crear_registro($entidad, $arrayData) {
        return $this->db->insert($entidad, $arrayData);
    }

    function editar_registro($entidad, $identificador, $id, $arrayData) {
        $this->db->where($identificador, $id);
        $this->db->update($entidad, $arrayData);
        return $affected_rows = $this->db->affected_rows();
    }

    function eliminar_registro($entidad, $identificador, $id) {
        $this->db->delete($entidad, array($identificador => $id));
    }
    function eliminar_registro_abierto($sentencia) {
        $this->db->query($sentencia);
    }

}
