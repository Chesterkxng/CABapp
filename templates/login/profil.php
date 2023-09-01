<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <title>CABapp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="templates\pagesComponents\navbar\assets\img\insigneAir.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="templates\pagesComponents\navbar\assets\css\bootstrap.min.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="templates\pagesComponents\navbar\assets\css\quicksand.css">
    <link rel="stylesheet" href="templates\pagesComponents\navbar\assets\css\style.css">

</head>

<body class="login-body" style="background-image: url(templates/login/images/airbus.jpg);">

    <!--Login Wrapper-->

    <div class="container-fluid login-wrapper">
        <div class="login-box">
            <h1 class="text-center mb-5"><i class="fa fa-university text-primary"></i> CABapp</h1>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12 login-box-info" style="opacity: 1;">
                    <h3 class="mb-4">WELCOME CABapp</h3>
                    <p class="mb-4">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.</p>

                </div>
                <div class="col-md-6 col-sm-6 col-12 login-box-form p-4">
                    <h3 class="mb-2">Profile</h3>
                    <small class="text-muted bc-description">Who are you ?</small>
                    <form action="index.php?action=profileCompletion" method='post' class="mt-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <select id="grade" name="grade" class="form-control mt-0" required>
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
                                <option class="option" value="CCH">Caporal-Chef</option>
                                <option class="option" value="CAL">Caporal</option>
                                <option class="option" value="SD1">Soldat de 1ère Classe</option>
                                <option class="option" value="SD2">Soldat de 2ème Classe</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control mt-0" placeholder="Surname" autocomplete="off"
                                type="text" id="surname" name="surname" required>
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" autocomplete="off" id="firstName" name="firstName"
                                placeholder="First Name" class="form-control mt-0" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="text" autocomplete="off" type="text" id="function" name="function"
                                placeholder="Function" class="form-control mt-0" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-theme btn-block p-2 mb-1">Complete your
                                profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require('templates/pagesComponents/popup/login.php') ?>
    <!--Custom Js Script-->
</body>

</html>