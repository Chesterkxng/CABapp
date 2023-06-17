<?php 

namespace Application\Controllers\MOControllers\MissionOrders; 

class MissionOrders 
{
    public function extMOgenerateForm(){
        require("templates/OM/ExMO_GenerateForm.php"); 
    }

    public function intMOgenerateForm(){
        require("templates/OM/inMO_GenerateForm.php"); 
    }

    public function DOMgenerateForm(){
        require("templates/OM/DOM_GenerateForm.php"); 
    }

}