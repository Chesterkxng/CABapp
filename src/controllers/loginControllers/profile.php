<?php
namespace Application\Controllers\LoginControllers\Profile;

session_start();
require_once ('src/lib/database.php');
require_once ('src/model/personal.php');
use Application\Lib\Database\DatabaseConnection;
use Application\Model\Personal\PersonalRepository;

class Profile
{
    // load the Profile Completion Page after the SIGN UP
    public function signUpProfilePage()
    {
        require ('templates/login/profil.php');
    }
    public function profileCompletion(array $input)
    {
        require ('templates/login/profil.php');
        if ($input !== null) {
            $grade = null;
            $surname = null;
            $first_name = null;
            $function = null;
            if (
                !empty($input['grade']) && !empty($input['surname']) && !empty($input["firstName"])
                && !empty($input["function"])
            ) {
                $grade = htmlspecialchars($input['grade']);
                $surname = htmlspecialchars($input['surname']);
                $first_name = htmlspecialchars($input['firstName']);
                $function = htmlspecialchars($input['function']);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
        }
        if (isset($_SESSION['LOGIN_ID'])) {
            $login_id = $_SESSION['LOGIN_ID'];
            $personalRepository = new PersonalRepository();
            $personalRepository->connection = new DatabaseConnection();
            $bool = $personalRepository->addProfile($login_id, $grade, $first_name, $surname, $function);
            if ($bool == 0) {
                echo '<script type="text/javascript">
                    profileCompletionErrorAlert()
                </script>';
            } else {
                echo '<script type="text/javascript">
                    profileCompletionSuccessAlert()
                </script>';
            }
        }
    }
}