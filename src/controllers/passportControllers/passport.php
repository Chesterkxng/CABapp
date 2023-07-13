<?php
namespace Application\Controllers\PassportControllers\Passport;

session_start();
require_once('src/lib/database.php');
require_once('src/model/passport.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Passport\PassportRepository;

class Passport
{
    public function passportsList()
    {
        $passportRepository = new PassportRepository();
        $passportRepository->connexion = new DatabaseConnection();
        $passports = $passportRepository->getPassports();

        require('templates/passport/passportList.php');
    }

    public function passportAddingForm()
    {
        require('templates/passport/addingForm.php');
    }

    public function addPassport(array $input)
    {
        require('templates/passport/addingForm.php');
        if ($input !== null) {
            $passnumber = null;
            $grade = null;
            $surname = null;
            $firstname = null;
            $delivery_date = null;
            $expiration_date = null;
            if (
                !empty($input['passnumber']) && !empty($input['grade']) && !empty($input['surname'])
                && !empty($input['firstName']) && !empty($input['deliverydate']) && !empty($input['expirationdate'])

            ) {
                $passnumber = htmlspecialchars($input['passnumber']);
                $grade = htmlspecialchars($input['grade']);
                $surname = htmlspecialchars($input['surname']);
                $firstname = htmlspecialchars($input['firstName']);
                $delivery_date = htmlspecialchars($input['deliverydate']);
                $expiration_date = htmlspecialchars($input['expirationdate']);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $passportRepository = new PassportRepository();
            $passportRepository->connexion = new DatabaseConnection();
            $success = $passportRepository->addPassport(strtoupper($passnumber), strtoupper($grade), strtoupper($surname), strtoupper($firstname), $delivery_date, $expiration_date);
            if ($success == 0) {
                echo '<script type="text/javascript">
                        addingErrorAlert()
                    </script>';
            } else {
                echo '<script type="text/javascript">
                        addingSuccessAlert()
                    </script>';
            }
        }
    }
    public function passportUpdateForm(int $passport_id)
    {
        $passportRepository = new PassportRepository();
        $passportRepository->connexion = new DatabaseConnection();
        $passport = $passportRepository->getPassport($passport_id);
        require('templates/passport/updateForm.php');
    }

    public function updatePassport(array $input, int $passport_id)
    {
        $passportRepository = new PassportRepository();
        $passportRepository->connexion = new DatabaseConnection();
        $passport = $passportRepository->getPassport($passport_id);
        require('templates/passport/updateForm.php');
        if ($input !== null) {
            $passnumber = null;
            $grade = null;
            $surname = null;
            $firstname = null;
            $delivery_date = null;
            $expiration_date = null;
            if (
                !empty($input['passnumber']) && !empty($input['grade']) && !empty($input['surname'])
                && !empty($input['firstName']) && !empty($input['deliverydate']) && !empty($input['expirationdate'])

            ) {
                $passnumber = htmlspecialchars($input['passnumber']);
                $grade = htmlspecialchars($input['grade']);
                $surname = htmlspecialchars($input['surname']);
                $firstname = htmlspecialchars($input['firstName']);
                $delivery_date = htmlspecialchars($input['deliverydate']);
                $expiration_date = htmlspecialchars($input['expirationdate']);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $success = $passportRepository->updatePassport(strtoupper($passnumber), strtoupper($grade), strtoupper($surname), strtoupper($firstname), $delivery_date, $expiration_date, $passport_id);
            if ($success == 0) {
                echo '<script type="text/javascript">
                    updateErrorAlert()
                    </script>';
                ;
            } else {
                echo '<script type="text/javascript">
                        updateSuccessAlert()
                    </script>';
            }
        }
    }
    public function sendDeletePopup(int $passport_id)
    {
        $passportRepository = new PassportRepository();
        $passportRepository->connexion = new DatabaseConnection();
        $passports = $passportRepository->getPassports();
        require('templates/passport/passportList.php');
        echo '<script type="text/javascript">
            deletingConfirmAlert()
         </script>';

    }
    public function deletePassport(int $passport_id)
    {
        $passportRepository = new PassportRepository();
        $passportRepository->connexion = new DatabaseConnection();
        $passports = $passportRepository->getPassports();
        require('templates/passport/passportList.php');
        $bool = $passportRepository->deletePassport($passport_id);
        if ($bool == 1) {
            echo '<script type="text/javascript">
                        deletingSuccessAlert()
                    </script>';
        } else {
            echo '<script type="text/javascript">
                    deletingErrorAlert()
                </script>';
        }

    }


}