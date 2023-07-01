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
    <?php require('templates/pagesComponents/navbar/navbarHeader.php'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php require('templates/pagesComponents/navbar/navbar.php'); ?>
    <?php
    ?>
    <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        <h5 class="mb-3"><strong>Courier adding </strong></h5>
        <div class="row">
            <div class="col-sm-12">
                <div class="mt-4 mb-3 p-3  button-container bg-white border shadow-sm">
                    <h6 class="mb-4">COURRIER INFOS</h6>
                    <form action="index.php?action=addCourier" method="post" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="recipient">RECIPIENT(S)</label>
                            <div class="col-sm-5">
                                <textarea type="text" rows = "2"  placeholder="write the recipients in abbreviated form" style="text-transform: uppercase;" class="form-control" id="recipient" name="recipient" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="object">OBJECT</label>
                            <div class="col-sm-5">
                                <textarea type="text" autocomplete="off" rows ="2" style="text-transform: uppercase;" class="form-control" id="object" name="object" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="details">DETAILS</label>
                            <div class="col-sm-5">
                                <textarea type="text" rows ="3" autocomplete="off" style="text-transform: uppercase;" class="form-control" id="details" name="details"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="firstName">UPLOAD FILE</label>
                            <div class="col-sm-5">
                                <input type="file"  class="form-control" id="uploadedfile" name="uploadfile" required />
                            </div>
                        </div>

             
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="date">EDITION DATE</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" id="date" name="date" required />
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for=""></label>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info btn-lg btn-block"><strong>UPLOAD</strong></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require('templates/pagesComponents/popup/courier.php') ?>
    <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
</body>
</html>