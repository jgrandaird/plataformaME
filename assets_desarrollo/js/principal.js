$(document).ready(function () {

    $("#menu_lateral_izq a").each(function (index, obj) {

        $(this).click(function (event) {
            event.preventDefault();
            $("#divcargando").show();
            $.ajax({
                dataType: 'html',
                url: $("#ruta_url").val() + $(this).attr("name"),
                type: 'POST',
                success: function (response) {
                    $("#divcargando").hide();
                    $("#contenido_principal").html(response);
                }
            });
            return false;
        });
    });

    $("#enlace_cerrar_sesion").click(function (event) {
        event.preventDefault();
        $("#divcargando").show();
        $.ajax({
            dataType: 'html',
            url: $("#ruta_url").val() + "Principal/cerrar_sesion",
            type: 'POST',
            success: function (response) {
                $("#divcargando").hide();
                location.href = $("#ruta_url").val() + "/Login";
            }
        });
        return false;
    });

    $("#enlace_perfil_usuario").click(function (event) {
        event.preventDefault();
        $("#divcargando").show();
        $.ajax({
            dataType: 'html',
            url: $("#ruta_url").val() + "Principal/modificar_perfil/" + $(this).attr("href"),
            type: 'POST',
            success: function (response) {
                $("#divcargando").hide();
                $("#contenido_principal").html(response);
            }
        });
        return false;
    });


    $("#enlace_cambiar_clave").click(function (event) {
        event.preventDefault();
        $("#divcargando").show();
        $.ajax({
            dataType: 'html',
            url: $("#ruta_url").val() + "Principal/index_cambiar_clave",
            type: 'POST',
            success: function (response) {
                $("#divcargando").hide();
                $("#contenido_principal").html(response);
            }
        });
        return false;
    });

    setInterval(function () {
        $.ajax({
            dataType: 'html',
            url: $("#ruta_url").val() + "Principal/verificar_session",
            type: 'POST',
            success: function (resultado_sesion) {
                if(!resultado_sesion){
                    location.href = $("#ruta_url").val() + "/Login";
                }
                
            }
            
        });
    }, 300000); //Cada 5 minutos //5000 5 seconds

});

