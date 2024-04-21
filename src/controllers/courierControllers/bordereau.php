<?php

namespace Application\Controllers\CourierControllers\BE;

require_once ('src/model/bordereau.php');
require_once ('src/lib/database.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Bordereau\BordereauRepository;

class BE
{
    public function BEArchives()
    {
        $BERepository = new BordereauRepository();
        $BERepository->connection = new DatabaseConnection();
        $BEs = $BERepository->getBordereau();
        require ('templates/courier/bordereau.php');
    }

    public function BEAddingForm()
    {
        require ('templates/courier/beAddingForm.php');
    }

    public function addBE(array $input)
    {
        require ('templates/courier/beAddingForm.php');
        if ($input !== null) {
            $reference = null;
            $object = null;
            $recipient = null;
            $url = null;
            $edition_date = null;
            if (
                !empty($input['reference']) && !empty($input['object']) && !empty($input['recipient'])
                && !empty($input['date'])
            ) {
                $reference = htmlspecialchars($input['reference']);
                $object = htmlspecialchars($input['object']);
                $recipient = htmlspecialchars($input['recipient']);
                $edition_date = htmlspecialchars($input['date']);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $filename = $_FILES['uploadfile']['name'];
            $location = 'docs/BE/' . $filename;
            if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $location)) {
                $url = $location;

                $BERepository = new BordereauRepository();
                $BERepository->connection = new DatabaseConnection();
                $success = $BERepository->addBordereau(strtoupper($reference), strtoupper($recipient), strtoupper($object), $edition_date, $url);
                if ($success == 0) {
                    echo '<script type="text/javascript">
                            addingErrorAlert()
                        </script>';
                } else {
                    echo '<script type="text/javascript">
                            addingSuccessAlert()
                        </script>';
                }
            } else {
                echo '<script type="text/javascript">
                            addingErrorAlert()
                   </script>';
            }
        }
    }

    public function BEUpdatingForm(int $be_id)
    {
        $BERepository = new BordereauRepository();
        $BERepository->connection = new DatabaseConnection();
        $BE = $BERepository->getBE($be_id);
        require ('templates/courier/beUpdatingForm.php');
    }

    public function updateBE(array $input, int $be_id)
    {
        $BERepository = new BordereauRepository();
        $BERepository->connection = new DatabaseConnection();
        $BE = $BERepository->getBE($be_id);
        require ('templates/courier/beUpdatingForm.php');
        if ($input !== null) {
            $reference = null;
            $object = null;
            $recipient = null;
            $edition_date = null;
            if (
                !empty($input['reference']) && !empty($input['object']) && !empty($input['recipient'])
                && !empty($input['date'])
            ) {
                $reference = htmlspecialchars($input['reference']);
                $object = htmlspecialchars($input['object']);
                $recipient = htmlspecialchars($input['recipient']);
                $edition_date = htmlspecialchars($input['date']);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $success = $BERepository->updateBordereau(strtoupper($reference), strtoupper($recipient), strtoupper($object), $edition_date, $be_id);
            if ($success == 0) {
                echo '<script type="text/javascript">
                            updateErrorAlert()
                        </script>';
            } else {
                echo '<script type="text/javascript">
                            updateSuccessAlert()
                        </script>';
            }
        }
    }

    public function sendDeletePopup(int $be_id)
    {
        $BERepository = new BordereauRepository();
        $BERepository->connection = new DatabaseConnection();
        $BEs = $BERepository->getBordereau();
        require ('templates/courier/bordereau.php');
        echo '<script type="text/javascript">
            deletingConfirmAlert()
         </script>';

    }
    public function deleteBE(int $be_id)
    {
        $BERepository = new BordereauRepository();
        $BERepository->connection = new DatabaseConnection();
        $BEs = $BERepository->getBordereau();
        require ('templates/courier/bordereau.php');
        $BE = $BERepository->getBE($be_id);
        $status = unlink($BE->url);
        $bool = $BERepository->deleteBE($be_id);
        if ($bool == 1 && $status == 1) {
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
