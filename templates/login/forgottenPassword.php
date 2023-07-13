<?php require('templates/login/header.php') ?>
<div class="row justify-content-center">
	<div class="col-md-6 col-lg-4">
		<div class="login-wrap p-0">
			<h3 class="mb-4 text-center" style="font-weight:400 ;">Forgotten password ?</h3>
			<!-- formulaire pour la reinitialisation -->
			<form action="index.php?action=redirectQA" method='post' class="signin-form">
				<div class="form-group">
					<input type="text" class="form-control" autocomplete="off" id="Username" name="Username"
						placeholder=" Username" required>
				</div>
				<div class="form-group">
					<input id="password-field" type="password" id="Password" name="Password" class="form-control"
						placeholder=" New password" required>
				</div>
				<div class="form-group">
					<input id="password-field" type="password" id="Password2" name="Password2" class="form-control"
						placeholder="Confirm your new password" required>
				</div>
				<div class="form-group">
					<button type="submit" class="form-control btn btn-primary submit px-3">Reset your password</button>
				</div>
			</form>
			<!-- fin du formulaire pour la reinitialisation -->
			<h3 class="mb-4 text-center">have an account ?</h3>
			<!-- formulaire pour la connexion -->
			<form action="index.php?action=signInPage" method='post' class="signin-form">
				<div class="form-group">
					<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
				</div>
			</form>
			<!-- fin du formulaire pour l'inscription-->
		</div>
	</div>
</div>
</div>
</section>
<?php require('templates/pagesComponents/popup/login.php') ?>
</body>

</html>