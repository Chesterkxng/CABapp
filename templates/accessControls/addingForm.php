<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
    <title>CABapp</title>
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
    <?php
    ?>
    <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        <h5 class="mb-3"><strong>User adding </strong></h5>
        <div class="row">
            <div class="col-sm-12">
                <div class="mt-4 mb-3 p-3  button-container bg-white border shadow-sm">
                    <h6 class="mb-4">USER INFOS</h6>
                    <form action="index.php?action=addUser" method="post">


                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="username">USERNAME</label>
                            <div class="col-sm-5">
                                <input type="text" autocomplete="off" class="form-control" id="username" name="username"
                                    required />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="password">PASSWORD</label>
                            <div class="col-sm-5">
                                <input type="text" autocomplete="off" class="form-control" id="password" name="password"
                                    required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="profile_type">PROFILE TYPE</label>
                            <div class="col-sm-5">
                                <select class="custom-select" name="profile_type" id="profile_type" required>
                                    <option class="option" value=""> Choose the type</option>
                                    <option class="option" value="00">SUPER ADMIN</option>
                                    <option class="option" value="1">OFFICER</option>
                                    <option class="option" value="2">SECRETARY</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="securityquestion">SECURITY QUESTION</label>
                            <div class="col-sm-5">
                                <select class="custom-select" name="securityquestion" id="securityquestion" required>
                                    <option class="option" value=""> Choose your question </option>
                                    <<option class="option" value="Quel est le nom de votre meilleur ami ?">Quel est le
                                        nom de votre meilleur ami ?</option>
                                        <option class="option" value="Quel est le prénom de votre mère ?">Quel est le
                                            prénom de votre mère ?</option>
                                        <option class="option" value="Quel est votre ville préférée ?">Quel est votre
                                            ville préférée ?</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="securityanswer">SECURITY ANSWER</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="securityanswer" name="securityanswer"
                                    required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for=""></label>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info btn-lg btn-block"><strong>ADD
                                        USER</strong></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require ('templates/pagesComponents/popup/login.php') ?>
    <?php require ('templates/pagesComponents/navbar/navbarFooter.php'); ?>
</body>

</html>