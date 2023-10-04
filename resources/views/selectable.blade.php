<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <script src="{{ asset('dist/index.global.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialDate: '2023-01-12',
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                select: function(arg) {
                    //console.log(arg.start);
                    document.querySelector('#check_in').value = arg.start;

                    calendar.unselect() ;
                    console.log(arg.startStr);
                    console.log($('td[data-date='+arg.startStr+']'));
                    $('td[data-date='+arg.startStr+']').css('backgroundColor','red')
                },
                eventClick: function(arg) {

                },
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events

            });

            calendar.render();
        });
    </script>
    <style>
        body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <div id='calendar'></div>

</body>

</html>
