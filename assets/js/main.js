$(function () {

    //Recorre los eventos de la barra de acciones y ejecuta la url parametrizada
    $("div.navbar-header a").each(function (index, obj) {
        $(this).click(function (event) {

            var mimodulo = $('#mimodulo').val();
            var moduloantecesor = $('#moduloantecesor').val();
            var miparametro = $('#miparametro').val();

            if ($(this).attr("id") == "Atras_Lista") {
                mimodulo = moduloantecesor;
            }

            event.preventDefault();
            $.ajax({
                data: 'modulo=' + mimodulo + miparametro,
                url: $(this).attr("href") + "/" + $("input[name=radio_registro]:checked").val(),
                type: 'post',
                dataType: 'html',
                success: function (response) {
                    $("#contenido_principal").html(response);
                }
            });
        });

    });



    var currentDate; // Holds the day clicked when adding a new event
    var currentEvent; // Holds the event object when editing an event



    $('#color').colorpicker(); // Colopicker
    $('#time').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true,
        showMeridian: false
    });  // Timepicker



    // Here i define the base_url
    var base_url = $("#ruta_url").val(); // Here i define the base_url

    // Fullcalendar
    $('#calendar').fullCalendar({
        timeFormat: 'H(:mm)',
        header: {
            left: 'prev, next, today',
            center: 'title',
            right: 'month, basicWeek, basicDay'
        },
        // Get all events stored in database
        lang: 'es',
        eventLimit: true, // allow "more" link when too many events
        events: base_url + 'Autocontrol/calendar/getEvents?idproyecto=' + $('#idproyecto').val() + '&idregional=' + $('#idregional').val(),
        // Handle Day Click
        dayClick: function (date, event, view) {
            
            
            
            currentDate = date.format();
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
                    alert('Intente nuevamente!')
                }

            });



        },
        // Event Mouseover
        eventMouseover: function (calEvent, jsEvent, view) {

            var tooltip = '<div class="event-tooltip">' + calEvent.description + '</div>';
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
        }

    });

    // Prepares the modal window according to data passed
    function modal(data) {
        recorrer_plan_implementacion("reestablecer");
        $("#cadenaPlan").val("");
        
        // Set modal title
        $('.modal-title').html(data.title);
        // Clear buttons except Cancel
        $('.modal-footer button:not(".btn-default")').remove();
        // Set input values
        $('#title').val(data.event ? data.event.title : '');
        if (!data.event) {
            // When adding set timepicker to current time
            var now = new Date();
            var time = now.getHours() + ':' + (now.getMinutes() < 10 ? '0' + now.getMinutes() : now.getMinutes());
        } else {
            // When editing set timepicker to event's time
            var time = data.event.date.split(' ')[1].slice(0, -3);
            time = time.charAt(0) === '0' ? time.slice(1) : time;
        }
        $('#time').val(time);
        $('#description').val(data.event ? data.event.description : '');
        $('#color').val(data.event ? data.event.color : '#3a87ad');


        if (data.event) {
            //alert("Edicion de evento "+data.event.id);

            $.post(base_url + 'Autocontrol/calendar/obtener_eventos_plan/' + data.event.id, {
            }, function (result) {

                $("#cadenaPlan").val(result);

                //setTimeout(function(){recorrer_plan_implementacion("consultar")},3000);
                recorrer_plan_implementacion("consultar");
            });

        } else {

        }


        // Create Butttons
        $.each(data.buttons, function (index, button) {
            $('.modal-footer').prepend('<button type="button" id="' + button.id + '" class="btn ' + button.css + '">' + button.label + '</button>')
        })
        //Show Modal
        $('.modal').modal('show');
    }

    // Handle Click on Add Button
    $('.modal').on('click', '#add-event', function (e) {
        recorrer_plan_implementacion("enviar");
        if (validator(['title', 'description'])) {
            $.post(base_url + 'Autocontrol/calendar/addEvent', {
                title: $('#title').val(),
                description: $('#description').val(),
                color: $('#color').val(),
                date: currentDate + ' ' + getTime(),
                cadenaPlan: $('#cadenaPlan').val(),
                idpersona: $('#idpersona').val(),
                idregional: $('#idregional').val(),
                idproyecto: $('#idproyecto').val()
            }, function (result) {
                $('.modal').modal('hide');
                $('#calendar').fullCalendar("refetchEvents");
            });
        }
    });


    // Handle click on Update Button
    $('.modal').on('click', '#update-event', function (e) {
        recorrer_plan_implementacion("enviar");
        if (validator(['title', 'description'])) {

            $.post(base_url + 'Autocontrol/calendar/updateEvent', {
                id: currentEvent._id,
                title: $('#title').val(),
                description: $('#description').val(),
                color: $('#color').val(),
                date: currentEvent.date.split(' ')[0] + ' ' + getTime(),
                cadenaPlan: $('#cadenaPlan').val(),
                idpersona: $('#idpersona').val(),
                idregional: $('#idregional').val(),
                idproyecto: $('#idproyecto').val()
            }, function (result) {
                $('.modal').modal('hide');
                $('#calendar').fullCalendar("refetchEvents");
            });
        }
    });



    // Handle Click on Delete Button
    $('.modal').on('click', '#delete-event', function (e) {
        $.get(base_url + 'Autocontrol/calendar/deleteEvent?id=' + currentEvent._id, function (result) {
            $('.modal').modal('hide');
            $('#calendar').fullCalendar("refetchEvents");
        });
    });


// Handle click on Update Button
    $('.modal #formuploadajax').on('click', '#subir_soporte', function (e) {

        e.preventDefault();
        $("#idevento_soporte").val(currentEvent._id);
        //e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formuploadajax"));
        formData.append("dato", "valor");
        //formData.append(f.attr("name"), $(this)[0].files[0]);
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
                    $('#divsoportes').html(result);
                });


    });



    $("#visualizar_soportes").click(function (e) {

        e.preventDefault();
        $("#idevento_soporte").val(currentEvent._id);

        $.ajax({
            url: base_url + 'Autocontrol/calendar/visualizar_soportes/' + currentEvent._id,
            type: "post",
            dataType: "html",
            cache: false,
            contentType: false,
            processData: false
        })
                .done(function (result) {
                    $('#divsoportes').html(result);
                });

    });










    // Get Formated Time From Timepicker
    function getTime() {
        var time = $('#time').val();
        return (time.indexOf(':') == 1 ? '0' + time : time) + ':00';
    }

    // Dead Basic Validation For Inputs
    function validator(elements) {
        var errors = 0;
        $.each(elements, function (index, element) {
            if ($.trim($('#' + element).val()) == '')
                errors++;
        });
        if (errors) {
            $('.error').html('El campo nombre o descripción está vacío');
            return false;
        }
        return true;
    }



    function recorrer_plan_implementacion(accion) {

        var cadenaPlan = "";
        var coma = "";

        var cadena = $("#cadenaPlan").val();
        document.getElementById('divsoportes').innerHTML="";
        
        
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


function bajar_soporte(ruta_soporte,idsoporte) {

        $("#iframeto").attr("src",ruta_soporte);
        //window.location.href=ruta_soporte;
        /*
        $('a#href_download_'+idsoporte).attr({target: '_blank', 
                    href  : ruta_soporte});
         */
    
}
