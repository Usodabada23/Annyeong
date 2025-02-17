<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//include all your model files here
require 'Model/User.php';
require 'Model/Service.php';
require 'Model/Requirement.php';
//include all your controllers here
require 'Controller/LoginController.php';
require 'Controller/RegisterController.php';
require 'Controller/HomeProviderController.php';
require 'Controller/HomeClientController.php';
require 'Controller/ProfileClientController.php';
require 'Controller/ProfileProviderController.php';
require 'Controller/RequirementController.php';
// Get the current page to load
// If nothing is specified, it will remain empty (home should be loaded)
$page = $_GET['page'] ?? null;

// Load the controller
// It will *control* the rest of the work to load the page
switch($page){
    case 'login': 
        (new LoginController())->loginView();
        break;
    case 'register':
        (new RegisterController())->registerView();
        break;
    case 'homeProvider':
        (new HomeProviderController())->homeProvider();
        break;

    case 'homeClient':
        (new HomeClientController())->homeClient();
        break;

    case 'profileClient':
        (new ProfileClientController())->profileView();
        break;
    case 'profileProvider':
        (new ProfileProviderController())->profileView();
        break;
    case 'addRequirement':
        (new RequirementController())->addRequirement();
        break;
    default:
        if(!isset($_SESSION["user_id"])){
            (new LoginController())->loginView();
        }
        break;
}
