$(document).ready(function () {

//Recorre los eventos de la barra de acciones y ejecuta la url parametrizada
    $("div.navbar-header a").each(function (index, obj) {
        $(this).click(function (event) {

            var mimodulo = $('#mimodulo').val();
            var moduloantecesor = $('#moduloantecesor').val();
            var miparametro = $('#miparametro').val();

            if ($(this).attr("id") == "Atras_Lista") {
                mimodulo = moduloantecesor;
            }

            event.preventDefault();
            $.ajax({
                data: 'modulo=' + mimodulo + miparametro,
                url: $(this).attr("href") + "/" + $("input[name=radio_registro]:checked").val(),
                type: 'post',
                dataType: 'html',
                success: function (response) {
                    $("#contenido_principal").html(response);
                }
            });
        });

    });

    $("#btn_guardar").click(function (event) {



        event.preventDefault();
        var dataString = $('#formulario').serialize();

        $.ajax({
            data: dataString + '&modulo=Regional',
            url: $("#ruta_url").val() + "MarcoLogico/Regional_controller/guardar_registro",
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#contenido_principal").html(response);
            }
        });
    });

    $("#idpais").change(function () {
        $.ajax({
            data: 'modulo=Regional&idpais=' + $(this).val(),
            url: $("#ruta_url").val() + "MarcoLogico/Regional_controller/cargar_deptos",
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#iddepto").html(response);
            }
        });
    });

    $("#iddepto").change(function () {
        $.ajax({
            data: 'modulo=Regional&iddepto=' + $(this).val(),
            url: $("#ruta_url").val() + "MarcoLogico/Regional_controller/cargar_municipios",
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#idmunicipio").html(response);
            }
        });
    });

    if ($("#idregional").val()) {


        $("#idpais option[value=" + $("#auxIdPais").val() + "]").prop("selected", true);

        $.ajax({
            data: 'modulo=Regional&idpais=' + $("#idpais").val() + "&iddepto=" + $("#auxIdDepto").val(),
            url: $("#ruta_url").val() + "MarcoLogico/Regional_controller/cargar_deptos",
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#iddepto").html(response);
            }
        });


        $.ajax({
            data: 'modulo=Regional&iddepto=' + $("#auxIdDepto").val() + "&idmunicipio=" + $("#auxIdMunicipio").val(),
            url: $("#ruta_url").val() + "MarcoLogico/Regional_controller/cargar_municipios",
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#idmunicipio").html(response);
            }
        });


    }


});