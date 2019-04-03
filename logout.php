<?php
//Include the page and the login manager
require("inc/Utility/Page.class.php");
require("inc/Utility/LoginManager.class.php");

session_start();

//Verify if the user is logged in
if (LoginManager::verifyLogin())    {
    //Call the Page goodbye
    unset($_SESSION);
    session_destroy();   
    Page::$title = "Good bye.";
    Page::header(true);
    Page::goodBye();
    Page::footer();
}
?>