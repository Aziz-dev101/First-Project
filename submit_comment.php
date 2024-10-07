<?php
// Include necessary files
require 'config/config.php'; // Your database connection
require 'models/CommentModel.php'; // Include the CommentModel
require 'controllers/CommentController.php'; // Include the CommentController

// Create a PDO instance (make sure to configure your connection properly)
$db = new PDO('mysql:host=your_host;dbname=your_db;charset=utf8', 'username', 'password');

// Create instances of the model and controller
$commentModel = new CommentModel($db);
$controller = new CommentController($commentModel);

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->submitComment(); // Call the method to handle comment submission
}
