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
            $.ajax({
                data: "modulo=Macroactividad" + miparametro + "&" + dataString,
                //data: dataString + '&modulo=Macroactividad',
                url: $("#ruta_url").val() + "Autocontrol/Calendar/cambiar_periodo/"+$('#idproyecto').val()+"/"+$(this).attr("href"),
                type: 'post',
                dataType: 'html',
                success: function (response) {
                    $("#contenido_principal").html(response);
                }
            });


        });
    });




});



