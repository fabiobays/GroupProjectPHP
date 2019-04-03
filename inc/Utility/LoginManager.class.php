<?php


class LoginManager  {
    //This function checks if the user is logged in, if they are not they are redirected to the login page
    static function verifyLogin() : bool {
        if(!empty(session_id()) && isset($_SESSION['user'])) {
            return true;
        }
        header("Location: Lab09-MMa-94346-login");
        return false;
    }
}

?>