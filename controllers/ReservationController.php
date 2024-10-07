<?php
require_once 'models/ReservationModel.php';

class ReservationController {
    private $reservationModel;

    public function __construct($pdo) {
        $this->reservationModel = new ReservationModel($pdo);
    }

    public function processReservation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve and sanitize data from the POST request
            $restaurantId = filter_input(INPUT_POST, 'restaurant_id', FILTER_SANITIZE_NUMBER_INT);
            $time = filter_input(INPUT_POST, 'time-select', FILTER_SANITIZE_STRING); // Ensure this matches your input
            $date = filter_input(INPUT_POST, 'booktable', FILTER_SANITIZE_STRING); // Match input

            // Retrieve user ID from the session
            $userId = $_SESSION['user_id'] ?? null; // Using null coalescing operator for safety

            // Validate inputs
            if (!$userId || !$restaurantId || !$time || !$date) {
                echo 'Invalid input data.';
                return;
            }

            // Check for existing reservations
            if ($this->reservationModel->checkExistingReservation($restaurantId, $date, $time)) {
                echo 'Sorry, we are full at that time. Please choose another time or date.';
            } else {
                // Create the reservation
                if ($this->reservationModel->createReservation($userId, $restaurantId, $date, $time)) {
                    echo 'Reservation successfully made!';
                } else {
                    echo 'An error occurred. Please try again later.';
                }
            }
        } else {
            echo 'Invalid request method.';
        }
    }
}
