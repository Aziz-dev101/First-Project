<?php
// index.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'models/RestaurantModel.php'; // Model
require_once 'config/config.php'; // Model
require_once 'controllers/RestaurantController.php'; // Controller
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
// Instantiate the RestaurantModel
$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$action=$_GET['action'] ??'';
switch ($action) {
    case '':
        $restaurantController = new RestaurantController($pdo);
        $restaurantController->index(); // Call the index method to display the restaurant

    case 'restaurant':
        $restaurantController = new RestaurantController($pdo);
        $restaurantController->index(); // Call the index method to display the restaurant

        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
}
?>
