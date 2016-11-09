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

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("Crud_model");
    }

    
    //Obtiene todos los eventos programados
    Public function getEvents() {

        $sql = "SELECT * FROM events WHERE events.date BETWEEN ? AND ? AND idproyecto = ? AND idregional= ? ORDER BY events.date ASC";
        return $this->db->query($sql, array($_GET['start'], $_GET['end'], $_GET['idproyecto'], $_GET['idregional']))->result();
    }

    //Crea un nuevo evento
    Public function addEvent() {

        $sql = "INSERT INTO events (title,events.date, description, color,textcolor,realizacion,idproyecto,idregional,idpersona) VALUES (?,?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array($_POST['title'], $_POST['date'], $_POST['description'], $_POST['color'], $_POST['textColor'], $_POST['realizacion'], $_POST['idproyecto'], $_POST['idregional'], $_POST['idpersona']));

        //En caso que no inserte el evento
        if ($this->db->affected_rows() != 1) {
            return false;
        }
        //Si inserta el evento...
        else {

            //Envia el evento insertado(id) a la asociación entre evento y plan de implementacion (pi)
            $this->id = $this->db->insert_id();
            $this->adicionar_evento_pi($this->id, $_POST['cadenaPlan']);

            return true;
        }
    }
    
    //Actualiza evento
    Public function updateEvent() {

        $sql = "UPDATE events SET title = ?, events.date = ?, description = ?, color = ?,realizacion = ? WHERE id = ?";
        $this->db->query($sql, array($_POST['title'], $_POST['date'], $_POST['description'], $_POST['color'], $_POST['realizacion'], $_POST['id']));

        $this->Crud_model->eliminar_registro('evento_macroactividad', 'idevento', $_POST['id']);
        $this->adicionar_evento_pi($_POST['id'], $_POST['cadenaPlan']);
        

        if ($this->db->affected_rows() != 1) {
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
        $sql = "DELETE FROM events WHERE id = ?";
        $this->db->query($sql, array($_GET['id']));
        return ($this->db->affected_rows() != 1) ? false : true;
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
    Public function eliminar_evento_pi($idevento){
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
