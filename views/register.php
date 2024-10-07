<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// views/register.php
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../config/config.php';

$successMessage = '';
$errorMessage = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $userController = new UserController($pdo);
    
    if ($userController->register($username, $password, $role)) {
        $successMessage = "Registration successful!";
    } else {
        $errorMessage = "Registration failed! Username already exists.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/register.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h1>Register</h1>

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

                <label for="role">Role:</label>
                <select name="role" required>
                    <option value="user">User</option>
                    <option value="owner">Owner</option>
                </select>
                <br>

                <button type="submit" class="submit-btn">Register</button>
            </form>

            <!-- New Section: Already have an account -->
            <p class="account-text">
                Already have an account? <a href="login.php" class="login-link">Login here</a>
            </p>
        </div>
    </div>
</body>
</html>