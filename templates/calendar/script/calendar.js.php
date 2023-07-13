<script type="text/javascript">
    $(document).ready(function () {
        localStorage.clear();


        /* initialize the calendar
        -----------------------------------------------------------------*/
        $('#calendarFull').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectHelper: true,
            select: function (start, end) {
                var title = prompt('Event Title:');
                var eventData;
                if (title) {
                    eventData = {
                        title: title,
                        start: start,
                        end: end,
                    }
                    localStorage.setItem(localStorage.length + 1, JSON.stringify(eventData));

                    $('#calendarFull').fullCalendar('renderEvent', eventData, true); // stick? = true    
                }
                $('#calendarFull').fullCalendar('unselect');
            },
            editable: true,
            eventLimit: false, // allow "more" link when too many events
            events: <?= $events_js ?>,
        });

    });

</script>
<script type="text/javascript">
    function saveCalendar() {
        var values = {};
        for (let i = 1; i <= localStorage.length; i++) {
            let storedValue = localStorage.getItem(i);
            values[i] = JSON.parse(storedValue);
        }

        localStorage.clear();
        $.ajax({
            type: "POST",
            url: "calendarSaver.php",
            data: values,
            success: function (data) {
                var d = JSON.parse(data);
                if (d.msg == "Success")
                    alert("EVENT(S) ADDED SUCCESSFULLY");
                else
                    alert("FAILED");

            }
        })
    }

</script>

<script type="text/javascript">
    function saveSharedCalendar() {
        var values = {};
        for (let i = 1; i <= localStorage.length; i++) {
            let storedValue = localStorage.getItem(i);
            values[i] = JSON.parse(storedValue);
        }

        localStorage.clear();
        $.ajax({
            type: "POST",
            url: "sharedCalendarSaver.php",
            data: values,
            success: function (data) {
                var d = JSON.parse(data);
                if (d.msg == "Success")
                    alert("EVENT(S) ADDED SUCCESSFULLY");
                else
                    alert("FAILED");

            }
        })
    }

</script>