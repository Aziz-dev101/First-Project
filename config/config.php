<?php
// config.php
define('DB_HOST', 'localhost');
define('DB_NAME', 'DB-Restau');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    // Use the defined constants instead of undefined variables
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
