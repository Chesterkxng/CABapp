<?php
use Application\Lib\Database\DatabaseConnection;
use Application\Model\Login\LoginRepository;

?>
<?php require('templates/login/header.php') ?>
<div class="row justify-content-center">
	<div class="col-md-6 col-lg-4">
		<div class="login-wrap p-0">
			<h3 class="mb-4 text-center" style="font-weight:400 ;">Forgotten password ?</h3>
			<!-- formulaire pour la vérification -->
			<?php if (isset($_SESSION['USERNAME']) && isset($_SESSION['NEW_PASSWORD'])) {
				$username = $_SESSION['USERNAME'];
				$newPassword = $_SESSION['NEW_PASSWORD'];
				$loginRepository = new LoginRepository();
				$loginRepository->connection = new DatabaseConnection();
				$loginInfos = $loginRepository->getLoginInfos($username);
			} ?>
			<form action="index.php?action=verifyQA" method='post' class="signin-form">
				<div class="form-group">
					<input type="text" readonly class="form-control" autocomplete="off" id="Username" name="Username"
						value="<?= $loginInfos->username ?>">
				</div>
				<div class="form-group">
					<input type="text" readonly class="form-control" autocomplete="off" id="security_answer"
						name="security_question" value="<?= $loginInfos->security_question ?>">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" autocomplete="off" id="security_answer"
						name="security_answer" placeholder="Type your answer" required>
				</div>
				<div class="form-group">
					<button type="submit" class="form-control btn btn-primary submit px-3">Verify your identity</button>
				</div>
			</form>
			<!-- fin du formulaire pour la verification -->
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