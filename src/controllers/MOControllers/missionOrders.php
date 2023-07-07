<?php 

namespace Application\Controllers\MOControllers\MissionOrders; 
require_once('src/lib/database.php'); 
require_once('src/model/om.php'); 

use Application\Lib\Database\DatabaseConnection; 
use Application\Model\OM\OMRepository; 

class MissionOrders 
{
    public function extMOgenerateForm(){
        require("templates/OM/ExMO_GenerateForm.php"); 
    }
    public function saveExtMO(array $input){
        require("templates/OM/ExMO_GenerateForm.php");
        if ($input !== null) {
            $grade = null ; 
            $name = null;
            $PN = null;
            $country = null;
            $city = null;
            $object = null ;
            $departure_date = null;
            $return_date = null;
            if (
                !empty($input['grade']) && !empty($input['name']) && !empty($input['PN'])
                && !empty($input['country']) && !empty($input['city'])
                && !empty($input['object']) && !empty($input['departuredate']) && !empty($input['returndate'] )
               
            ) {
                $recipient = htmlspecialchars($input['grade'])." ".htmlspecialchars($input['name'])." MLE : ".htmlspecialchars($input['PN']);
                $country = htmlspecialchars($input['country']);
                $city = htmlspecialchars($input['city']);
                $companion = "SEUL";
                $object = htmlspecialchars($input['object']);
                $means = "VOIE AERIENNE CIVILE";
                $departure_date = htmlspecialchars($input['departuredate']);
                $return_date = htmlspecialchars($input['returndate']);
                $type = "EXTERIEUR";
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $OMRepository = new OMRepository();
            $OMRepository->connection = new DatabaseConnection();
            $success = $OMRepository->addOM(strtoupper($recipient), strtoupper($country), strtoupper($city), strtoupper($companion), strtoupper($object), strtoupper($means),
            strtoupper($departure_date), strtoupper($return_date),strtoupper($type));
            if ($success == 0) {
                echo '<script type="text/javascript">
                        addingErrorAlert()
                    </script>';
            } else {
                echo '<script type="text/javascript">
                    addingExtSuccessAlert()()
                    </script>';
            }
        }


    }

    public function intMOgenerateForm(){
        require("templates/OM/inMO_GenerateForm.php"); 
    } public function saveIntOM(array $input){
        require("templates/OM/inMO_GenerateForm.php"); 
        if ($input !== null) {
            $grade = null ; 
            $name = null;
            $PN = null;
            $companions_number = null; 
            $companions = null;
            $country = null;
            $city = null;
            $object = null ;
            $means = null; 
            $departure_date = null;
            $return_date = null;
            if (
                !empty($input['grade']) && !empty($input['name']) && !empty($input['PN'])
                && !empty($input['city']) && !empty($input['means']) && !empty($input['companion'])
                && !empty($input['object']) && !empty($input['departuredate']) && !empty($input['returndate'] )
               
            ) {
                $recipient = htmlspecialchars($input['grade'])." ".htmlspecialchars($input['name'])." MLE : ".htmlspecialchars($input['PN']);
                $country = "COTE D'IVOIRE";
                $city = htmlspecialchars($input['city']);
                $object = htmlspecialchars($input['object']);
                $means = htmlspecialchars($input['means']);
                $departure_date = htmlspecialchars($input['departuredate']);
                $return_date = htmlspecialchars($input['returndate']);
                $type = "INTERIEUR";
                $companions_number = htmlspecialchars($input['companion']); 

                switch ($companions_number){
                    case "SEUL": 
                        $companions = "SEUL"; 
                        break; 
                    case "UN (01) MILITAIRE": 
                        $companions = htmlspecialchars($input['name1'])." MLE : ".htmlspecialchars($input['mat1']); 
                        break ; 
                    case "DEUX (02) MILITAIRES": 
                        $companions = htmlspecialchars($input['name1'])." MLE : ".htmlspecialchars($input['mat1']).'\n'.
                        htmlspecialchars($input['name2'])." MLE : ".htmlspecialchars($input['mat2']); 
                        break ; 
                    case "TROIS (03) MILITAIRES": 
                        $companions = htmlspecialchars($input['name1'])." MLE : ".htmlspecialchars($input['mat1']).'\n'.
                        htmlspecialchars($input['name2'])." MLE : ".htmlspecialchars($input['mat2']).'\n'.
                        htmlspecialchars($input['name3'])." MLE : ".htmlspecialchars($input['mat3']);
                        break ; 
                }


            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $OMRepository = new OMRepository();
            $OMRepository->connection = new DatabaseConnection();
            $success = $OMRepository->addOM(strtoupper($recipient), strtoupper($country), strtoupper($city), strtoupper($companions), strtoupper($object), strtoupper($means),
            strtoupper($departure_date), strtoupper($return_date),strtoupper($type));
            if ($success == 0) {
                echo '<script type="text/javascript">
                        addingErrorAlert()
                    </script>';
            } else {
                echo '<script type="text/javascript">
                    addingIntSuccessAlert()
                    </script>';
            }
        }


    }

    public function DOMgenerateForm(){
        require("templates/OM/DOM_GenerateForm.php"); 
        
    }
    public function saveDOM(array $input){
        require("templates/OM/DOM_GenerateForm.php"); 
        if ($input !== null) {
            $grade = null ; 
            $name = null;
            $PN = null;
            $country = null;
            $city = null;
            $object = null ;
            $departure_date = null;
            $return_date = null;
            if (
                !empty($input['grade']) && !empty($input['name']) && !empty($input['PN'])
                && !empty($input['country']) && !empty($input['city'])
                && !empty($input['object']) && !empty($input['departuredate']) && !empty($input['returndate'] )
               
            ) {
                $recipient = htmlspecialchars($input['grade'])." ".htmlspecialchars($input['name'])." MLE : ".htmlspecialchars($input['PN']);
                $country = htmlspecialchars($input['country']);
                $city = htmlspecialchars($input['city']);
                $companion = "SEUL";
                $object = htmlspecialchars($input['object']);
                $means = "VOIE AERIENNE CIVILE";
                $departure_date = htmlspecialchars($input['departuredate']);
                $return_date = htmlspecialchars($input['returndate']);
                $type = "DEMANDE D'OM";
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $OMRepository = new OMRepository();
            $OMRepository->connection = new DatabaseConnection();
            $success = $OMRepository->addOM(strtoupper($recipient), strtoupper($country), strtoupper($city), strtoupper($companion), strtoupper($object), strtoupper($means),
            strtoupper($departure_date), strtoupper($return_date),strtoupper($type));
            if ($success == 0) {
                echo '<script type="text/javascript">
                        addingErrorAlert()
                    </script>';
            } else {
                echo '<script type="text/javascript">
                        addingDOMSuccessAlert()
                    </script>';
            }
        }


    } 
    public function  MOArchives (){
        $OMRepository = new OMRepository();
        $OMRepository->connection = new DatabaseConnection();
        $intOMs = $OMRepository->getIntOMs(); 
        $extOMs = $OMRepository->getExtOMs(); 
        $DOMs = $OMRepository->getDOMs(); 
        require('templates/OM/MOarchives.php'); 
        
    } 
    public function uploadMOPage(int $om_id){
        $OMRepository = new OMRepository();
        $OMRepository->connection = new DatabaseConnection();
        $OM = $OMRepository->getOM($om_id);
        require('templates/OM/uploadMO.php'); 

    } 

    public function uploadMO(int $type, int $om_id){
        $OMRepository = new OMRepository();
        $OMRepository->connection = new DatabaseConnection();
        $OM = $OMRepository->getOM($om_id);
        require('templates/OM/uploadMO.php'); 

        switch($type){
            case 1: 
                $filename = $_FILES['uploadfile']['name']; 
                $location = 'docs/MO/INT/'.$filename; 
                if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $location)){
                    $url = $location; 
                }
                break; 
            case 2: 
                $filename = $_FILES['uploadfile']['name']; 
                $location = 'docs/MO/EXT/'.$filename; 
                if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $location)){
                    $url = $location; 
                }
                break; 
            case 3: 
                $filename = $_FILES['uploadfile']['name']; 
                $location = 'docs/MO/DOM/'.$filename; 
                if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $location)){
                        $url = $location; 
                }
                break; 
        }
        $success= $OMRepository->uploadMO($url, $om_id); 
        if ($success == 0) {
            echo '<script type="text/javascript">
                    addingErrorAlert()
                </script>';
        } else {
            echo '<script type="text/javascript">
                    UploadingSuccessAlert()
                </script>';
        }

    }

}