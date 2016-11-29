

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





