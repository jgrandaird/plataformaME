<?php



//Para los casos de sentencias genéricas, captura el tipo SQL que se ejecutará
function identificar_accion($sentencia) {
    $accion = "";
    $sql = explode(" ", $sentencia);
    $sqlMayuscula = strtoupper($sql[0]);

    if ($sqlMayuscula === "INSERT") {
        $accion = "INSERT";
    } elseif ($sqlMayuscula === "UPDATE") {
        $accion = "UPDATE";
    } elseif ($sqlMayuscula === "DELETE") {
        $accion = "DELETE";
    }

    return $accion;
}

//Para los casos de sentencias genéricas, captura la posición de la tabla de acuerdo a la acción SQL
function identificar_posicion_tabla($accion) {

    $posicion = "";
    if ($accion === "INSERT") {
        $posicion = 2;
    }
    if ($accion === "UPDATE") {
        $posicion = 1;
    }
    if ($accion === "DELETE") {
        $posicion = 2;
    }
    return $posicion;
}

//Para los casos de sentencias genéricas, captura el nombre de la tabla afectada
function identificar_tabla($sentencia, $posicion) {
    $sqlMayuscula = strtoupper($sentencia);
    $cadenaSQL = explode(" ", $sqlMayuscula);
    return $cadenaSQL[$posicion];
}


/*
//Para la operación estandar, retorna el arreglo que insertará en la auditoria
function crear_auditoria($tabla, $accion, $arraySentencia) {
    $this->tabla_auditoria = $tabla;
    $this->accion_auditoria = $accion;
    $this->sentencia_auditoria = $this->crear_sentencia($arraySentencia);
    $data = $this->crear_array_valores();
    return $data;
}

//Para la operaciones genérocas, retorna el arreglo que insertará en la auditoria
function crear_auditoria_sentencia($tabla, $accion, $sentencia) {
    $this->tabla_auditoria = $tabla;
    $this->accion_auditoria = $accion;
    $this->sentencia_auditoria = $sentencia;
    $data = $this->crear_array_valores();
    return $data;
}

//Construye el arreglo que se insertará en la auditoria
function crear_array_valores() {

    $data = array('fecha_auditoria' => $this->fecha_auditoria,
        'usuario_auditoria' => $this->usuario_auditoria,
        'tabla_auditoria' => $this->tabla_auditoria,
        'accion_auditoria' => $this->accion_auditoria,
        'sentencia_auditoria' => $this->sentencia_auditoria
    );
    return $data;
}

//Apartir de un arreglo para las funciones estandar, construye la sentencia a insertar
function crear_sentencia($arraySentencia) {

    $campos = "";
    $valores = "";
    $coma = "";

    foreach ($arraySentencia as $llave => $valor) {
        $campos = $campos . $coma . "[" . $llave . "]";
        $valores = $valores . $coma . "[" . $valor . "]";
        $coma = ",";
    }
    $sentencia = "CAMPOS:$campos VALORES:$valores";
    return $sentencia;
}

*/
