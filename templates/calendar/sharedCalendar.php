<?php
session_start();

use Application\Lib\Database\DatabaseConnection;

$events_js = json_encode($events);

?>
<!doctype html>
<html lang="en">

<head>
    <title>CABapp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="templates\pagesComponents\navbar\assets\img\insigneAir.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php require('templates/pagesComponents/navbar/navbarHeader.php'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php require('templates/pagesComponents/navbar/navbar.php'); ?>
    <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        <h5 class="mb-0"><strong>Fullcalendar</strong></h5>


        <div class="row mt-3">
            <div class="col-md-12 col-sm-12">
                <button class="btn btn-primary btn-lg btn-block" onclick="saveSharedCalendar()" name="calendarSaver"
                    id='calendarSaver'><strong>SAVE CALENDAR</strong></button>
            </div>


            <div class="col-md-12 col-sm-12">
                <!--Full Calendar-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm lh-sm">


                    <div class="table-responsive" id="calendarFull"></div>

                </div>

            </div>
        </div>
    </div>

    <?php
    require('templates/pagesComponents/navbar/navbarFooter.php');
    require('templates/pagesComponents/navbar/calendarFooter.php'); ?>


</body>

</html>