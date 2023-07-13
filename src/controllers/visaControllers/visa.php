<?php
namespace Application\Controllers\VisaControllers\Visa;

session_start();
require_once('src/lib/database.php');
require_once('src/model/visa.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Visa\VisaRepository;

class Visa
{
    public function visasList()
    {
        $visaRepository = new VisaRepository();
        $visaRepository->connexion = new DatabaseConnection();
        $visas = $visaRepository->getVisas();

        require('templates/visa/visaList.php');
    }

    public function visaAddingForm()
    {
        require('templates/visa/addingForm.php');
    }

    public function addVisa(array $input)
    {
        require('templates/visa/addingForm.php');
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
    public function visaUpdateForm(int $visa_id)
    {
        $visaRepository = new VisaRepository();
        $visaRepository->connexion = new DatabaseConnection();
        $visa = $visaRepository->getVisa($visa_id);
        require('templates/visa/updateForm.php');
    }

    public function updateVisa(array $input, int $visa_id)
    {
        $visaRepository = new VisaRepository();
        $visaRepository->connexion = new DatabaseConnection();
        $visa = $visaRepository->getVisa($visa_id);
        require('templates/visa/updateForm.php');
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
            $success = $visaRepository->updateVisa(strtoupper($visanumber), strtoupper($passnumber), $delivery_date, $expiration_date, $visa_id);
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
    public function sendDeletePopup(int $visa_id)
    {
        $visaRepository = new VisaRepository();
        $visaRepository->connexion = new DatabaseConnection();
        $visas = $visaRepository->getVisas();
        require('templates/visa/visaList.php');
        echo '<script type="text/javascript">
            deletingConfirmAlert()
         </script>';

    }
    public function deleteVisa(int $visa_id)
    {
        $visaRepository = new VisaRepository();
        $visaRepository->connexion = new DatabaseConnection();
        $visas = $visaRepository->getVisas();
        require('templates/visa/visaList.php');
        $bool = $visaRepository->deleteVisa($visa_id);
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