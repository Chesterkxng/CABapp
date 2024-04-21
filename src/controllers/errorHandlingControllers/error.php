<?php
namespace Application\Controllers\ErrorHandlingControllers\Error;

class Error
{
    public function forbiddenPage()
    {
        require ('templates/pagesComponents/error-403.php');
    }

    public function unfoundPage()
    {
        require ('templates/pagesComponents/error-404.php');
    }
}