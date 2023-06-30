<?php
session_start();

use Application\Lib\Database\DatabaseConnection;

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
        <h5 class="mb-3"><strong>INTERIOR MISSION ORDERS</strong></h5>
        <div class="row mt-3">
            <div class="col-sm-12">
                <!--Striped table-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <table class="table table-striped" id="intMO-table">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>RECIPIENT </th>
                                <th>CITY</th>
                                <th>COMPANIONS</th>
                                <th>OBJECT</th>
                                <th>MEANS</th>
                                <th>DEPARTURE DATE</th>
                                <th>RETURN DATE</th>
                                <th>EDITION DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;

                            foreach ($intOMs as $OM) {
                            
                            ?>
                                <tr>
                                    <td><?= htmlspecialchars($i) ?></td>
                                    <td><?= htmlspecialchars($OM->recipient) ?></td>
                                    <td><?= htmlspecialchars($OM->city) ?></td>
                                    <td><?= str_replace("\N", "<br/>",$OM->companions) ?></td>
                                    <td><?= htmlspecialchars($OM->object) ?></td>
                                    <td><?= htmlspecialchars($OM->means) ?></td>
                                    <td><?= htmlspecialchars($OM->departure_date) ?></td>
                                    <td><?= htmlspecialchars($OM->return_date) ?></td>
                                    <td><?= htmlspecialchars($OM->edition_date) ?></td>          

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
        </div>
            <h5 class="mb-3"><strong>EXTERIOR MISSION ORDERS</strong></h5>
        <div class="row mt-3">
            <div class="col-sm-12">

                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <table class="table table-striped" id="extMO-table">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>RECIPIENT </th>
                                <th>COUNTRY</th>
                                <th>CITY</th>
                                <th>COMPANIONS</th>
                                <th>OBJECT</th>
                                <th>MEANS</th>
                                <th>DEPARTURE DATE</th>
                                <th>RETURN DATE</th>
                                <th>EDITION DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;

                            foreach ($extOMs as $OM) {
                            
                            ?>
                                <tr>
                                    <td><?= htmlspecialchars($i) ?></td>
                                    <td><?= htmlspecialchars($OM->recipient) ?></td>
                                    <td><?= htmlspecialchars($OM->country) ?></td>
                                    <td><?= htmlspecialchars($OM->city) ?></td>
                                    <td><?= str_replace("\N", "<br/>",$OM->companions) ?></td>
                                    <td><?= htmlspecialchars($OM->object) ?></td>
                                    <td><?= htmlspecialchars($OM->means) ?></td>
                                    <td><?= htmlspecialchars($OM->departure_date) ?></td>
                                    <td><?= htmlspecialchars($OM->return_date) ?></td>
                                    <td><?= htmlspecialchars($OM->edition_date) ?></td>          

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
        </div>
        <h5 class="mb-3"><strong> MISSION ORDERS REQUEST</strong></h5>
        <div class="row mt-3">
            <div class="col-sm-12">

                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <table class="table table-striped" id="DOM-table">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>RECIPIENT </th>
                                <th>COUNTRY</th>
                                <th>CITY</th>
                                <th>COMPANIONS</th>
                                <th>OBJECT</th>
                                <th>MEANS</th>
                                <th>DEPARTURE DATE</th>
                                <th>RETURN DATE</th>
                                <th>EDITION DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;

                            foreach ($DOMs as $OM) {
                            
                            ?>
                                <tr>
                                    <td><?= htmlspecialchars($i) ?></td>
                                    <td><?= htmlspecialchars($OM->recipient) ?></td>
                                    <td><?= htmlspecialchars($OM->country) ?></td>
                                    <td><?= htmlspecialchars($OM->city) ?></td>
                                    <td><?= str_replace("\N", "<br/>",$OM->companions) ?></td>
                                    <td><?= htmlspecialchars($OM->object) ?></td>
                                    <td><?= htmlspecialchars($OM->means) ?></td>
                                    <td><?= htmlspecialchars($OM->departure_date) ?></td>
                                    <td><?= htmlspecialchars($OM->return_date) ?></td>
                                    <td><?= htmlspecialchars($OM->edition_date) ?></td>          

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


            <?php require('templates/pagesComponents/popup/visa.php'); ?>
            <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#intMO-table').DataTable();
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#extMO-table').DataTable();
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#DOM-table').DataTable();
                });
            </script>

</body>

</html>