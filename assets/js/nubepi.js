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


    $("ul.dropdown-menu a").each(function () {
        $(this).click(function (event) {



            event.preventDefault();
            var mimodulo = $('#mimodulo').val();
            var moduloantecesor = $('#moduloantecesor').val();
            var miparametro = $('#miparametro').val();

            if ($(this).attr("id") == "Atras_Lista") {
                mimodulo = moduloantecesor;
            }
            var dataString = $('#formid').serialize();
            $("#divcargando").show();
            $.ajax({
                data: "modulo=NubePI" + miparametro + "&" + dataString,
                //data: dataString + '&modulo=Macroactividad',
                url: $("#ruta_url").val() + $("#rutaModulo").val() + "cambiar_periodo/" + $('#idproyecto').val() + "/" + $(this).attr("href") + "/null",
                type: 'post',
                dataType: 'html',
                success: function (response) {
                    $("#divcargando").hide();
                    $("#contenido_principal").html(response);
                }
            });


        });
    });

    $("#tabla_regional a").each(function (index, obj) {
        $(this).click(function (event) {

            event.preventDefault();
            var indiceA = $(this).attr("href");
            var nombrePlaneado = "regional_planeado_" + indiceA;
            var nombreEjecutado = "regional_ejecutado_" + indiceA;

            if (nombrePlaneado === $(this).attr("id")) {

                $.ajax({
                    data: 'modulo=1',
                    url: $("#ruta_url").val() + $("#rutaModulo").val() + "esfuerzo_pi_planeado/" + $('#idproyecto').val() + "/" + $('#idperiodo').val() + "/" + $(this).attr("href"),
                    type: 'post',
                    dataType: 'html',
                    success: function (response) {
                        $("#my_favorite_latin_words_planeado_" + indiceA).html("");
                        var word_list = JSON.parse(response);
                        document.getElementById("my_favorite_latin_words_planeado_" + indiceA).style.display='';
                        $("#my_favorite_latin_words_planeado_" + indiceA).jQCloud(word_list);
                    }
                });
            }

            if (nombreEjecutado === $(this).attr("id")) {

                $.ajax({
                    data: 'modulo=1',
                    url: $("#ruta_url").val() + $("#rutaModulo").val() + "esfuerzo_pi_ejecutado/" + $('#idproyecto').val() + "/" + $('#idperiodo').val() + "/" + $(this).attr("href"),
                    type: 'post',
                    dataType: 'html',
                    success: function (response) {
                        $("#my_favorite_latin_words_ejecutado_" + indiceA).html("");
                        var word_list = JSON.parse(response);
                        document.getElementById("my_favorite_latin_words_ejecutado_" + indiceA).style.display='';
                        $("#my_favorite_latin_words_ejecutado_" + indiceA).jQCloud(word_list);
                    }
                });
            }



        });
    });
});


