<?php

namespace Application\Controllers\LoginControllers\SignIn;

session_start();
require_once ('src/lib/database.php');
require_once ('src/model/login.php');
require_once ('src/model/personal.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Login\LoginRepository;
use Application\Model\Personal\PersonalRepository;

class SignIn
{
    public function signInPage()
    {
        require ('templates/login/signIn.php');
    }
    public function connect(array $input) // modifier le html pour que les valeurs puisse etre recus 
    {
        require ('templates/login/signIn.php');
        if ($input !== null) {
            $username = null;
            $password = null;
            if (!empty($input['Username']) && !empty($input['Password'])) {
                $username = htmlspecialchars($input['Username']);
                $password = htmlspecialchars($input['Password']);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $loginRepository = new LoginRepository();
            $loginRepository->connection = new DatabaseConnection();
            $bool = $loginRepository->isUsernameExist($username);
            if ($bool == 1) {
                $hashed_password = hash('sha256', $password);
                $passW = $loginRepository->getPassword($username);
                if ($passW == $hashed_password) {
                    $profileRepository = new PersonalRepository();
                    $profileRepository->connection = new DatabaseConnection();
                    $loginInfos = $loginRepository->getLoginInfos($username);
                    $login_id = $loginInfos->login_id;
                    $profil_type = $loginInfos->profil_type;
                    $isFilledProfile = $profileRepository->isProfileFilled($login_id);

                    if ($isFilledProfile == 1) {

                        $personal_id = $profileRepository->getPersonalID($login_id);
                        $_SESSION['LOGIN_ID'] = $login_id;
                        $_SESSION['ISAUTH'] = 1;
                        $_SESSION['PERSONAL_ID'] = $personal_id;
                        $_SESSION['profile_type'] = $profil_type;

                        echo '<script type="text/javascript">
                                loginSuccesAlert()
                            </script>';
                    } else {
                        $_SESSION['LOGIN_ID'] = $login_id;
                        $_SESSION['ISAUTH'] = 1;
                        echo '<script type="text/javascript">
                                redirectProfileAlert()
                            </script>';
                    }
                } else {
                    echo '<script type="text/javascript">
                            incorrectPasswordAlert()
                            </script>';
                }
            } else {
                echo '<script type="text/javascript">
                        userNotFoundAlert()
                        </script>';
            }
        }
    }
}