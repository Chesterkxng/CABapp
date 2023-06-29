<?php require('templates/externalForms/header.php') ?>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-3 text-center" style="background-color:#f0b39c; border-radius: 15px; opacity: 0.8;
						 font-weight:bolder; color:black; ">CHOOSE YOUR FORM?</h3>
						<!-- formulaire pour la connexion -->
						<form action="index.php?action=extPassportadding" method='post' id="form1" class="signin-form">
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">PASSPORT FORM</button>
							</div>
						</form>
							
						<!-- formulaire pour l'inscription-->
						<form action="index.php?action=extVisaAdding" method='post' class="signin-form">
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3">VISA FORM</button>
							</div>
						</form>
						<!-- fin formulaire pour l'inscription-->
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>