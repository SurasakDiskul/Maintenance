<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ปฏิทินผู้เข้าจองห้องประชุม</title>
    <link rel="stylesheet" href="./lib/jquery.fancybox.css" type="text/css" media="screen" />
    <link href='./fullcalendar/fullcalendar.css' rel='stylesheet' />
    <link href='./fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href="./lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="./lib/jquery/dist/jquery.min.js"></script>
    <script src='./lib/moment.min.js'></script>
    <script src='./fullcalendar/fullcalendar.min.js'></script>
    <script src='./lib/lang/th.js'></script>
    <script src="./lib/jquery.fancybox.pack.js"></script>


    <script type="text/javascript">
        jQuery(document).ready(function() {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                eventLimit: true,
                defaultDate: new Date(),
                timezone: 'Asia/Bangkok',
                events: {
                    url: './dataEvents.php',
                },
                loading: function(bool) {
                    $('#loading').toggle(bool);
                },

                eventClick: function(event) {
                    if (event.url) {
                        $.fancybox({
                            'href': event.url,
                            'type': 'iframe',
                            'autoScale': true,
                            'openEffect': 'elastic',
                            'openSpeed': 'fast',
                            'closeEffect': 'elastic',
                            'closeSpeed': 'fast',
                            'closeBtn': true,
                            onClosed: function() {
                                parent.location.reload(true);
                            },
                            helpers: {
                                thumbs: {
                                    width: 50,
                                    height: 50
                                },

                                overlay: {
                                    css: {
                                        'background': 'rgba(49, 176, 213, 0.7)'
                                    }
                                }
                            }
                        });
                        return false;
                    }
                },
            });
        });
    </script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class='col-md-12'>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id='calendar'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>