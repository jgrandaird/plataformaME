<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CrudAuditoria_model extends CI_Model {

    public $objAuditoria;

    function __construct() {
        parent::__construct();

        $objAuditoria = & get_instance();
        $this->objAuditoria = $objAuditoria->load->database('auditoria');
    }

    function crear_registro_auditoria($entidad, $arrayData) {

        try {
            $this->objAuditoria->insert($entidad, $arrayData);
        } catch (Exception $e) {
            
        }
    }

}
