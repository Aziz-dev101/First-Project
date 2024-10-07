<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Use absolute path
require_once '/opt/lampp/htdocs/restaurant-management/config/config.php';

// Test if the connection works
if ($db) {  // Change $pdo to $db
    echo "Database connection successful!";
} else {
    echo "Database connection failed.";
}
?>
