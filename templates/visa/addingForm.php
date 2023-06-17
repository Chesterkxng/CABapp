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
        <h5 class="mb-3"><strong>Visa adding </strong></h5>
        <div class="row">
            <div class="col-sm-9">
                <div class="mt-4 mb-3 p-3  button-container bg-white border shadow-sm">
                    <h6 class="mb-4">VISA INFOS</h6>
                    <form action="index.php?action=addVisa" method="post">


                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="passnumber">VISA NUMBER</label>
                            <div class="col-sm-5">
                                <input type="text" style="text-transform: uppercase;" class="form-control" id="visanumber" name="visanumber" required />
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="passnumber">PASSPORT NUMBER</label>
                            <div class="col-sm-5">
                                <input type="text" style="text-transform: uppercase;" class="form-control" id="passnumber" name="passnumber" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="deliverydate">DELIVERY DATE</label>
                            <div class="col-sm-5">
                                <input type="date"  class="form-control"  id="deliverydate" name="deliverydate" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="expirationdate">EXPIRATION DATE</label>
                            <div class="col-sm-5">
                                <input type="date"  class="form-control" id="expirationdate" name="expirationdate" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for=""></label>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info btn-lg btn-block"><strong>ADD</strong></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require('templates/pagesComponents/popup/visa.php') ?>
    <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
</body>
</html>