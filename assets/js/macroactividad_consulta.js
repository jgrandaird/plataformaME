$(document).ready(function () {

    var confirmacion = "";

    //Define la excepcion al momento de declinar por una acción
    var NoExcepcion_eliminar = true;

    //Define las excepciones en caso que en barra de acciones no se lleve una acción coherente
    var NoExcepcion_nuevo_atras = true;

    //Recorre los eventos de la barra de acciones y ejecuta la url parametrizada
    $("div.navbar-header a").each(function (index, obj) {
        $(this).click(function (event) {
            event.preventDefault();

            //Si la acción implica seleccionar un registro
            if ($(this).attr("id") !== "Atras_Lista" && $(this).attr("id") !== "Atras_Nuevo" && $(this).attr("id") !== "Nuevo_Lista" && $(this).attr("id") !== "Buscador_Lista") {

                //Valida si para llevar a cabo una acción ya se seleccionó un registro
                if (!$("input[name=radio_registro]:checked").val()) {

                    //Si no ha seleccionado el registro activa la excepcion
                    NoExcepcion_nuevo_atras = false;
                }
            }

            //Si la acción implica confirmación, inicia proceso de confirmación
            if ($(this).attr("id") === "Eliminar_Lista" && NoExcepcion_nuevo_atras === true) {
                confirmacion = confirm("Confirma desea eliminar el registro?");

                //Valida confirmación de la excepción
                if (!confirmacion) {
                    //Si no confirma el proceso activa la excepción
                    NoExcepcion_eliminar = false;
                }
            }

            //Si las excepciones no están activa continúa con el proceso
            if (NoExcepcion_eliminar === true && NoExcepcion_nuevo_atras === true) {
                var mimodulo = $('#mimodulo').val();
                var moduloantecesor = $('#moduloantecesor').val();
                var miparametro = $('#miparametro').val();

                if ($(this).attr("id") === "Atras_Lista") {
                    mimodulo = moduloantecesor;
                }
                if ($(this).attr("id") === "Buscador_Lista") {
					$('#myModalBusqueda').modal('show');
				}
				else{
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
            }

            //Si las excepciones estuvieron activa procede a notificar al usuario de qué ocurrió mal o qué debe hacer
            else {
                //Si llevó acabo una acción sin seleccionar un registro
                if (NoExcepcion_nuevo_atras === false) {
                    alert("Debe seleccionar un registro");
                    NoExcepcion_eliminar = true;
                    NoExcepcion_nuevo_atras = true;
                    return;
                }
                //Si declinó en la acción solicitada (eliminar registro)
                if (NoExcepcion_eliminar === false) {
                    NoExcepcion_eliminar = true;
                    NoExcepcion_nuevo_atras = true;
                    return;
                }

            }


        });

    });


    $("ul.dropdown-menu a").each(function () {
        $(this).click(function (event) {

            if ($(this).attr("id") !== "bajarsoporte") {

                event.preventDefault();
                var mimodulo = $('#mimodulo').val();
                var moduloantecesor = $('#moduloantecesor').val();
                var miparametro = $('#miparametro').val();

                if ($(this).attr("id") == "Atras_Lista") {
                    mimodulo = moduloantecesor;
                }
                var dataString = $('#formid').serialize();
                $("#divcargando").show();
                $.ajax({
                    data: "buscar=activo&buscar_regional=" + $('#buscar_regional').val()+"&modulo=Macroactividad" + miparametro + "&" + dataString,
                    //data: dataString + '&modulo=Macroactividad',
                    url: $("#ruta_url").val() + $("#rutaModulo").val() + "cambiar_periodo/" + $('#idproyecto').val() + "/" + $(this).attr("href"),
                    type: 'post',
                    dataType: 'html',
                    success: function (response) {
                        $("#divcargando").hide();
                        $("#contenido_principal").html(response);
                    }
                });
            }

        });
    });

$("#tablapi a:not(a.soporte)").each(function (index, obj) {
        
        $(this).click(function (event) {
            event.preventDefault();
            
            var ventanaModal=$(this).attr("href");
            //document.getElementById(ventanaModal).style.display='';
            $("#myModal_"+ventanaModal).modal('show');
            //$("#divcargando").show();
            
        });
    });


	//Cuando se personaliza la búsqueda
    $("#buscar_pi").click(function (event) {
        var mimodulo = $('#mimodulo').val();
        var miparametro = $('#miparametro').val();

        if (!$("#visualizacion_regional").val()) {
            alert("El campo regional se encuentra vacío");
            return false;
        }
		
		if (!$("#visualizacion_periodo").val()) {
            alert("El campo periodo se encuentra vacío");
            return false;
        }
    

        $("#divcargando").show();
		var dataString = $('#formid').serialize();
		
        $.ajax({
			
            //data: "buscar=activo&buscar_regional=" + $('#buscar_regional').val() + "&idperiodo=" + $('#idperiodo').val()+"&modulo=" + mimodulo + miparametro,
            //url: $("#ruta_url").val() + 'Autocontrol/Plan_Implementacion_controller/index_macroactividad/' + $("#idproyecto").val(),
			
			data: "buscar=activo&buscar_regional=" + $('#buscar_regional').val()+"&modulo=Macroactividad" + miparametro + "&" + dataString,
            url: $("#ruta_url").val() + $("#rutaModulo").val() + "cambiar_periodo/" + $('#idproyecto').val() + "/" + $('#idperiodo').val(),
			
            type: 'post',
            dataType: 'html',
            success: function (response) {
				
                $("#divcargando").hide();
                $("#contenido_principal").html(response);
                $(".modal-backdrop").remove();
				$('body').css("overflow-y", "scroll");
				$("#visualizacion_regional").val($('#buscar_regional').val());

				
				
//https://www.youtube.com/watch?v=9MFTdIur--k



            }
        });
    });
	
	$("#visualizacion_regional").change(function () {
        var valorRegional = $(this).val();
        $("#buscar_regional").val(valorRegional);
    });
	
	$("#visualizacion_periodo").change(function () {
        var valorPeriodo = $(this).val();
        $("#idperiodo").val(valorPeriodo);
    });
	
	
});



