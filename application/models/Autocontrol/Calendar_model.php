<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
    }

    /* Read the data from DB */

    Public function getEvents() {

        $sql = "SELECT * FROM events WHERE events.date BETWEEN ? AND ? AND idproyecto = ? AND idregional= ? ORDER BY events.date ASC";
        return $this->db->query($sql, array($_GET['start'], $_GET['end'],$_GET['idproyecto'],$_GET['idregional']))->result();
    }

    /* Create new events */

    Public function addEvent() {

        $sql = "INSERT INTO events (title,events.date, description, color,idproyecto,idregional,idpersona) VALUES (?,?,?,?,?,?,?)";
        $this->db->query($sql, array($_POST['title'], $_POST['date'], $_POST['description'], $_POST['color'],$_POST['idproyecto'],$_POST['idregional'],$_POST['idpersona']));
        //return ($this->db->affected_rows()!=1)?false:true;
        if ($this->db->affected_rows() != 1) {
            return false;
        } else {

            $idevento = $this->db->insert_id();

            if ($_POST['cadenaPlan']) {
                $arrayCadena = explode(",", $_POST['cadenaPlan']);
                for ($i = 0; $i < sizeof($arrayCadena); $i++) {
                    $arrayData = array('idevento' => $idevento,
                        'idmacroactividad' => $arrayCadena[$i]);
                    $this->Crud_model->crear_registro('evento_macroactividad', $arrayData);
                }
            }
            return true;
        }
    }

    /* Update  event */

    Public function updateEvent() {

        $sql = "UPDATE events SET title = ?, events.date = ?, description = ?, color = ? WHERE id = ?";
        $this->db->query($sql, array($_POST['title'], $_POST['date'], $_POST['description'], $_POST['color'], $_POST['id']));
        
        $this->Crud_model->eliminar_registro('evento_macroactividad', 'idevento',$_POST['id']);

            if ($_POST['cadenaPlan']) {
                $arrayCadena = explode(",", $_POST['cadenaPlan']);
                for ($i = 0; $i < sizeof($arrayCadena); $i++) {
                    $arrayData = array('idevento' => $_POST['id'],
                        'idmacroactividad' => $arrayCadena[$i]);
                    $this->Crud_model->crear_registro('evento_macroactividad', $arrayData);
                }
            }
        
        if ($this->db->affected_rows() != 1) {
            return false;
        } else {
            return true;
        }
    }

    /* Delete event */

    Public function deleteEvent() {

        
        $this->Crud_model->eliminar_registro('evento_macroactividad', 'idevento',$_GET['id']);
        $sql = "DELETE FROM events WHERE id = ?";
        $this->db->query($sql, array($_GET['id']));
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    /* Update  event */

    Public function dragUpdateEvent() {
        $date = date('Y-m-d h:i:s', strtotime($_POST['date']));

        $sql = "UPDATE events SET  events.date = ? WHERE id = ?";
        $this->db->query($sql, array($date, $_POST['id']));
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    

    Public function obtener_eventos_plan($idevento) {

        $arrayEvento = $this->Crud_model->consultar_registro('evento_macroactividad', 'idevento', $idevento);
        $cadenaEventoPlan = "";
        $i = 0;
        $coma = "";
        foreach ($arrayEvento->result() as $plan) {

            $cadenaEventoPlan = $cadenaEventoPlan . $coma . $plan->idmacroactividad;
            $coma = ",";
            $i++;
        }


        return $cadenaEventoPlan;
    }

}
