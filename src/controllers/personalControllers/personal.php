<?php
namespace Application\Controllers\PersonalControllers\Personal;

session_start();
require_once ('src/lib/database.php');
require_once ('src/model/personal.php');
require_once ('src/model/login.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Login\LoginRepository;
use Application\Model\Personal\PersonalRepository;

class Personal
{
    public function updateCurrentProfilPage(int $login_id)
    {
        $personalRepository = new PersonalRepository();
        $personalRepository->connection = new DatabaseConnection;
        $loginRepository = new LoginRepository();
        $loginRepository->connection = new DatabaseConnection();
        $personal = $personalRepository->getProfile($login_id);
        $user = $loginRepository->getUserLoginInfos($login_id);
        require ('templates/personal/updateForm.php');
    }
    public function updateProfile(int $login_id, array $input)
    {
        $personalRepository = new PersonalRepository();
        $personalRepository->connection = new DatabaseConnection;
        $loginRepository = new LoginRepository();
        $loginRepository->connection = new DatabaseConnection();
        $personal = $personalRepository->getProfile($login_id);
        $user = $loginRepository->getUserLoginInfos($login_id);
        require ('templates/personal/updateForm.php');
        if ($input !== null) {
            $grade = null;
            $surname = null;
            $first_name = null;
            $function = null;
            if (
                !empty($input['grade']) && !empty($input['surname']) && !empty($input["firstName"])
                && !empty($input["function"])
            ) {
                $grade = $input['grade'];
                $surname = $input['surname'];
                $first_name = $input['firstName'];
                $function = $input['function'];
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $personalRepository = new PersonalRepository();
            $personalRepository->connection = new DatabaseConnection;
            $bool = $personalRepository->updateProfile($grade, $first_name, $surname, $function, $login_id);
            if ($bool == 0) {
                echo '<script type="text/javascript">
                            updateErrorAlert()
                        </script>';
            } else {
                echo '<script type="text/javascript">
                            updateProfileSuccessAlert()
                        </script>';
            }
        }
    }
    public function UpdateSecurityInfos(array $input, int $login_id)
    {
        $personalRepository = new PersonalRepository();
        $personalRepository->connection = new DatabaseConnection;
        $loginRepository = new LoginRepository();
        $loginRepository->connection = new DatabaseConnection();
        $personal = $personalRepository->getProfile($login_id);
        $user = $loginRepository->getUserLoginInfos($login_id);
        require ('templates/personal/updateForm.php');
        if ($input !== null) {
            $username = null;
            $security_question = null;
            $security_answer = null;

            if (
                !empty($input['username']) && !empty($input["securityquestion"])
                && !empty($input["securityanswer"])
            ) {
                $username = htmlspecialchars($input['username']);
                $security_question = htmlspecialchars($input["securityquestion"]);
                $security_answer = htmlspecialchars($input["securityanswer"]);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $succes = $loginRepository->modifySecurityQA($login_id, $username, $security_question, $security_answer);
            if ($succes == 0) {
                echo '<script type="text/javascript">
                                unknownErrorAlert()
                            </script>';
            } else {
                echo '<script type="text/javascript">
                        updateProfileSuccessAlert()
                            </script>';
            }
        }
    }

    public function UpdateProfilePicture(int $login_id)
    {
        $personalRepository = new PersonalRepository();
        $personalRepository->connection = new DatabaseConnection;
        $loginRepository = new LoginRepository();
        $loginRepository->connection = new DatabaseConnection();
        $personal = $personalRepository->getProfile($login_id);
        $user = $loginRepository->getUserLoginInfos($login_id);
        require ('templates/personal/updateForm.php');

        $filename = $_FILES['pp']['name'];
        $location = 'templates/pagesComponents/navbar/assets/pp/' . $filename;
        if (move_uploaded_file($_FILES['pp']['tmp_name'], $location)) {
            $nameofpp = $filename;
            $success = $personalRepository->updateProfilePicture($nameofpp, $login_id);
            if ($success == 0) {
                echo '<script type="text/javascript">
                                unknownErrorAlert()
                            </script>';
            } else {
                echo '<script type="text/javascript">
                        updateProfileSuccessAlert()
                            </script>';
                if ($personal->picture_name != 'welcome2.png') {
                    unlink('templates/pagesComponents/navbar/assets/pp/' . $personal->picture_name);
                }
            }

        }
    }

}