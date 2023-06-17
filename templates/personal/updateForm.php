<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <title>MTapp</title>
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
    <?php
    use Application\Lib\Database\DatabaseConnection;
    use Application\Model\Personal\PersonalRepository;
    $personalRepositoty = new PersonalRepository();
    $personalRepositoty->connection = new DatabaseConnection();
    if (isset($_GET["personal_id"])) {
        $personal_id = $_GET["personal_id"];
        $personal = $personalRepositoty->getPersonal($personal_id);
    } elseif (isset($_GET["login_id"])) {
        $login_id = $_GET['login_id'];
        $personal = $personalRepositoty->getProfile($login_id);
    }
    ?>
    <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        <h5 class="mb-3"><strong>Personal informations update</strong></h5>
        <div class="row">
            <div class="col-sm-6">
                <div class="mt-4 mb-3 p-3  button-container bg-white border shadow-sm">
                    <h6 class="mb-4">PERSONAL</h6>
                    <?php if (isset($_GET["personal_id"])) { ?>
                        <form action="index.php?action=updatePersonalInfos&personal_id=<?= $personal_id ?>" method="post">
                        <?php } elseif (isset($_GET["login_id"])) { ?>
                            <form action="index.php?action=updateProfileInfos&login_id=<?= $login_id ?>" method="post">
                            <?php } ?>
                            <div class="form-group row">
                                <label class="control-label col-sm-3" for="grade">GRADE</label>
                                <div class="col-sm-5">
                                    <select class="custom-select" name="grade" id="grade" required>
                                        <option class="option" value="<?= $personal->grade ?>"><?= $personal->grade ?></option>
                                        <option class="option" value="General d'Armée">General d'Armée</option>
                                        <option class="option" value="General de Corps d'Armée">General de Corps d'Armée</option>
                                        <option class="option" value="General de Division aérienne">General de Division aérienne</option>
                                        <option class="option" value="General de Brigade aérienne">General de Brigade aérienne</option>
                                        <option class="option" value="Colonel- Major">Colonel- Major</option>
                                        <option class="option" value="Colonel">Colonel</option>
                                        <option class="option" value="Lieutenant-Colonel">Lieutenant-Colonel</option>
                                        <option class="option" value="Commandant">Commandant</option>
                                        <option class="option" value="Capitaine">Capitaine</option>
                                        <option class="option" value="Lieutenant">Lieutenant</option>
                                        <option class="option" value="Sous-Lieutenant">Sous-Lieutenant</option>
                                        <option class="option" value="Ajdudant-Major">Ajdudant-Major</option>
                                        <option class="option" value="Adjudant-Chef">Adjudant-Chef</option>
                                        <option class="option" value="Adjudant">Adjudant</option>
                                        <option class="option" value="Sergent-Chef">Sergent-Chef</option>
                                        <option class="option" value="Sergent">Sergent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3" for="surname">SURNAME</label>
                                <div class="col-sm-5">
                                    <input type="text" style="text-transform: uppercase;" class="form-control" id="surname" name="surname" value="<?= $personal->surname ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3" for="firstName">FIRST NAME</label>
                                <div class="col-sm-5">
                                    <input type="text" style="text-transform: uppercase;" class="form-control" id="firstName" name="firstName" value="<?= $personal->first_name ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3" for="function">FUNCTION</label>
                                <div class="col-sm-5">
                                    <input type="text" style="text-transform: uppercase;" class="form-control" id="function" name="function" value="<?= $personal->function ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-info btn-lg">Update</button>
                                </div>
                            </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
    <?php require('templates/pagesComponents/popup/personalPopup.php') ?>
    <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
</body>
</html>