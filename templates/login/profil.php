<?php require('templates/login/header.php') ?>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center" style="font-weight:400;">Who are you?</h3>
						<!-- formulaire pour l'inscription-->
						<form action="index.php?action=profileCompletion" method='post' class="signin-form">
							<div class="form-group">
								<select id="password-field" id="grade" name="grade" class="form-control" required>
									<option class="option" value="">Select your grade</option>
									<option class="option" value="Colonel- Major">Colonel- Major</option>
									<option class="option" value="Colonel">Colonel</option>
									<option class="option" value="Lieutenant-Colonel">Lieutenant-Colonel</option>
									<option class="option" value="Commandant">Commandant</option>
									<option class="option" value="Capitaine">Capitaine</option>
									<option class="option" value="Lieutenant">Lieutenant</option>
									<option class="option" value="Sous-Lieutenant">Sous-Lieutenant</option>
								</select>
							</div>
							<div class="form-group">
								<input id="password-field" autocomplete="off" type="text" id="surname" name="surname" class="form-control" placeholder="Surname" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" autocomplete="off" id="firstName" name="firstName" placeholder="First Name" required>
							</div>
							<div class="form-group">
								<input id="password-field" autocomplete="off" type="text" id="function" name="function" class="form-control" placeholder="Function" required>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">Complete your profile</button>
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