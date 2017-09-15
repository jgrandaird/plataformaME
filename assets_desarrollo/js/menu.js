$(document).ready(function () {

    $("#menu_proyecto").click(function () {

        $.ajax({
            url: $("#base_url").val()+$("#ruta_url").val()+'/editar_registro/' + $("input[name=radio_registro]:checked").val(),
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#content").html(response);
            }
        });
    });
});


