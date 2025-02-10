<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//include all your model files here
require 'Model/User.php';
//include all your controllers here
require 'Controller/LoginController.php';
require 'Controller/RegisterController.php';

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
    default:
        (new LoginController())->loginView();
        break;
}
