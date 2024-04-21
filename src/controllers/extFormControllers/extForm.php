<?php
namespace Application\Controllers\extFormControllers\extForm;

require_once ('src/lib/database.php');
require_once ('src/model/passport.php');
require_once ('src/model/visa.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Visa\VisaRepository;
use Application\Model\Passport\PassportRepository;

class extForm
{
    public function loadExtPage()
    {
        require ('templates/externalForms/extFomSelection.php');
    }
    public function PassportAddingForm()
    {
        require ('templates/externalForms/passportForm.php');
    }
    public function addPassport(array $input)
    {
        require ('templates/externalForms/passportForm.php');
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
    public function visaAddingForm()
    {
        require ('templates/externalForms/visaForm.php');
    }
    public function addVisa(array $input)
    {
        require ('templates/externalForms/visaForm.php');
        if ($input !== null) {
            $visanumber = null;
            $passnumber = null;
            $delivery_date = null;
            $expiration_date = null;
            if (
                !empty($input['passnumber']) && !empty($input['visanumber'])
                && !empty($input['deliverydate']) && !empty($input['expirationdate'])

            ) {
                $passnumber = htmlspecialchars($input['passnumber']);
                $visanumber = htmlspecialchars($input['visanumber']);
                $delivery_date = htmlspecialchars($input['deliverydate']);
                $expiration_date = htmlspecialchars($input['expirationdate']);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $visaRepository = new VisaRepository();
            $visaRepository->connexion = new DatabaseConnection();
            $success = $visaRepository->addVisa(strtoupper($visanumber), strtoupper($passnumber), $delivery_date, $expiration_date);
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
}