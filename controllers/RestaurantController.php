<?php
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../models/RestaurantModel.php";

class RestaurantController {
    private $restaurantModel;

    public function __construct($pdo) {
        // Pass the PDO instance to the RestaurantModel
        $this->restaurantModel = new RestaurantModel($pdo);
    }

    // Public home page
    public function index() {
        // Fetch all restaurants
        $isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;

        $restaurants = $this->restaurantModel->getAllRestaurants(); // Get all restaurants

        require_once (__DIR__.'/../homepage.php'); // Pass the restaurant data to the view
    }

    // Show restaurant details by ID
    public function show($id) {
        // Use the restaurant model to get restaurant by ID
        $restaurant = $this->restaurantModel->getRestaurantById($id);

        if (!$restaurant) {
            // Handle the case where the restaurant is not found
            $coverImagePath = 'default-image.jpg'; // Default image if none found
            $description = 'Restaurant not found.';
        } else {
            $coverImagePath = $restaurant['cover_image_path'] ?? 'default-image.jpg';
            $description = $restaurant['description'] ?? 'Description not available.';
        }

        // Include the view and pass the cover image path
        include '../views/restaurant.php'; // Update the path to your view
    }

    // Fetch and show restaurant details
    public function showRestaurantPage($restaurantId) {
        // Get restaurant details using the model
        $restaurantDetails = $this->restaurantModel->getRestaurantDetails($restaurantId);

        if (empty($restaurantDetails)) {
            // Default values if no restaurant is found
            $coverImagePath = 'imgs/default.jpg';
            $description = 'Description not available.';
        } else {
            // Use fetched data
            $coverImagePath = $restaurantDetails['cover_image_path'] ?? 'imgs/default-cover.jpg';
            $description = $restaurantDetails['description'] ?? 'Description not available.';
        }

        // Pass the data to the view
      // include '../views/restaurant.php'; // Adjust the path to your view
    }
}
?>
