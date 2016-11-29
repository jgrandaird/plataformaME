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
                $("#divcargando").show();
                $.ajax({
                    data: 'modulo=' + mimodulo + miparametro,
                    url: $(this).attr("href") + "/" + $("input[name=radio_registro]:checked").val(),
                    type: 'post',
                    dataType: 'html',
                    success: function (response) {
                        $("#divcargando").hide();
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
        $("#divcargando").show();
        $.ajax({
            data: dataString + '&modulo=Macroactividad',
            url: $("#ruta_url").val() + "Planimplementacion/Planimplementacion_controller/guardar_registro",
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#divcargando").hide();
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
        $("#divcargando").show();
        $.ajax({
            data: "modulo=Macroactividad" + miparametro + "&" + dataString,
            //data: dataString + '&modulo=Macroactividad',
            url: $("#ruta_url").val() + "Planimplementacion/Planimplementacion_controller/adicionar_personal",
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#divcargando").hide();
                $("#contenido_principal").html(response);
            }
        });
    });


    if ($("#idmacroactividad").val()) {
        $("#idobjetivo option[value=" + $("#auxIdObjetivo").val() + "]").prop("selected", true);
        $("#divcargando").show();
        $.ajax({
            data: 'modulo=Macroactividad&idobjetivo=' + $("#idobjetivo").val() + "&idlineaaccion=" + $("#auxIdLineaAccion").val(),
            url: $("#ruta_url").val() + "Planimplementacion/Planimplementacion_controller/cargar_lineasaccion",
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#divcargando").hide();
                $("#idlineaaccion").html(response);
            }
        });
        
    }

    $("#idobjetivo").change(function () {
        $("#divcargando").show();
        $.ajax({
            data: 'modulo=Macroactividad&idobjetivo=' + $(this).val(),
            url: $("#ruta_url").val() + "Planimplementacion/Planimplementacion_controller/cargar_lineasaccion",
            type: 'post',
            dataType: 'html',
            success: function (response) {
                $("#divcargando").hide();
                $("#idlineaaccion").html(response);
            }
        });
    });



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