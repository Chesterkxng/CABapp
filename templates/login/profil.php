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