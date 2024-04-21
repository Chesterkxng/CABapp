<?php
namespace Application\Controllers\LoginControllers\SecurityQA;

session_start();
require_once ('src/lib/database.php');
require_once ('src/model/login.php');
use Application\Lib\Database\DatabaseConnection;
use Application\Model\Login\LoginRepository;

class SecurityQA
{
    public function SecurityQAPage()
    {
        require ('templates/login/securityQA.php');
    }
    public function VerifiyQA(array $input)
    {
        require ('templates/login/securityQA.php');
        if ($input !== null) {
            $username = null;
            $security_question = null;
            $security_answer = null;
            if (!empty($input['Username']) && !empty($input['security_question']) && !empty($input["security_answer"])) {
                $username = htmlspecialchars($input['Username']);
                $security_question = htmlspecialchars($input['security_question']);
                $security_answer = htmlspecialchars($input['security_answer']);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $loginRepository = new LoginRepository();
            $loginRepository->connection = new DatabaseConnection();
            $goodAnswer = $loginRepository->getSecurityAnwer($username);
            if ($security_answer == $goodAnswer) {
                if (isset($_SESSION['NEW_PASSWORD'])) {
                    $newPassword = $_SESSION['NEW_PASSWORD'];
                    $bool = $loginRepository->modifyPassword($username, $newPassword);
                    if ($bool == 0) {
                        echo '<script type="text/javascript">
                                unknownErrorAlert()
                            </script>';

                    } else {
                        echo '<script type="text/javascript">
                                resetSuccessAlert()
                            </script>';
                        unset($_SESSION['NEW_PASSWORD']);
                    }
                }
            } else {
                echo '<script type="text/javascript">
                        answerErrorAlert()
                            </script>';
            }
        }
    }
}