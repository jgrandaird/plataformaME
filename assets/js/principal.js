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
    
    
});

