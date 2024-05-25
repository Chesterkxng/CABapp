<?php
session_start();

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Passport\PassportRepository;

?>
<!doctype html>
<html lang="en">

<head>
    <title>BEOapp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="templates\pagesComponents\navbar\assets\img\insigneAir.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php require ('templates/pagesComponents/navbar/navbarHeader.php'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php require ('templates/pagesComponents/navbar/navbar.php'); ?>
    <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        <h5 class="mb-3"><strong>USERS LIST</strong></h5>
        <div class="row mt-3">
            <div class="col-sm-12">
                <!--Striped table-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <div class="table-responsive">
                        <table class="table table-striped" id="users-table">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>USERNAME </th>
                                    <th>SECURITY QUESTION</th>
                                    <th>SECURITY ANSWER</th>
                                    <th>PROFILE TYPE</th>
                                    <th>ACTION</th>
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
                                        <form style="display:inline;" action="index.php?action=userAddingForm" method="post">
                                            <button class="btn btn-primary btn-block"><i class="fa fa-plus"></i></button>
                                        </form>
                                    </td>

                                </tr>
                                <?php
                                $i = 1;

                                foreach ($users as $user) {

                                    ?>
                                    <tr>
                                        <td>
                                            <?= htmlspecialchars($i) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($user->username) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($user->security_question) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($user->security_answer) ?>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($user->profil_type) ?>
                                        </td>

                                        <td class="align-middle text-center">
                                            <form style="display:inline;"
                                                action="index.php?action=updateUserForm&login=<?= $user->login_id ?>"
                                                method="post">
                                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                            </form>
                                            <form style="display:inline;"
                                                action="index.php?action=deleteUserPopup&login=<?= $user->login_id ?>"
                                                method="post">
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
                </div>
                <!--/Striped table-->
            </div>
            <?php require ('templates/pagesComponents/popup/visa.php'); ?>
            <?php require ('templates/pagesComponents/navbar/navbarFooter.php'); ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#users-table').DataTable();
                });
            </script>

</body>

</html>