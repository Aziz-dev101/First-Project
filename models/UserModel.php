<?php
// models/UserModel.php
require_once __DIR__.'/../config/config.php';
class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function usernameExists($username) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM clients WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetchColumn() > 0; // Returns true if username exists
    }
    public function register($username, $password, $role) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $this->pdo->prepare("INSERT INTO clients (username, password, role) VALUES (:username, :password, :role)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);
        
        return $stmt->execute();
    }

    public function getUserByUsername($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM clients WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
