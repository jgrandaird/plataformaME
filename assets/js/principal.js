$(document).ready(function () {



    //var dataString = $('#formularioPrincipal').serialize();

    $("#enlace_proyecto").click(function (event) {
        event.preventDefault();
        $.ajax({
            dataType: 'html',
            url: $("#ruta_url").val() + 'MarcoLogico/MarcoLogico_controller',
            type: 'POST',
            success: function (response) {
                $("#contenido_principal").html(response);
            }
        });
        return false;
    });

    $("#enlace_regional").click(function (event) {
        event.preventDefault();
        $.ajax({
            dataType: 'html',
            url: $("#ruta_url").val() + 'MarcoLogico/Regional_controller',
            type: 'POST',
            success: function (response) {
                $("#contenido_principal").html(response);
            }
        });
        return false;
    });
    
    $("#enlace_personal").click(function (event) {
        event.preventDefault();
        $.ajax({
            dataType: 'html',
            url: $("#ruta_url").val() + 'Personal/Personal_controller',
            type: 'POST',
            success: function (response) {
                $("#contenido_principal").html(response);
            }
        });
        return false;
    });
    
    
    $("#enlace_planimplementacion").click(function (event) {
        event.preventDefault();
        $.ajax({
            dataType: 'html',
            url: $("#ruta_url").val() + 'PlanImplementacion/Planimplementacion_controller',
            type: 'POST',
            success: function (response) {
                $("#contenido_principal").html(response);
            }
        });
        return false;
    });

});


