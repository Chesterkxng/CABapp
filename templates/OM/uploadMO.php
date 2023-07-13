<?php session_start();
if (isset($_POST)) {
    $type = $_GET['type'];
}
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
    <?php
    ?>
    <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        <h5 class="mb-3"><strong>Upload MO </strong></h5>
        <div class="row">
            <div class="col-sm-12">
                <div class="mt-4 mb-3 p-3  button-container bg-white border shadow-sm">
                    <h6 class="mb-4">MISSION INFOS</h6>
                    <form action="index.php?action=uploadMO&type=<?= $type ?>&om_id=<?= $OM->om_id ?>" method="post"
                        enctype="multipart/form-data">

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="name">RECIPIENT</label>
                            <div class="col-sm-5">
                                <input type="text" style="text-transform: uppercase;" class="form-control"
                                    value="<?= $OM->recipient ?>" id="name" name="name" readonly />
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="firstName">DESTINATION COUNTRY</label>
                            <div class="col-sm-5">
                                <input type="text" style="text-transform: uppercase;" class="form-control"
                                    value="<?= $OM->country ?>" id="country" name="country" readonly />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="firstName">DESTINATION CITY</label>
                            <div class="col-sm-5">
                                <input type="text" style="text-transform: uppercase;" class="form-control"
                                    value="<?= $OM->city ?>" id="city" name="city" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="grade">COMPANIONS</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" rows="3" name="companion" id="companion"
                                    readonly><?= str_replace("\N", "\n", $OM->companions) ?></textarea>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="firstName">OBJECT OF THE MISSION</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $OM->object ?>" style="text-transform: uppercase;"
                                    class="form-control" id="object" name="object" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="firstName">TRANSPORT MEANS</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $OM->means ?>" style="text-transform: uppercase;"
                                    class="form-control" id="means" name="means" readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="deliverydate">DEPARTURE DATE</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $OM->departure_date ?>" style="text-transform: uppercase;"
                                    class="form-control" id="departuredate" name="departuredate" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="expirationdate">RETURN DATE</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= $OM->return_date ?>" style="text-transform: uppercase;"
                                    class="form-control" id="returndate" name="returndate" readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="firstName">UPLOAD FILE</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" id="uploadedfile" name="uploadfile" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for=""></label>
                            <div class="col-sm-5">
                                <button type="submit"
                                    class="btn btn-info btn-lg btn-block"><strong>UPLOAD</strong></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require('templates/OM/scripts/intMO.js.php');
    require('templates/pagesComponents/popup/MO.php') ?>
    <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>

</body>

</html>