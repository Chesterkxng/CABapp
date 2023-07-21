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
        <h5 class="mb-3"><strong>PASSPORTS LIST</strong></h5>
        <div class="row mt-3">
            <div class="col-sm-12">
                <!--Striped table-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <div class="table-responsive">
                        <table class="table table-striped" id="passports-table">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>PASSNUMBER </th>
                                    <th>GRADE</th>
                                    <th>SURNAME</th>
                                    <th>FIRST NAME</th>
                                    <th>DELIVERY DATE</th>
                                    <th>EXPIRATION DATE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;

                                foreach ($passports as $passport) {

                                ?>
                                    <tr>
                                        <td>
                                            <?= htmlspecialchars($i) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($passport->passNumber) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($passport->grade) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($passport->surname) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($passport->firstname) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($passport->deliveryDate) ?>
                                        </td>

                                        <?php $currentDate = new DateTime(date('Y-m-d'));
                                        $expirationDate = new DateTime($passport->expirationDate);
                                        if ($currentDate >= $expirationDate) { ?>
                                            <td>
                                                <label class="badge badge-danger badge-pill">
                                                    <?= htmlspecialchars($passport->expirationDate) ?>
                                                </label>
                                            </td>

                                            <?php
                                        } else {

                                            $datediff = date_diff($expirationDate, $currentDate);
                                            switch ($datediff->days) {
                                                case ($datediff->days < 92 && $datediff->days > 1): ?>
                                                    <td>
                                                        <label class="badge badge-warning badge-pill">
                                                            <?= htmlspecialchars($passport->expirationDate) ?>
                                                        </label>
                                                    </td>
                                                <?php break;
                                                case ($datediff->days > 92): ?>
                                                    <td>
                                                        <label class="badge badge-success badge-pill">
                                                            <?= htmlspecialchars($passport->expirationDate) ?>
                                                        </label>
                                                    </td>

                                        <?php
                                                    break;
                                            }
                                        }
                                        ?>


                                        <td class="align-middle text-center">
                                            <form style="display:inline;" action="index.php?action=updatePassportForm&passport_id=<?= $passport->passport_id ?>" method="post">
                                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                            </form>
                                            <form style="display:inline;" action="index.php?action=deletePassportPopup&passport_id=<?= $passport->passport_id ?>" method="post">
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                    $i = $i + 1;
                                }
                                ?>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form style="display:inline;" action="index.php?action=passportAddingForm" method="post">
                                            <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/Striped table-->
            </div>
            <?php require('templates/pagesComponents/popup/passport.php'); ?>
            <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#passports-table').DataTable();
                });
            </script>

</body>

</html>