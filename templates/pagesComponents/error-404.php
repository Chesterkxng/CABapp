<!DOCTYPE html>
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
    <!--Page loader-->
    <div class="loader-wrapper">
        <div class="loader-circle">
            <div class="loader-wave"></div>
        </div>
    </div>
    <!--Page loader-->

    <!--Page Wrapper-->

    <div class="container-fluid">

        <div class="col-md-4 offset-md-4 col-sm-4 offset-sm-4">
            <div class="code text-theme mt-5">404</div>
            <div class="title mb-4 text-center text-secondary text-uppercase">It looks like you have been lost...</div>

            <div class="buttons mb-5">
                <div class="row">
                    <div class="col-sm-12">
                        <button onclick="history.back();" class="btn btn-theme btn-block p-2"><i class="fa fa-angle-left pull-left"></i> Go back</button>
                    </div>
                </div>
            </div>


            <!-- Copyright -->
            <div class="copyright text-center">
                <div class="mb-2">
                    &copy; 2023 <strong class="text-theme">GOITA CHEICK</strong>. All rights reserved.
                </div>
            </div>
            <!-- ./Copyright -->

        </div>

    </div>
    <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>

</body>

</html>