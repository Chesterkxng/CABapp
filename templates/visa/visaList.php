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
                    <table class="table table-striped" id="visas-table">
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

                            foreach ($visas as $visa) {
                                $passportRepository = new PassportRepository();
                                $passportRepository->connexion = new DatabaseConnection(); 
                                $passport = $passportRepository->getPassportByPassNumber($visa->passNumber); 
                            ?>
                                <tr>
                                    <td><?= htmlspecialchars($i) ?></td>
                                    <td><?= htmlspecialchars($visa->passNumber) ?></td>
                                    <td><?= htmlspecialchars($passport->grade) ?></td>
                                    <td><?= htmlspecialchars($passport->surname) ?></td>
                                    <td><?= htmlspecialchars($passport->firstname) ?></td>
                                    <td><?= htmlspecialchars($visa->deliveryDate) ?></td>

                                    <?php $currentDate = new DateTime(date('Y-m-d'));
                                    $expirationDate = new DateTime($visa->expirationDate);
                                    if ($currentDate >= $expirationDate) { ?>
                                        <td>
                                            <label class="badge badge-danger badge-pill"><?= htmlspecialchars($visa->expirationDate) ?></label>
                                        </td>

                                    <?php
                                    } else {


                                    $datediff = date_diff($expirationDate, $currentDate);
                                    switch ($datediff->days) {
                                        case ($datediff->days < 61 && $datediff->days > 1): ?>
                                            <td>
                                                <label class="badge badge-warning badge-pill"><?= htmlspecialchars($visa->expirationDate) ?></label>
                                            </td>
                                        <?php break;
                                        case ($datediff->days > 61): ?>
                                            <td>
                                                <label class="badge badge-success badge-pill"><?= htmlspecialchars($visa->expirationDate) ?></label>
                                            </td>

                                        <?php
                                            break;
                                        }
                                    }
                                    ?>
                                        



                                    <td class="align-middle text-center">
                                        <form style="display:inline;" action="index.php?action=updateVisaForm&visa_id=<?= $visa->visa_id ?>" method="post">
                                            <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                        </form>
                                        <form style="display:inline;" action="index.php?action=deleteVisaPopup&visa_id=<?= $visa->visa_id ?>" method="post">
                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                                $i = $i + 1;
                            }
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <form style="display:inline;" action="index.php?action=visaAddingForm" method="post">
                                        <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--/Striped table-->
            </div>
            <?php require('templates/pagesComponents/popup/visa.php'); ?>
            <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#visas-table').DataTable();
                });
            </script>

</body>

</html>