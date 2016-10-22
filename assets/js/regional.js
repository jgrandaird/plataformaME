$(document).ready(function () {

    var confirmacion="";
       
    //Define la excepcion al momento de declinar por una acción
    var NoExcepcion_eliminar=true;
    
    //Define las excepciones en caso que en barra de acciones no se lleve una acción coherente
    var NoExcepcion_nuevo_atras=true;
    
    //Recorre los eventos de la barra de acciones y ejecuta la url parametrizada
    $("div.navbar-header a").each(function (index, obj) {
        $(this).click(function (event) {
            event.preventDefault();
                       
            //Si la acción implica seleccionar un registro
            if($(this).attr("id") !== "Atras_Lista" && $(this).attr("id") !== "Atras_Nuevo" && $(this).attr("id") !== "Nuevo_Lista"){
                
                //Valida si para llevar a cabo una acción ya se seleccionó un registro
                if(!$("input[name=radio_registro]:checked").val()){
                    
                    //Si no ha seleccionado el registro activa la excepcion
                    NoExcepcion_nuevo_atras=false;    
                }
            }
        
            //Si la acción implica confirmación, inicia proceso de confirmación
            if ($(this).attr("id") === "Eliminar_Lista" && NoExcepcion_nuevo_atras===true) {
                confirmacion=confirm("Confirma desea eliminar el registro?");
                
                //Valida confirmación de la excepción
                if(!confirmacion){
                    //Si no confirma el proceso activa la excepción
                    NoExcepcion_eliminar=false;
                    }
            }

            //Si las excepciones no están activa continúa con el proceso
            if(NoExcepcion_eliminar===true && NoExcepcion_nuevo_atras===true){
                var mimodulo = $('#mimodulo').val();
                var moduloantecesor = $('#moduloantecesor').val();
                var miparametro = $('#miparametro').val();

                if ($(this).attr("id") === "Atras_Lista") {
                    mimodulo = moduloantecesor;
                }
               
                $.ajax({
                    data: 'modulo=' + mimodulo + miparametro,
                    url: $(this).attr("href") + "/" + $("input[name=radio_registro]:checked").val(),
                    type: 'post',
                    dataType: 'html',
                    success: function (response) {
                        $("#contenido_principal").html(response);
                    }
                });
                
            }
            
            //Si las excepciones estuvieron activa procede a notificar al usuario de qué ocurrió mal o qué debe hacer
            else{
                //Si llevó acabo una acción sin seleccionar un registro
                if(NoExcepcion_nuevo_atras===false){
                    alert("Debe seleccionar un registro");
                    NoExcepcion_eliminar=true;
                    NoExcepcion_nuevo_atras=true;
                    return;
                }
                //Si declinó en la acción solicitada (eliminar registro)
                if(NoExcepcion_eliminar===false){
                    NoExcepcion_eliminar=true;
                    NoExcepcion_nuevo_atras=true;
                    return;
                }
                
            }
            

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