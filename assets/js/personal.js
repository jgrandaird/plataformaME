$(document).ready(function () {

    $('#datepicker1').datepicker({
        format: 'yyyy-mm-dd',
        pickTime: false,
        autoclose: true,
        language: 'es'
    });

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
            data: dataString,
            url: $("#ruta_url").val() + "Personal/Personal_controller/guardar_registro",
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#contenido_principal").html(response);
            }
        });
    });


    if ($("#idpersona").val()) {
        $("#idregional option[value=" + $("#auxIdRegional").val() + "]").prop("selected", true);
    }
});





