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
        <h5 class="mb-3"><strong>BORDEREAUX</strong></h5>
        <div class="row mt-3">
            <div class="col-sm-12">
                <!--Striped table-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <div class="table-responsive">
                        <table class="table table-striped" id="BE-table">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>REFERNCE</th>
                                    <th>OBJECT</th>
                                    <th>DESTINATAIRES</th>
                                    <th>DATE D'EDITION</th>
                                    <th>FICHIERS</th>

                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form style="display:inline;" action="index.php?action=beAddingForm" method="post">
                                            <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                $i = 1;

                                foreach ($BEs as $BE) {

                                ?>
                                    <tr>
                                        <td>
                                            <?= htmlspecialchars($i) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($BE->reference) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($BE->object) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($BE->recipient) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($BE->edition_date) ?>
                                        </td>
                                        <td><a href="#" onclick="window.open('<?= htmlspecialchars($BE->url) ?>', '_blank'); return false;">
                                                <button class="btn btn-info">
                                                    <i class="fa fa-file-pdf"></i>
                                                </button>
                                            </a>
                                            <a href="index.php?action=BEupdatingForm&be_id=<?= $BE->bordereau_id ?>">
                                                <button class="btn btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <a href="index.php?action=deleteBEPopup&be_id=<?= $BE->bordereau_id ?>">
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
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
                </div>
                <!--/Striped table-->
            </div>
        </div>
        <?php require('templates/pagesComponents/popup/bordereau.php'); ?>
        <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#BE-table').DataTable();
            });
        </script>

</body>

</html>