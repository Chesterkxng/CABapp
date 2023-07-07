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
        <h5 class="mb-3"><strong>COURIERS</strong></h5>
        <div class="row mt-3">
            <div class="col-sm-12">
                <!--Striped table-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <table class="table table-striped" id="couriers-table">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>OBJECT</th>
                                <th>DETAILS</th>
                                <th>RECIPIENT </th>
                                <th>EDITION DATE</th>
                                <th>DOCUMENTS</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;

                            foreach ($couriers as $courier) {
                            
                            ?>
                                <tr>
                                    <td><?= htmlspecialchars($i) ?></td>
                                    <td><?= htmlspecialchars($courier->object) ?></td>
                                    <td><?= htmlspecialchars($courier->details) ?></td>
                                    <td><?= htmlspecialchars($courier->recipient) ?></td>
                                    <td><?= htmlspecialchars($courier->edition_date) ?></td>
                                    <td><a href="#" onclick="window.open('<?= htmlspecialchars($courier->url) ?>', '_blank'); return false;">
                                        <button class="btn btn-danger btn-sm btn-block">
                                            VIEW FILE  
                                            <i class="fa fa-file-pdf"></i>
                                        </button>
                                        </a>
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
        </div>

            <?php //require('templates/pagesComponents/popup/visa.php'); ?>
            <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#couriers-table').DataTable();
                });
            </script>

</body>

</html>