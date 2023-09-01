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
					<h3 class="mb-2">Login</h3>
					<small class="text-muted bc-description">Sign in with your credentials</small>
					<form action="index.php?action=signIn" method='post' class="mt-2">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
							</div>
							<input type="text" class="form-control mt-0" placeholder="Username" autocomplete="off"
								id="Username" name="Username" required>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
							</div>
							<input type="password" id="Password" name="Password" class="form-control mt-0"
								placeholder="Password" required>
						</div>

						<div class="form-group">
							<button type="submit" class="form-control btn btn-theme btn-block p-2 mb-1">Login</button>
							<a href="index.php?action=forgottenPasswordPage">
								<small class="text-theme"><strong>Forgot password?</strong></small>
							</a>
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