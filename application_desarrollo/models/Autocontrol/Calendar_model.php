<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {

    Public $id;
    Public $title;
    Public $description;
    Public $color;
    Public $textColor;
    Public $realizacion;
    Public $idproyecto;
    Public $idregional;
    Public $idpersona;
    Public $date;
    Public $observaciones;

    function __construct() {
        parent::__construct();
        //$this->load->database();
        $this->load->model("Crud_model");
    }

    //Obtiene todos los eventos programados
    Public function getEvents() {

        if (!$_GET['buscar_regional']) {
            $regionalFinal = $_GET['idregional'];
        } else {

            if ($_GET['idregional'] === $_GET['buscar_regional']) {
                $regionalFinal = $_GET['idregional'];
            } else {
                $regionalFinal = $_GET['buscar_regional'];
            }
        }

        //Si se personaliza la búsqueda por el funcionario en sesión
        // y por la regional 
        if ($_GET['buscar_persona']) {
            $sql = "SELECT * FROM events WHERE events.date BETWEEN ? AND ? AND idproyecto = ?" .( ($regionalFinal === "9999") ? " AND idregional< ?": " AND idregional= ?") ." AND idpersona=? ORDER BY events.date ASC";
            return $this->db->query($sql, array($_GET['start'], $_GET['end'], $_GET['idproyecto'], $regionalFinal, $_GET['buscar_persona']))->result();
        } else {
            $sql = "SELECT * FROM events WHERE events.date BETWEEN ? AND ? AND idproyecto = ?" .(($regionalFinal === "9999") ? " AND idregional< ?": " AND idregional= ?") ." ORDER BY events.date ASC";
            return $this->db->query($sql, array($_GET['start'], $_GET['end'], $_GET['idproyecto'], $regionalFinal))->result();
        }
    }

    //Crea un nuevo evento
    Public function addEvent($data) {

        
        $resultado=$this->Crud_model->crear_registro("events",$data);
        
        //En caso que no inserte el evento
        if ($resultado->affected_rows() != 1) {
            return false;
        }
        //Si inserta el evento...
        else {

            //Envia el evento insertado(id) a la asociación entre evento y plan de implementacion (pi)
            $this->id = $resultado->insert_id();
            $this->adicionar_evento_pi($this->id, $_POST['cadenaPlan']);

            return true;
        }
    }

    //Actualiza evento
    Public function updateEvent($entidad, $identificador, $id, $arrayData) {

        
        
        $resultado=$this->Crud_model->editar_registro($entidad, $identificador, $id, $arrayData);

        $this->Crud_model->eliminar_registro('evento_macroactividad', 'idevento', $_POST['id']);
        $this->adicionar_evento_pi($_POST['id'], $_POST['cadenaPlan']);


        if ($resultado->affected_rows() != 1) {
            return false;
        } else {
            return true;
        }
    }

    //Elimina evento
    Public function deleteEvent() {

        //Elimina los planes de implementacion asociados al evento
        $this->eliminar_evento_pi($_GET['id']);

        //Elimina los eventos
        //$sql = "DELETE FROM events WHERE id = ?";
        $this->Crud_model->eliminar_registro('events', 'id', $_GET['id']);
        //$this->db->query($sql, array($_GET['id']));
        return ($this->Crud_model->db->affected_rows() != 1) ? false : true;
    }

    //Asocia el evento con el plan de implementación
    Public function adicionar_evento_pi($idevento, $cadenaPlan) {

        if ($cadenaPlan) {
            $arrayCadena = explode(",", $cadenaPlan);
            //Recorre las actividades del plan implementacion chequeados
            for ($i = 0; $i < sizeof($arrayCadena); $i++) {
                $arrayData = array('idevento' => $idevento,
                    'idmacroactividad' => $arrayCadena[$i]);
                $this->Crud_model->crear_registro('evento_macroactividad', $arrayData);
            }
        }
    }

    //Elimina las actividades del pi asociadas al evento
    Public function eliminar_evento_pi($idevento) {
        $this->Crud_model->eliminar_registro('evento_macroactividad', 'idevento', $idevento);
    }

    /* Update  event */

    Public function dragUpdateEvent() {
        $date = date('Y-m-d h:i:s', strtotime($_POST['date']));

        $sql = "UPDATE events SET  events.date = ? WHERE id = ?";
        $this->db->query($sql, array($date, $_POST['id']));
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    //Obtiene las actividades del plan de implementacion asociadas al evento
    Public function obtener_eventos_plan($idevento) {

        $arrayEvento = $this->Crud_model->consultar_registro('evento_macroactividad', 'idevento', $idevento);
        $cadenaEventoPlan = "";
        $i = 0;
        $coma = "";

        //Recorre las actividades del pi asociadas al evento
        foreach ($arrayEvento->result() as $plan) {

            //Dispone a manera de cadena las actividades del pi
            $cadenaEventoPlan = $cadenaEventoPlan . $coma . $plan->idmacroactividad;
            $coma = ",";
            $i++;
        }


        return $cadenaEventoPlan;
    }

    //Obtiene informacion de un evento
    Public function obtener_evento($idevento) {

        $arrayEvento = $this->Crud_model->consultar_registro('Events', 'id', $idevento);

        $i = 0;
        foreach ($arrayEvento->result() as $evento) {

            $this->id = $evento->id;
            $this->title = $evento->title;
            $this->description = $evento->description;
            $this->color = $evento->color;
            $this->textColor = $evento->textColor;
            $this->idproyecto = $evento->idproyecto;
            $this->idregional = $evento->idregional;
            $this->idpersona = $evento->idpersona;
            $this->realizacion = $evento->realizacion;
            $this->observaciones = $evento->observaciones;


            $i++;
        }
    }

    //Actualiza estado (semaforo) de un evento
    Public function actualizar_estado_evento($idevento, $estado, $estadoLetra) {

        $sql = "UPDATE events SET color='$estado',textcolor='$estadoLetra' WHERE id='$idevento'";
        $this->db->query($sql);
    }

    //Captura el número de soportes asociados a un evento
    Public function obtener_numero_soportes_evento($idevento) {
        $sql = "SELECT idsoporte FROM soporte WHERE idevento='$idevento'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    
    

}
