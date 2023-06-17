<?php
namespace Application\Controllers\PersonalControllers\Personal;
session_start();
require_once('src/lib/database.php');
require_once('src/model/personal.php');
use Application\Lib\Database\DatabaseConnection;
use Application\Model\Personal\PersonalRepository;
class Personal
{
    public function updateCurrentProfilPage(int $login_id)
    {
        $personalRepository = new PersonalRepository();
        $personalRepository->connection = new DatabaseConnection;
        $personal = $personalRepository->getProfile($login_id);
        require('templates/personal/updateForm.php');
    }
    public function updateProfile(int $login_id, array $input)
    {
        require('templates/personal/updateForm.php');
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
    // load the adding form 
    public function addingPersonalPage()
    {
        require('templates/personal/addingForm.php');
    }
}
