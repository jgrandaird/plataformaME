$(document).ready(function () {

    $("#menu_lateral_izq a").each(function (index, obj) {

        $(this).click(function (event) {
            event.preventDefault();
            $.ajax({
                dataType: 'html',
                url: $("#ruta_url").val() + $(this).attr("name"),
                type: 'POST',
                success: function (response) {
                    $("#contenido_principal").html(response);
                }
            });
            return false;
        });
    });

    $("#enlace_cerrar_sesion").click(function (event) {
        event.preventDefault();
        $.ajax({
            dataType: 'html',
            url: $("#ruta_url").val() + "Principal/cerrar_sesion",
            type: 'POST',
            success: function (response) {
                location.href = $("#ruta_url").val() + "/Login";
            }
        });
        return false;
    });
    
    $("#enlace_perfil_usuario").click(function (event) {
        event.preventDefault();
        $.ajax({
            dataType: 'html',
            url: $("#ruta_url").val() + "Principal/modificar_perfil/"+$(this).attr("href"),
            type: 'POST',
            success: function (response) {
                $("#contenido_principal").html(response);
            }
        });
        return false;
    });




});

