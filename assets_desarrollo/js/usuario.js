$(document).ready(function () {

    var confirmacion = "";

    //Define la excepcion al momento de declinar por una acción
    var NoExcepcion_eliminar = true;

    //Define las excepciones en caso que en barra de acciones no se lleve una acción coherente
    var NoExcepcion_nuevo_atras = true;

    //Recorre los eventos de la barra de acciones y ejecuta la url parametrizada
    $("div.navbar-header a").each(function (index, obj) {
        $(this).click(function (event) {
            event.preventDefault();

            //Si la acción implica seleccionar un registro
            if ($(this).attr("id") !== "Atras_Lista" && $(this).attr("id") !== "Atras_Nuevo" && $(this).attr("id") !== "Nuevo_Lista") {

                //Valida si para llevar a cabo una acción ya se seleccionó un registro
                if (!$("input[name=radio_registro]:checked").val()) {

                    //Si no ha seleccionado el registro activa la excepcion
                    NoExcepcion_nuevo_atras = false;
                }
            }

            //Si la acción implica confirmación, inicia proceso de confirmación
            if ($(this).attr("id") === "Eliminar_Lista" && NoExcepcion_nuevo_atras === true) {
                confirmacion = confirm("Confirma desea eliminar el registro?");

                //Valida confirmación de la excepción
                if (!confirmacion) {
                    //Si no confirma el proceso activa la excepción
                    NoExcepcion_eliminar = false;
                }
            }

            //Si las excepciones no están activa continúa con el proceso
            if (NoExcepcion_eliminar === true && NoExcepcion_nuevo_atras === true) {
                var mimodulo = $('#mimodulo').val();
                var moduloantecesor = $('#moduloantecesor').val();
                var miparametro = $('#miparametro').val();

                if ($(this).attr("id") === "Atras_Lista") {
                    mimodulo = moduloantecesor;
                }
                $("#divcargando").show();
                $.ajax({
                    data: 'modulo=' + mimodulo + miparametro,
                    url: $(this).attr("href") + "/" + $("input[name=radio_registro]:checked").val(),
                    type: 'post',
                    dataType: 'html',
                    success: function (response) {
                        $("#divcargando").hide();
                        $("#contenido_principal").html(response);
                    }
                });

            }

            //Si las excepciones estuvieron activa procede a notificar al usuario de qué ocurrió mal o qué debe hacer
            else {
                //Si llevó acabo una acción sin seleccionar un registro
                if (NoExcepcion_nuevo_atras === false) {
                    alert("Debe seleccionar un registro");
                    NoExcepcion_eliminar = true;
                    NoExcepcion_nuevo_atras = true;
                    return;
                }
                //Si declinó en la acción solicitada (eliminar registro)
                if (NoExcepcion_eliminar === false) {
                    NoExcepcion_eliminar = true;
                    NoExcepcion_nuevo_atras = true;
                    return;
                }

            }


        });

    });

    $("#btn_guardar").click(function (event) {

        event.preventDefault();
        var dataString = $('#formulario').serialize();
        $("#divcargando").show();
        $.ajax({
            data: dataString + '&modulo=Usuario',
            url: $("#ruta_url").val() + "Seguridad/Usuario_controller/guardar_registro",
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#divcargando").hide();
                $("#contenido_principal").html(response);
            }
        });
    });

    $("#btn_adicionar").click(function (event) {
        event.preventDefault();
        var mimodulo = $('#mimodulo').val();
        var moduloantecesor = $('#moduloantecesor').val();
        var miparametro = $('#miparametro').val();

        if ($(this).attr("id") == "Atras_Lista") {
            mimodulo = moduloantecesor;
        }
        var dataString = $('#formulario').serialize();
        $("#divcargando").show();
        $.ajax({
            data: "modulo=Usuario" + miparametro + "&" + dataString,
            //data: dataString + '&modulo=Macroactividad',
            url: $("#ruta_url").val() + "Seguridad/Usuario_controller/adicionar_perfil_usuario",
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#divcargando").hide();
                $("#contenido_principal").html(response);
            }
        });
    });

    $("#btn_cambio_clave").click(function (event) {

        if(!$("#clave_actual").val()){
            alert("El campo contraseña actual está vacío");
            return false;
        }
        
        if(!$("#nueva_clave").val()){
            alert("El campo nueva contraseña está vacío");
            return false;
        }
        
        if(!$("#confirmacion_clave").val()){
            alert("El campo confirmación contraseña está vacío");
            return false;
        }

        if($("#nueva_clave").val()!==$("#confirmacion_clave").val()){
            alert("La confirmación de la nueva contraseña no coincide");
            return false;
        }
        
        if($("#nueva_clave").val()===$("#clave_actual").val()){
            alert("La nueva contraseña debe ser diferente a la actual");
            return false;
        }

        event.preventDefault();
        var dataString = $('#formulario').serialize();
        $("#divcargando").show();
        $.ajax({
            data: dataString + '&modulo=Usuario',
            url: $("#ruta_url").val() + "Seguridad/Usuario_controller/cambiar_clave",
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#divcargando").hide();
                $("#contenido_principal").html(response);
            }
        });
    });



    if ($("#auxNombre_usuario").val()) {
        $("#idpersona option[value=" + $("#auxIdPersona").val() + "]").prop("selected", true);
    }


});

