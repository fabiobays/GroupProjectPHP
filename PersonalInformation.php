<?php
//Require the config
require_once("inc/config.inc.php");

//Require entities
require_once("inc/Entities/User.class.php");

require_once("inc/Entities/Address.class.php");


//Require Utilities
require_once("inc/Utility/TheMovieDbApi.class.php");
require_once("inc/Utility/Page.class.php");
require_once("inc/Utility/PDOAgent.class.php");
require_once("inc/Utility/UserMapper.class.php");
require_once("inc/Utility/AddressMapper.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/Validation.class.php");

session_start();

if(!LoginManager::verifyLogin()) return;



AddressMapper::inizialize("Address");

Page::$title = "Group Project";
Page::header();
$address = new Address();
Page::PersonalInformation($_SESSION['user'],$address);

Page::footer();
?>