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
            data: dataString + '&modulo=Macroactividad',
            url: $("#ruta_url").val() + "Planimplementacion/Planimplementacion_controller/guardar_registro",
            type: 'post',
            dataType: 'html',
            success: function (response) {
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
        $.ajax({
            data: "modulo=Macroactividad" + miparametro + "&" + dataString,
            //data: dataString + '&modulo=Macroactividad',
            url: $("#ruta_url").val() + "Planimplementacion/Planimplementacion_controller/adicionar_personal",
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#contenido_principal").html(response);
            }
        });
    });


    if ($("#idmacroactividad").val()) {
        $("#idobjetivo option[value=" + $("#auxIdObjetivo").val() + "]").prop("selected", true);
    }



});

function adicionar_mes_semana(inputcheck) {
    var dataString = $('#formid').serialize();
    $.ajax({
        data: dataString + '&modulo=Macroactividad',
        url: $("#ruta_url").val() + "Planimplementacion/Planimplementacion_controller/adicionar_mes_semana/" + $(inputcheck).attr("id"),
        type: 'post',
        dataType: 'html',
        success: function (response) {
            //$("#contenido_principal").html(response);
            //alert(response);
        }
    });
    /*
     $('#formid input[type=checkbox]').each(function(){
     if (this.checked) {
     alert('Segundo Hola'+$(this).attr("id"));
     //selected += $(this).val()+', ';
     }
     }); */

}