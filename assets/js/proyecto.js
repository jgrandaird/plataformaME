

$(document).ready(function () {



    $('#datepicker1').datepicker({
        format: 'yyyy-mm-dd',
        pickTime: false,
        autoclose: true,
        language: 'es'
    });

    $('#datepicker2').datepicker({
        format: 'yyyy-mm-dd',
        pickTime: false,
        autoclose: true,
        language: 'es'
    });




//Recorre los eventos de la barra de acciones y ejecuta la url parametrizada
    $("div.navbar-header a").each(function (index, obj) {
        $(this).click(function (event) {

            var mimodulo = $('#mimodulo').val();
            var moduloantecesor=$('#moduloantecesor').val();
            var miparametro=$('#miparametro').val();

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

        /*    var ajax_data = {
         "idproyecto": blog.codigo_proyecto,
         "codigo_proyecto": blog.codigo_proyecto,
         "descripcion_proyecto": blog.descripcion_proyecto,
         "nombre_proyecto": blog.nombre_proyecto,
         "fecha_inicial_proyecto": blog.fecha_inicial_proyecto,
         "fecha_final_proyecto": blog.fecha_final_proyecto,
         "numero_periodos_proyecto": blog.numero_periodos_proyecto
         
         };*/

        event.preventDefault();
        var dataString = $('#formulario').serialize();

        $.ajax({
            data: dataString,
            url: $("#ruta_url").val() + "MarcoLogico/MarcoLogico_controller/guardar_registro",
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#contenido_principal").html(response);
            }
        });
    });

});





