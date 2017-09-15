<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

    public $objAuditoria;
    public $objMonitoreo;

    function __construct() {
        parent::__construct();

        $objAuditoria = & get_instance();
        $objMonitoreo = & get_instance();
        $this->objAuditoria = $objAuditoria->load->database('auditoria', TRUE);
        $this->objMonitoreo = $objMonitoreo->load->database('default', TRUE);
        $this->load->model("Seguridad/Auditoria_model");
        $this->load->helper("ConstruccionCadenas_helper");
    }

    function consultar_registros($entidad) {
        $arrayRegistros = $this->objMonitoreo->get($entidad);
        if ($arrayRegistros->num_rows() > 0) {
            return $arrayRegistros;
        } else {
            return $arrayRegistros;
        }
    }

    function consultar_registro($entidad, $identificador, $id) {

        $this->objMonitoreo->where($identificador, $id);
        $query = $this->objMonitoreo->get($entidad);
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            //return $query;//false;
            return $query;
        }
    }

    function consultar_registros_abierto($consulta) {
        $arrayRegistros = $this->objMonitoreo->query($consulta);
        if ($arrayRegistros->num_rows() > 0) {
            return $arrayRegistros;
        } else {
            return $arrayRegistros;
        }
    }

    function crear_registro($entidad, $arrayData) {

        try {
            //$this->objAuditoria->db->set($this->objMonitoreo);

            $this->objMonitoreo->insert($entidad, $arrayData);
        } catch (Exception $e) {
            
        }
        if ($this->objMonitoreo) {
            $data = $this->Auditoria_model->crear_auditoria($entidad, "INSERT", $arrayData);
            $this->crear_registro_auditoria("auditoria", $data);
        }
        return $this->objMonitoreo;
    }

    function editar_registro($entidad, $identificador, $id, $arrayData) {
        $this->objMonitoreo->where($identificador, $id);
        $this->objMonitoreo->update($entidad, $arrayData);
        if ($this->objMonitoreo) {
            $data = $this->Auditoria_model->crear_auditoria($entidad, "UPDATE", $arrayData);
            $this->crear_registro_auditoria("auditoria", $data);
        }
        return $this->objMonitoreo;
    }

    function eliminar_registro($entidad, $identificador, $id) {
        $this->objMonitoreo->delete($entidad, array($identificador => $id));
        if ($this->objMonitoreo) {
            $data = $this->Auditoria_model->crear_auditoria($entidad, "DELETE", array($identificador => $id));
            $this->crear_registro_auditoria("auditoria", $data);
        }
        return $this->objMonitoreo;
    }

    function eliminar_registro_abierto($sentencia) {
        $this->objMonitoreo->query($sentencia);
        if ($this->objMonitoreo) {
            $accion=identificar_accion($sentencia);
            $posicion=identificar_posicion_tabla($accion);
            $tabla=identificar_tabla($sentencia,$posicion);
            $data = $this->Auditoria_model->crear_auditoria_sentencia($tabla, $accion,$sentencia);
            $this->crear_registro_auditoria("auditoria", $data);
        }
    }

    function sentencia_registro_abierto($sentencia) {

        try {
            $this->objMonitoreo->query($sentencia);
            if ($this->objMonitoreo) {
                $accion=identificar_accion($sentencia);
                
                $posicion=identificar_posicion_tabla($accion);
                $tabla=identificar_tabla($sentencia,$posicion);
                $data = $this->Auditoria_model->crear_auditoria_sentencia($tabla, $accion,$sentencia);
                $this->crear_registro_auditoria("auditoria", $data);
                
            }
        } catch (Exception $e) {
            
        }
        return $this->objMonitoreo;
    }

    function crear_registro_auditoria($entidad, $arrayData) {

        try {
            $this->objAuditoria->insert($entidad, $arrayData);
        } catch (Exception $e) {
            
        }
    }

}
