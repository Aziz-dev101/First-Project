<?php
// models/RestaurantModel.php
class RestaurantModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Method to get a restaurant by ID
    public function getRestaurantById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM restaurants WHERE id = :id"); // Adjust the query as needed
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //get all restaurent 
    public function getAllRestaurants() {
        $stmt = $this->pdo->prepare("SELECT * FROM restaurants"); // Fetch all records
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return all results as an associative array
    }

    //to fetch the cover image 
    public function getRestaurantDetails($restaurantId) {
    // Use a parameterized query to prevent SQL injection
    $query = "SELECT * FROM restaurants WHERE id = :restaurantId";

    try {
        // Prepare the statement
        $stmt = $this->pdo->prepare($query);

        // Bind the restaurant ID to the query
        $stmt->bindParam(':restaurantId', $restaurantId, PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Fetch the result as an associative array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result; // Return the fetched result
    } catch (PDOException $e) {
        // Handle the error (log it, show a user-friendly message, etc.)
        error_log('Database query error: ' . $e->getMessage());
        return null; // Return null or handle as per your needs
    }
}
}    
