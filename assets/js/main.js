$(function () {

    //Recorre los eventos de la barra de acciones y ejecuta la url parametrizada
    $("div.navbar-header a").each(function (index, obj) {
        $(this).click(function (event) {

            var mimodulo = $('#mimodulo').val();
            var moduloantecesor = $('#moduloantecesor').val();
            var miparametro = $('#miparametro').val();

            if ($(this).attr("id") === "Atras_Lista") {
                mimodulo = moduloantecesor;
            }
            event.preventDefault();
            if ($(this).attr("id") === "Buscador_Lista") {
                $('#myModal').modal('show');
            } else {


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
        });

    });

    //Cuando se personaliza la búsqueda
    $("#buscar_calendario").click(function (event) {
        var mimodulo = $('#mimodulo').val();
        var miparametro = $('#miparametro').val();
        
        if(!$("#visualizacion_regional").val()){
            alert("El campo regional se encuentra vacío");
            return false;
        }
        
        if(!$("#visualizacion_persona").val()){
            alert("El campo tipo de visualización se encuentra vacío");
            return false;
        }
        
        $("#divcargando").show();
        $.ajax({
            data: "buscar=activo&buscar_regional=" + $('#buscar_regional').val() + "&buscar_persona=" + $('#buscar_persona').val() + "&modulo=" + mimodulo + miparametro,
            url: $("#ruta_url").val() + 'Autocontrol/calendar/index_calendario/' + $("#idproyecto").val(),
            type: 'post',
            dataType: 'html',
            success: function (response) {
                
                $("#divcargando").hide();
                $("#contenido_principal").html(response);
                $(".modal-backdrop").remove();
                
                
                
                
            }
        });
    });


    $("#visualizacion_regional").change(function () {
        var valorRegional = $(this).val();
        $("#buscar_regional").val(valorRegional);
    });

    $("#visualizacion_persona").change(function () {
        var valorPersona = $(this).val();
        $("#buscar_persona").val(valorPersona);
    });



//<editor-fold defaultstate="collapsed" desc="Fecha de hoy para personalizar el color de la celda del calendario"> 

    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth() + 1; //hoy es 0!
    var yyyy = hoy.getFullYear();

    if (dd < 10) {
        dd = '0' + dd
    }

    if (mm < 10) {
        mm = '0' + mm
    }

    hoy = yyyy + '-' + mm + '-' + dd;

//</editor-fold>


    var currentDate; // Holds the day clicked when adding a new event
    var currentEvent; // Holds the event object when editing an event

    // Here i define the base_url
    var base_url = $("#ruta_url").val(); // Here i define the base_url

    // Fullcalendar
    $('#calendar').fullCalendar({
        dayRender: function (date, cell) {
            if (date.isSame(hoy)) {
                cell.css("background-color", "#D3CFBC");// #E8E1E1
            }
        },
        timeFormat: 'H(:mm)',
        header: {
            left: 'prev, next, today',
            center: 'title',
            right: 'month, basicWeek, basicDay'
        },
        // Get all events stored in database
        lang: 'es',
        eventLimit: true, // allow "more" link when too many events
        events: base_url + 'Autocontrol/calendar/getEvents?idproyecto=' + $('#idproyecto').val() + '&idregional=' + $('#idregional').val() + '&idpersona=' + $('#idpersona').val() + "&buscar_regional=" + $('#buscar_regional').val() + "&buscar_persona=" + $('#buscar_persona').val(),
        // Handle Day Click
        dayClick: function (date, event, view) {
            currentDate = date.format();
            $("#subir_soporte").attr('disabled');
            $("#archivo").attr('disabled');
            // Open modal to add event
            modal({
                // Available buttons when adding
                buttons: {
                    add: {
                        id: 'add-event', // Buttons id
                        css: 'btn-primary', // Buttons class
                        label: 'Programar' // Buttons label
                    }
                },
                title: 'Adicionar evento (' + date.format() + ')' // Modal title
            });
        },
        editable: true, // Make the event draggable true 
        eventDrop: function (event, delta, revertFunc) {


            $.post(base_url + 'Autocontrol/calendar/dragUpdateEvent', {
                id: event.id,
                date: event.start.format()
            }, function (result) {
                if (result)
                {
                    alert('Evento movido correctamente');
                } else
                {
                    alert('Intente nuevamente!');
                }

            });
        },
        // Event Mouseover
        eventMouseover: function (calEvent, jsEvent, view) {

            var tooltip = '<div class="event-tooltip"><table ><tr><td rowspan=2 valign="top" ><img src="'+calEvent.foto_persona+'" width="46px" height="60px"/ ></td><td style="border-bottom:thin solid #ffffff">Autor: '+calEvent.nombres_persona+'</td></tr><tr><td>' + calEvent.description + '</td></tr></table></div>';
            $("body").append(tooltip);

            $(this).mouseover(function (e) {
                $(this).css('z-index', 10000);
                $('.event-tooltip').fadeIn('500');
                $('.event-tooltip').fadeTo('10', 1.9);
            }).mousemove(function (e) {
                $('.event-tooltip').css('top', e.pageY + 10);
                $('.event-tooltip').css('left', e.pageX + 20);
            });
        },
        eventMouseout: function (calEvent, jsEvent) {
            $(this).css('z-index', 8);
            $('.event-tooltip').remove();
        },
        // Handle Existing Event Click
        eventClick: function (calEvent, jsEvent, view) {

            // Set currentEvent variable according to the event clicked in the calendar
            currentEvent = calEvent;

            // Open modal to edit or delete event
            modal({
                // Available buttons when editing
                buttons: {
                    delete: {
                        id: 'delete-event',
                        css: 'btn-danger',
                        label: 'Eliminar'
                    },
                    update: {
                        id: 'update-event',
                        css: 'btn-primary',
                        label: 'Actualizar'
                    }
                },
                title: 'Actualizar Evento "' + calEvent.title + '"',
                event: calEvent
            });
        },
        eventRender: function(event, element) {
            
            var regional = '<span class="fc-description">'+event.abreviatura_regional+' </span>'                   
            $(".fc-content", element).prepend(regional)
            
        }

    });

    // Prepares the modal window according to data passed
    function modal(data) {
        // ocultar los elementos que no pertencen al PI del evento seleccionado      
        $("div.list-group-item[idregional]") .filter(function () { return $( this ).attr( "idregional" ) != data.event.idregional  }).hide();
        
        recorrer_plan_implementacion("reestablecer");
        $("#cadenaPlan").val("");

        // Set modal title
        $('#myModal4 .modal-title').html(data.title);
        // Clear buttons except Cancel
        $('#myModal4 .modal-footer button:not(".btn-default")').remove();
        // Set input values
        $('#title').val(data.event ? data.event.title : '');

        //Si el evento no existe
        if (!data.event) {
            // When adding set timepicker to current time
            var now = new Date();
            var time = now.getHours() + ':' + (now.getMinutes() < 10 ? '0' + now.getMinutes() : now.getMinutes());
            $("#realizacion").val("Programada");
            $('#idpersona').val("");
            $("#archivo").val("");
            $("#subir_soporte").attr('disabled', true);
            $("#archivo").attr('disabled', true);
            $("#panel_visualizar_soportes").hide();
        }
        //Si el evento existe
        else {
            // When editing set timepicker to event's time
            var time = data.event.date.split(' ')[1].slice(0, -3);
            time = time.charAt(0) === '0' ? time.slice(1) : time;
            $('#realizacion').val(data.event.realizacion ? data.event.realizacion : 'Programada');
            
            $("#archivo").attr('disabled', false);
            $("#panel_visualizar_soportes").show();
            $('#idpersona').val(data.event ? data.event.idpersona : '');
            
            //Si el usuario en sesion no es dueño de la actividad. El botón de subir soportes queda inactivo
            if ($('#idpersona').val() !== $('#idpersona_propietaria').val() && $('#perfil_monitoreo').val()!=="1") {
                $("#subir_soporte").attr('disabled', true);
            }
            //Si el usuario en sesión es dueño de la actividad, el botón de subir soportes se activa
            else{
                $("#subir_soporte").attr('disabled', false);
            }
            
        }
        $('#time').val(time);
        $('#description').val(data.event ? data.event.description : '');
        $('#color').val(data.event ? data.event.color : '#D9EDF7');//#3a87ad
        $('#textColor').val(data.event ? data.event.color : '#286090');//#7DC4F7

        if (data.event) {
            $.post(base_url + 'Autocontrol/calendar/obtener_eventos_plan/' + data.event.id, {
            }, function (result) {
                $("#cadenaPlan").val(result);
                recorrer_plan_implementacion("consultar");
            });

        } else {

        }


        // Create Butttons
        $.each(data.buttons, function (index, button) {
            var activacion_boton = "";
            if ($('#idpersona').val() !== $('#idpersona_propietaria').val() && button.label !== "Programar" && $('#perfil_monitoreo').val()!=="1") {
                activacion_boton = "disabled";
            }

            $('#myModal4 .modal-footer').prepend('<button type="button" id="' + button.id + '" class="btn ' + button.css + '" ' + activacion_boton + '>' + button.label + '</button>')



        })
        //Show Modal
        $('#myModal4').modal('show');//modal modificado
    }

    // Handle Click on Add Button
    $('#myModal4').on('click', '#add-event', function (e) {
        recorrer_plan_implementacion("enviar");
        if (validar_formulario()) {
            $.post(base_url + 'Autocontrol/calendar/addEvent', {
                title: $('#title').val(),
                description: $('#description').val(),
                color: $('#color').val(),
                textColor: $('#textColor').val(),
                date: currentDate + ' ' + getTime(),
                cadenaPlan: $('#cadenaPlan').val(),
                idpersona: $('#idpersona_propietaria').val(),
                idregional: $('#idregional').val(),
                idproyecto: $('#idproyecto').val(),
                realizacion: $('#realizacion').val()
            }, function (result) {
                $('#myModal4').modal('hide');
                $('#calendar').fullCalendar("refetchEvents");
            });
        }
    });


    // Handle click on Update Button
    $('#myModal4').on('click', '#update-event', function (e) {
        recorrer_plan_implementacion("enviar");
        if (validar_formulario()) {

            $.post(base_url + 'Autocontrol/calendar/updateEvent', {
                id: currentEvent._id,
                title: $('#title').val(),
                description: $('#description').val(),
                color: $('#color').val(),
                textColor: $('#textColor').val(),
                date: currentEvent.date.split(' ')[0] + ' ' + getTime(),
                cadenaPlan: $('#cadenaPlan').val(),
                idpersona: $('#idpersona').val(),
                idregional: $('#idregional').val(),
                idproyecto: $('#idproyecto').val(),
                realizacion: $('#realizacion').val()
            }, function (result) {
                $('#myModal4').modal('hide');
                $('#calendar').fullCalendar("refetchEvents");
            });
        }
    });



    // Handle Click on Delete Button
    $('#myModal4').on('click', '#delete-event', function (e) {
        $.get(base_url + 'Autocontrol/calendar/deleteEvent?id=' + currentEvent._id, function (result) {
            $('#myModal4').modal('hide');
            $('#calendar').fullCalendar("refetchEvents");
        });
    });


// Handle click on Update Button
    $('#myModal4 #formuploadajax').on('click', '#subir_soporte', function (e) {

        e.preventDefault();
        $("#idevento_soporte").val(currentEvent._id);
        //e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formuploadajax"));
        formData.append("dato", "valor");
        //formData.append(f.attr("name"), $(this)[0].files[0]);
        $("#divcargandomodal").show();
        $.ajax({
            url: base_url + 'Autocontrol/calendar/crear_soportes',
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
            })
                .done(function (result) {
                    $("#divcargandomodal").hide();
                    $('#divsoportes').html(result);
                })
                        .fail(function (request, status, error) {
                    $("#divcargandomodal").hide();
                        //alert(request.responseText);
                        alert("Error al tratar de subir el archivo");
                    });


    });



    $("#visualizar_soportes").click(function (e) {

        e.preventDefault();
        $("#idevento_soporte").val(currentEvent._id);
        $("#divcargandomodal").show();
        $.ajax({
            url: base_url + 'Autocontrol/calendar/visualizar_soportes/' + currentEvent._id,
            type: "post",
            dataType: "html",
            cache: false,
            contentType: false,
            processData: false
        })
                .done(function (result) {
                    $("#divcargandomodal").hide();
                    $('#divsoportes').html(result);
                });

    });


    // Get Formated Time From Timepicker
    function getTime() {
        var time = $('#time').val();
        return (time.indexOf(':') == 1 ? '0' + time : time) + ':00';
    }

    // Dead Basic Validation For Inputs
    function validar_formulario() {


        if ($.trim($('#title').val()) === '') {
            alert("El campo nombre de actividad se encuentra vacío");
            return false;
        }

        if ($.trim($('#time').val()) === '') {
            alert("El campo hora se encuentra vacío");
            return false;
        }

        if ($.trim($('#cadenaPlan').val()) === '') {

            var confirmar = confirm("Aún no ha relacionado alguna actividad del plan de implementación. Desea crear el evento aún sin relacionarlo con el plan de implementación?");
            if (confirmar) {
                return true;
            } else {
                return false;
            }
        }

        return true;
    }



    function recorrer_plan_implementacion(accion) {

        var cadenaPlan = "";
        var coma = "";

        var cadena = $("#cadenaPlan").val();
        document.getElementById('divsoportes').innerHTML = "";


        var cadenaP = cadena.split(',');

        $('#accordion input[type=checkbox]').each(function () {
            if (accion === 'enviar') {
                if (this.checked) {
                    cadenaPlan = cadenaPlan + coma + $(this).val();
                    coma = ",";
                }
            }
            if (accion === 'consultar') {
                for (var i = 0; i < cadenaP.length; i++) {

                    if (cadenaP[i] === $(this).val()) {
                        $(this).prop('checked', true);

                    }
                }
            }
            if (accion === 'reestablecer') {
                $(this).prop('checked', false);
            }
        });
        if (accion === 'enviar') {
            $("#cadenaPlan").val(cadenaPlan);
        }
    }


    $("ul.dropdown-menu a").each(function () {
        $(this).click(function (event) {
            event.preventDefault();
            document.getElementById("plan_implementacion_" + $(this).attr("href")).style.display = '';
            nombre_periodo = document.getElementById("nombre_periodo_" + $(this).attr("href")).value;
            esconder_planimplementacion($(this).attr("href"));
            document.getElementById("nombre_pi").innerHTML = 'Plan de implementacion ' + nombre_periodo;


        });
    });

    function esconder_planimplementacion(divplan) {
        var indice = 0;

        for (var i = 0; i < $("#num_periodo").val(); i++) {

            indice = document.getElementById("hidden_periodo_" + i).value;

            if (divplan !== indice) {
                document.getElementById("plan_implementacion_" + indice).style.display = 'none';
            }
        }
    }
});

function eliminar_soporte(idsoporte) {

    if (confirm("Confirma desea eliminar el fichero?")) {
        $.ajax({
            url: $("#ruta_url").val() + 'Autocontrol/calendar/eliminar_soporte/' + idsoporte + "/" + $("#idevento_soporte").val(),
            type: "post",
            dataType: "html",
            cache: false,
            contentType: false,
            processData: false
        })
                .done(function (result) {
                    $('#divsoportes').html(result);
                });
    }
}