<?php require('templates/login/header.php') ?>
<div class="row justify-content-center">
	<div class="col-md-6 col-lg-4">
		<div class="login-wrap p-0">
			<h3 class="mb-4 text-center">Have an account?</h3>
			<!-- formulaire pour la connexion -->
			<form action="index.php?action=signIn" method='post' id="form1" class="signin-form">
				<div class="form-group">
					<input type="text" class="form-control" autocomplete="off" id="Username" name="Username"
						placeholder="Username" required>
				</div>
				<div class="form-group">
					<input id="password-field" type="password" id="Password" name="Password" class="form-control"
						placeholder="Password" required>
				</div>
				<div class="form-group">
					<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
				</div>
				<div class="form-group d-md-flex">
					<div class="w-50">
						<label class="checkbox-wrap checkbox-primary">Remember Me
							<input type="checkbox" checked>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="w-50 text-md-right">
						<a href="index.php?action=forgottenPasswordPage" id='resetlink' style="color: #fff">Forgot
							Password</a>
					</div>
				</div>
			</form>
			<?php
			?>
			<!-- fin du formulaire pour la connexion-->
		</div>
	</div>
</div>
</div>
</section>
<?php require('templates/pagesComponents/popup/login.php') ?>
</body>

</html>