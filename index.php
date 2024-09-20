<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . "/bd/Source/Models/Posts.php";
require __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/estruturahtml/header.php";
require_once __DIR__ . "/estruturahtml/home.php";
require_once __DIR__ . "/estruturahtml/footeer.php"; 
require_once __DIR__ . "/estruturahtml/login.php";
require __DIR__ . "/bd/Source/Config.php";
require_once __DIR__ . "/bd/Source/Models/User.php"; 

use CoffeeCode\DataLayer\Connect;
use Source\Models\User;

$userModel = new User();
$list = $userModel->find()->fetch(); // Buscando todos os usuários


  
