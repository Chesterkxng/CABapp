<?php require('templates/login/header.php') ?>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center">New account ?</h3>
						<!-- formulaire pour l'inscription-->
						<form action="index.php?action=signUp" method='post' class="signin-form">
							<div class="form-group">
								<input type="text" class="form-control" autocomplete="off" id="Username" name="Username" placeholder="Username" required>
							</div>
							<div class="form-group">
								<input id="password-field" type="password" id="Password" name="Password" class="form-control" placeholder="Password" required>
							</div>
							<div class="form-group">
								<input id="password-field" type="password" id="Password2" name="Password2" class="form-control" placeholder="Confirm password" required>
							</div>
							<div class="form-group">
								<select id="password-field" id="security_question" name="security_question" class="form-control" required>
									<option class="option" value=""> Choose your question </option>
									<option class="option" value="Quel est le nom de votre meilleur ami ?">Quel est le nom de votre meilleur ami ?</option>
									<option class="option" value="Quel est le nom de votre animal de compagnie ?">Quel est le nom de votre animal de compagnie ?</option>
									<option class="option" value="Quel est le métier de votre grand-père ?">Quel est le métier de votre grand-père ?</option>
								</select>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" autocomplete="off" id="security_answer" name="security_answer" placeholder="Type your answer" required>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">Create your account</button>
							</div>
						</form>
						<!-- fin du formulaire pour l'inscription-->
						<h3 class="mb-4 text-center">have an account ?</h3>
						<!-- formulaire pour la connexion -->
						<form action="index.php?action=signInPage" method='post' class="signin-form">
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
							</div>
						</form>
						<!-- fin du formulaire pour la connexion-->
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php require('templates/pagesComponents/popup/login.php') ?>
</body>
</html>