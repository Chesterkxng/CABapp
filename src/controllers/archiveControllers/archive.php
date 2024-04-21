<?php

namespace Application\Controllers\ArchiveControllers\Archive;

require_once ('src/model/archive.php');
require_once ('src/lib/database.php');
use Application\Lib\Database\DatabaseConnection;
use Application\Model\Archive\ArchiveRepository;


class Archive
{
    public function archiveAddingForm()
    {
        require ('templates/archives/addingForm.php');
    }

    public function addArchive(array $input)
    {
        require ('templates/archives/addingForm.php');
        if ($input !== null) {
            $object = null;
            $details = null;
            $edition_date = null;
            $url = null;
            if (
                !empty($input['object']) && !empty($input['details'])
                && !empty($input['date'])

            ) {
                $object = htmlspecialchars($input['object']);
                $details = htmlspecialchars($input['details']);
                $edition_date = htmlspecialchars($input['date']);

            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }

            $filename = $_FILES['uploadfile']['name'];
            $location = 'docs/archives/' . $filename;
            if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $location)) {
                $url = $location;

                $ArchiveRepository = new ArchiveRepository();
                $ArchiveRepository->connection = new DatabaseConnection();
                $success = $ArchiveRepository->addDoc(strtoupper($object), strtoupper($details), $edition_date, $url);
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

    public function docArchives()
    {
        $ArchivreRepository = new ArchiveRepository();
        $ArchivreRepository->connection = new DatabaseConnection();
        $docs = $ArchivreRepository->getDocs();
        require ('templates/archives/docArchives.php');
    }
}