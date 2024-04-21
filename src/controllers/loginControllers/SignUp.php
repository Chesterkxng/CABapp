<?php

namespace Application\Controllers\LoginControllers\SignUp;

session_start();
require_once ('src/lib/database.php');
require_once ('src/model/login.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Login\LoginRepository;

class SignUp
{
    public function userAddingForm()
    {
        require ('templates/accessControls/addingForm.php');
    }
    public function addUser(array $input)
    {
        require ('templates/accessControls/addingForm.php');
        if ($input !== null) {
            $username = null;
            $password = null;
            $profil_type = null;
            $security_question = null;
            $security_answer = null;

            if (
                !empty($input['username']) && !empty($input['password'])
                && !empty($input["securityquestion"]) && !empty($input["securityanswer"] && !empty($input['profile_type']))
            ) {
                $username = htmlspecialchars($input['username']);
                $password = htmlspecialchars($input['password']);
                $security_question = htmlspecialchars($input["securityquestion"]);
                $security_answer = htmlspecialchars($input["securityanswer"]);
                $profil_type = htmlspecialchars($input['profile_type']);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $loginRepository = new LoginRepository();
            $loginRepository->connection = new DatabaseConnection();
            $isUsernameExist = $loginRepository->isUsernameExist($username);
            if ($isUsernameExist == 0) {
                $hashed_password = hash('sha256', $password);
                $succes = $loginRepository->addUser($username, $hashed_password, $security_question, $security_answer, $profil_type);
                if ($succes == 0) {
                    echo '<script type="text/javascript">
                                unknownErrorAlert()
                            </script>';
                } else {
                    echo '<script type="text/javascript">
                                createSuccessAlert()
                            </script>';
                }
            } else {
                echo '<script type="text/javascript">
                        usernameAlreadyExistAlert()
                </script>';
            }
        }
    }

    public function usersList()
    {
        $loginRepository = new LoginRepository();
        $loginRepository->connection = new DatabaseConnection();
        $users = $loginRepository->getUsersInfos();
        require ('templates/accessControls/usersList.php');
    }

    public function updateUserLoginForm(int $login_id)
    {
        $loginRepository = new LoginRepository();
        $loginRepository->connection = new DatabaseConnection();
        $user = $loginRepository->getUserLoginInfos($login_id);
        require ('templates/accessControls/updateForm.php');
    }


    public function UpdateUserSU(array $input, int $user_id)
    {
        $loginRepository = new LoginRepository();
        $loginRepository->connection = new DatabaseConnection();
        $user = $loginRepository->getUserLoginInfos($user_id);
        require ('templates/accessControls/updateForm.php');
        if ($input !== null) {
            $username = null;
            $profil_type = null;
            $security_question = null;
            $security_answer = null;

            if (
                !empty($input['username']) && !empty($input["securityquestion"])
                && !empty($input["securityanswer"] && !empty($input['profile_type']))
            ) {
                $username = htmlspecialchars($input['username']);
                $security_question = htmlspecialchars($input["securityquestion"]);
                $security_answer = htmlspecialchars($input["securityanswer"]);
                $profil_type = htmlspecialchars($input['profile_type']);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $succes = $loginRepository->updateLoginInfoSU($username, $security_question, $security_answer, $profil_type, $user_id);
            print_r($succes);
            if ($succes == 0) {
                echo '<script type="text/javascript">
                                unknownErrorAlert()
                            </script>';
            } else {
                echo '<script type="text/javascript">
                                updateSuccessAlert()
                            </script>';
            }
        }
    }
}