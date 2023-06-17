<?php
session_start();

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Passport\PassportRepository;

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
        <h5 class="mb-3"><strong>VISAS LIST</strong></h5>
        <div class="row mt-3">
            <div class="col-sm-12">
                <!--Striped table-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <table class="table table-striped" id="events-table">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>TITLE</th>
                                <th>START</th>
                                <th>END</th>
                                <th>TIME SLOT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;

                            foreach ($events as $event) {
                                if (strlen($event->start)> 10 && strlen($event->end) > 10){
                                    $starting_date = substr($event->start,0,10); 
                                    $starting_hour= substr($event->start,11,16);
                                    $ending_date = substr($event->end,0,10); 
                                    $ending_hour= substr($event->end,11,16);
                                    $time_slot = $starting_hour.' - '.$ending_hour; 
                                } else {
                                    $starting_date = $event->start; 
                                    $ending_date = $event->end; 
                                    $time_slot = ''; 
                                }
                              
                            ?>
                                <tr>
                                    <td><?= htmlspecialchars($i) ?></td>
                                    <td><?= htmlspecialchars($event->title) ?></td>
                                    <td><?= htmlspecialchars($starting_date) ?></td>
                                    <td><?= htmlspecialchars($ending_date) ?></td>
                                    <td><?= htmlspecialchars($time_slot) ?></td>


                                    <td class="align-middle text-center">
                                        <form style="display:inline;" action="index.php?action=updateEventForm&event_id=<?= $event->event_id ?>" method="post">
                                            <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                        </form>
                                        <form style="display:inline;" action="index.php?action=deleteEventPopup&event_id=<?= $event->event_id ?>" method="post">
                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                                $i = $i + 1;
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
                <!--/Striped table-->
            </div>
            <?php require('templates/pagesComponents/popup/event.php'); ?>
            <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#events-table').DataTable();
                });
            </script>

</body>

</html>