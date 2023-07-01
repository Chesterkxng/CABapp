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
        <h5 class="mb-3"><strong>External Mission Orders Generator </strong></h5>
        <div class="row">
            <div class="col-sm-12">
                <div class="mt-4 mb-3 p-3  button-container bg-white border shadow-sm">
                    <h6 class="mb-4">MISSION INFOS</h6>
                        <form  id="Moform" action = "index.php?action=saveExtMO" method="POST" onsubmit="event.preventDefault()">
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="grade">GRADE</label>
                            <div class="col-sm-5">
                                <select class="custom-select" name="grade" id="grade" required>
                                    <option class="option" value="">Select your grade</option>
                                    <option class="option" value="GA">General d'Armée</option>
                                    <option class="option" value="GCA">General de Corps d'Armée</option>
                                    <option class="option" value="GDA">General de Division aérienne</option>
                                    <option class="option" value="GBA">General de Brigade aérienne</option>
                                    <option class="option" value="CLM">Colonel- Major</option>
                                    <option class="option" value="COL">Colonel</option>
                                    <option class="option" value="LCL">Lieutenant-Colonel</option>
                                    <option class="option" value="CDT">Commandant</option>
                                    <option class="option" value="CNE">Capitaine</option>
                                    <option class="option" value="LTN">Lieutenant</option>
                                    <option class="option" value="SLT">Sous-Lieutenant</option>
                                    <option class="option" value="ACM">Ajdudant-Chef Major</option>
                                    <option class="option" value="ADC">Adjudant-Chef</option>
                                    <option class="option" value="ADT">Adjudant</option>
                                    <option class="option" value="SCH">Sergent-Chef</option>
                                    <option class="option" value="SGT">Sergent</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="name">NAME</label>
                            <div class="col-sm-5">
                                <input type="text" style="text-transform: uppercase;" autocomplete="off" class="form-control" id="name" name="name" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="Matricule">PERSONNEL NUMBER</label>
                            <div class="col-sm-5">
                                <input type="text" style="text-transform: uppercase;"  autocomplete="off" class="form-control" id="PN" name="PN" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="surname">DESTINATION COUNTRY</label>
                            <div class="col-sm-5">
                                <input type="text" autocomplete="off" style="text-transform: uppercase;" class="form-control" id="country" name="country" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="firstName">DESTINATION CITY</label>
                            <div class="col-sm-5">
                                <input type="text" autocomplete="off" style="text-transform: uppercase;" class="form-control" id="city" name="city" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="firstName">OBJECT OF THE MISSION</label>
                            <div class="col-sm-5">
                                <input type="text" autocomplete="off" style="text-transform: uppercase;" placeholder="MISSION PRESIDENTIELLE" value="MISSION PRESIDENTIELLE" class="form-control" id="object" name="object" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="deliverydate">DEPARTURE DATE</label>
                            <div class="col-sm-5">
                                <input type="text" autocomplete="off" style="text-transform: uppercase;" class="form-control"  id="departuredate" name="departuredate" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="expirationdate">RETURN DATE</label>
                            <div class="col-sm-5">
                                <input type="text" autocomplete="off"  style="text-transform: uppercase;" class="form-control" id="returndate" name="returndate" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3" for=""></label>
                            <div class="col-sm-5">
                                <button  onclick="generateExtMO()" class="btn btn-info btn-lg btn-block"><strong>GENERATE</strong></button>
                            </div>
                        </div>
                        <div class="form-group row" id='btn_save'>
                        
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require('templates/OM/scripts/extMO.js.php'); 
    require('templates/pagesComponents/popup/MO.php'); ?>
    <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
    
</body>
</html>