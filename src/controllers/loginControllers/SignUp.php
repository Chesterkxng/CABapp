<?php
namespace Application\Controllers\LoginControllers\SignUp;
session_start();
require_once('src/lib/database.php');
require_once('src/model/login.php');
use Application\Lib\Database\DatabaseConnection;
use Application\Model\Login\LoginRepository;
class SignUp
{
    public function signUpPage()
    {
        require('templates/login/signUp.php');
    }
    public function signUp(array $input)
    {
        require('templates/login/signUp.php');
        if ($input !== null) {
            $username = null;
            $password = null;
            $password2 = null;
            $security_question = null;
            $security_answer = null;
            if (
                !empty($input['Username']) && !empty($input['Password']) && !empty($input["Password2"])
                && !empty($input["security_question"]) && !empty($input["security_answer"])
            ) {
                $username = htmlspecialchars($input['Username']);
                $password = htmlspecialchars($input['Password']);
                $password2 = htmlspecialchars($input['Password2']);
                $security_question = htmlspecialchars($input["security_question"]);
                $security_answer = htmlspecialchars($input["security_answer"]);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $loginRepository = new LoginRepository();
            $loginRepository->connection = new DatabaseConnection();
            $isUsernameExist = $loginRepository->isUsernameExist($username);
            if ($isUsernameExist == 0) {
                if ($password == $password2) {
                    $hashed_password = hash('sha256', $password);
                    $succes = $loginRepository->addUser($username, $hashed_password, $security_question, $security_answer);
                    if ($succes == 0) {
                        echo '<script type="text/javascript">
                                unknownErrorAlert()
                            </script>';
                    } else {
                        $login_id = $loginRepository->getLoginID($username);
                        $_SESSION["LOGIN_ID"] = $login_id;
                        $_SESSION['USERNAME'] = $username;
                        echo '<script type="text/javascript">
                                createSuccessAlert()
                            </script>';
                    }
                } else {
                    echo '<script type="text/javascript">
                            mismatchPasswordAlert()
                        </script>';
                }
            } else {
                echo '<script type="text/javascript">
                        usernameAlreadyExistAlert()
                </script>';
            }
        }
    }
}
