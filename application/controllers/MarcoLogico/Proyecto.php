<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Proyecto extends CI_CONTROLLER {

    public function __construct() {
        parent::__construct();
        $this->load->model("MarcoLogico/Proyecto_model");
        $this->load->library("Menu", array());
        $this->load->helper('Menu');
    }

    public function index() {

        
        $parametros = $this->uri->segment(4);
        $this->menu->setParametros($parametros);

        $menuProyecto = $this->cargar_opciones_proyecto();
        $data["Menu"] = construir_menu($menuProyecto, $this->menu);
        
        $this->Proyecto_model->obtener_proyectos();
        $data["objProyecto"] = $this->Proyecto_model;
        $this->load->view('MarcoLogico/Lista_Proyecto_view', $data);
        
        }

    public function nuevo_registro() {

        /*
        $menuProyecto = $this->cargar_opciones_proyecto();
        $data["Menu"] = construir_menu($menuProyecto, $this->menu);
        $idproyecto = $this->uri->segment(4);
        */
        
        $parametros = $this->uri->segment(4);
        $this->menu->setParametros($parametros);

        $menuProyecto = $this->cargar_opciones_proyecto();
        $data["Menu"] = construir_menu($menuProyecto, $this->menu);
        
        $data["objRegistro"] = $this->Proyecto_model;
        $this->load->view('MarcoLogico/Nuevo_Proyecto_view', $data);
        
    }

    public function editar_registro() {
        /*
        $parametros = $this->uri->segment(4);
        $this->menu->setParametros($parametros);

        $menuProyecto = $this->cargar_opciones_proyecto();
        $dataMenu["Menu"] = construir_menu($menuProyecto, $this->menu);*/

        $parametros = $this->uri->segment(4);
        $this->menu->setParametros($parametros);

        $menuProyecto = $this->cargar_opciones_proyecto();
        $data["Menu"] = construir_menu($menuProyecto, $this->menu);
        
        $idproyecto = $this->uri->segment(4);
        $this->Proyecto_model->obtener_proyecto($idproyecto);
        $data["objRegistro"] = $this->Proyecto_model;
        return $this->load->view('MarcoLogico/Nuevo_Proyecto_view', $data);
        
    }

    

    public function guardar_registro() {

        $idproyecto = $this->input->post('idproyecto');
        $data = array('nombre_proyecto' => $this->input->post('nombre_proyecto'),
            'codigo_proyecto' => $this->input->post('codigo_proyecto'),
            'descripcion_proyecto' => $this->input->post('descripcion_proyecto'),
            'fecha_inicial_proyecto' => $this->input->post('fecha_inicial_proyecto'),
            'fecha_final_proyecto' => $this->input->post('fecha_final_proyecto'),
            'numero_periodos_proyecto' => $this->input->post('numero_periodos_proyecto'));

        //Si existe el proyecto, procede a actualizar registros
        if ($idproyecto) {
            $resultadoOK = $this->Proyecto_model->editar_proyecto($idproyecto, $data);
            //Sin no existe el proyecto, procede a insertarlo
        } else {
            $resultadoOK = $this->Proyecto_model->crear_proyecto($data);
        }


        if ($resultadoOK) {
            
        } else {
            
        }
        $this->index();
    }

    
    public function eliminar_registro($idproyecto){
        $this->Proyecto_model->eliminar_proyecto($idproyecto);
        $this->index();
        }
    
    public function cargar_opciones_proyecto() {

        $opcionesProyecto = array();
        $opcionesProyecto[4]["Etiqueta"] = "Objetivos";
        $opcionesProyecto[4]["Funcion"] = base_url()."MarcoLogico/Proyecto/guardar_registro";
        $opcionesProyecto[4]["Imagen"] = "img/objetivos.png";

        return $opcionesProyecto;
    }
    
}
