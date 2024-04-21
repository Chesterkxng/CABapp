<?php

namespace Application\Controllers\CourierControllers\Message;

require_once ('src/model/message.php');
require_once ('src/lib/database.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Message\MessageRepository;

class MSG
{
    public function MSGArchives()
    {
        $MSGRepository = new MessageRepository();
        $MSGRepository->connection = new DatabaseConnection();
        $incommings = $MSGRepository->getInMessages();
        $outcommings = $MSGRepository->getOutMessages();
        require ('templates/courier/message.php');
    }

    public function MSGAddingForm()
    {
        require ('templates/courier/msgAddingForm.php');
    }

    public function addMSG(array $input)
    {
        require ('templates/courier/msgAddingForm.php');
        if ($input !== null) {
            $reference = null;
            $type = null;
            $object = null;
            $recipient = null;
            $url = null;
            $edition_date = null;
            if (
                !empty($input['reference']) && !empty($input['object']) && !empty($input['recipient'])
                && !empty($input['date']) && !empty($input['type'])
            ) {
                $reference = htmlspecialchars($input['reference']);
                $object = htmlspecialchars($input['object']);
                $recipient = htmlspecialchars($input['recipient']);
                $edition_date = htmlspecialchars($input['date']);
                $type = htmlspecialchars($input['type']);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $filename = $_FILES['uploadfile']['name'];
            switch ($type)
            {
                case 0 :
                    $location = 'docs/MSG/ARV/' . $filename;
                    break;
                case 1 :
                    $location = 'docs/MSG/DPR/' . $filename;
                    break;
            }
            
            if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $location)) {
                $url = $location;

                $MSGRepository = new MessageRepository();
                $MSGRepository->connection = new DatabaseConnection();
                $success = $MSGRepository->addMessage($type, strtoupper($reference), strtoupper($recipient), strtoupper($object), $edition_date, $url);
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

    public function MSGUpdatingForm(int $msg_id)
    {
        $MSGRepository = new MessageRepository();
        $MSGRepository->connection = new DatabaseConnection();
        $message = $MSGRepository->getMSG($msg_id);
        require ('templates/courier/msgUpdatingForm.php');
    }

    public function updateMSG(array $input, int $msg_id)
    {
        $MSGRepository = new MessageRepository();
        $MSGRepository->connection = new DatabaseConnection();
        $message = $MSGRepository->getMSG($msg_id);
        require ('templates/courier/msgUpdatingForm.php');
        if ($input !== null) {
            $reference = null;
            $type = null;
            $object = null;
            $recipient = null;
            $edition_date = null;
            if (
                !empty($input['reference']) && !empty($input['object']) && !empty($input['recipient'])
                && !empty($input['date'] && !empty($input['type']))
            ) {
                $reference = htmlspecialchars($input['reference']);
                $object = htmlspecialchars($input['object']);
                $recipient = htmlspecialchars($input['recipient']);
                $edition_date = htmlspecialchars($input['date']);
                $type = htmlspecialchars($input['type']);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $success = $MSGRepository->updateMessage($type, strtoupper($reference), strtoupper($recipient), strtoupper($object), $edition_date, $msg_id);
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

    public function sendDeletePopup(int $msg_id)
    {
        $MSGRepository = new MessageRepository();
        $MSGRepository->connection = new DatabaseConnection();
        $incommings = $MSGRepository->getInMessages();
        $outcommings = $MSGRepository->getOutMessages();
        require ('templates/courier/message.php');
        echo '<script type="text/javascript">
            deletingConfirmAlert()
         </script>';

    }
    public function deleteMSG(int $msg_id)
    {
        $MSGRepository = new MessageRepository();
        $MSGRepository->connection = new DatabaseConnection();
        $incommings = $MSGRepository->getInMessages();
        $outcommings = $MSGRepository->getOutMessages();
        require ('templates/courier/message.php');
        $message = $MSGRepository->getMSG($msg_id);
        $status = unlink($message->url);
        $bool = $MSGRepository->deleteMSG($msg_id);
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
