<?php

namespace Application\Controllers\CourierControllers\NDS;

require_once ('src/model/nds.php');
require_once ('src/lib/database.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\NDS\NDSRepository;

class NDS
{
    public function NDSArchives()
    {
        $NDSRepository = new NDSRepository();
        $NDSRepository->connection = new DatabaseConnection();
        $NDSs = $NDSRepository->getNDSs();
        require ('templates/courier/nds.php');
    }

    public function NDSAddingForm()
    {
        require ('templates/courier/ndsAddingForm.php');
    }

    public function addNDS(array $input)
    {
        require ('templates/courier/ndsAddingForm.php');
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
            $location = 'docs/NDS/' . $filename;
            if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $location)) {
                $url = $location;

                $NDSRepository = new NDSRepository();
                $NDSRepository->connection = new DatabaseConnection();
                $success = $NDSRepository->addNDS(strtoupper($reference), strtoupper($recipient), strtoupper($object), $edition_date, $url);
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

    public function NDSUpdatingForm(int $nds_id)
    {
        $NDSRepository = new NDSRepository();
        $NDSRepository->connection = new DatabaseConnection();
        $NDS = $NDSRepository->getNDS($nds_id);
        require ('templates/courier/ndsUpdatingForm.php');
    }

    public function updateNDS(array $input, int $nds_id)
    {
        $NDSRepository = new NDSRepository();
        $NDSRepository->connection = new DatabaseConnection();
        $NDS = $NDSRepository->getNDS($nds_id);
        require ('templates/courier/ndsUpdatingForm.php');
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
            $success = $NDSRepository->updateNDS(strtoupper($reference), strtoupper($recipient), strtoupper($object), $edition_date, $nds_id);
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

    public function sendDeletePopup(int $nds_id)
    {
        $NDSRepository = new NDSRepository();
        $NDSRepository->connection = new DatabaseConnection();
        $NDSs = $NDSRepository->getNDSs();
        require ('templates/courier/nds.php');
        echo '<script type="text/javascript">
            deletingConfirmAlert()
         </script>';

    }
    public function deleteNDS(int $nds_id)
    {
        $NDSRepository = new NDSRepository();
        $NDSRepository->connection = new DatabaseConnection();
        $NDSs = $NDSRepository->getNDSs();
        require ('templates/courier/nds.php');
        $NDS = $NDSRepository->getNDS($nds_id);
        $status = unlink($NDS->url);
        $bool = $NDSRepository->deleteNDS($nds_id);
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
