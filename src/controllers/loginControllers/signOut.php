<?php
namespace Application\Controllers\LoginControllers\SignOut;

class SignOut
{
    public function signOut()
    {
        require ('templates/login/signIn.php');
        session_destroy();
    }
}