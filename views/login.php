<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//start the session
session_start();
require_once __DIR__.'/../config/config.php'; // Model

// views/login.php
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__.'/../config/config.php';

$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Start the session if it hasn't been started yet
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Instantiate the controller
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $userController = new UserController($pdo);
    
    // Login the user
    if ($userController->login($username, $password)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Redirect to index
        header("Location: ../index.php"); // Corrected line
        exit(); // Stop further script execution
    } else {
        $errorMessage = "Login failed! Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h1>Login</h1>

            <?php if ($successMessage): ?>
                <p class="success"><?php echo $successMessage; ?></p>
            <?php endif; ?>
            <?php if ($errorMessage): ?>
                <p class="error"><?php echo $errorMessage; ?></p>
            <?php endif; ?>

            <form method="POST" action="">
                <label for="username">Username:</label>
                <input type="text" name="username" required>
                <br>

                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <br>

                <button type="submit" class="submit-btn">Login</button>
            </form>

            <!-- New Section: Don't have an account? -->
            <p class="account-text">
                Don't have an account? <a href="register.php" class="register-link">Register here</a>
            </p>
        </div>
    </div>
</body>
</html>
