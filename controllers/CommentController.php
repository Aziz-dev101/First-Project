<?php
session_start();

class CommentController {
    private $commentModel;

    // Constructor to initialize the CommentModel
    public function __construct($commentModel) {
        $this->commentModel = $commentModel; // Assign the CommentModel instance to the class property
    }

    // Method to handle comment submission
    public function submitComment() {
        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php"); // Redirect to login page if not logged in
            exit();
        }

        // Get data from the POST request
        $user_id = $_SESSION['user_id'];
        $restaurant_id = $_POST['restaurant_id'];
        $content = $_POST['comment'];

        // Call the model's method to add the comment
        if ($this->commentModel->addComment($user_id, $restaurant_id, $content)) {
            header("Location: restaurant.php?id=$restaurant_id&message=Comment submitted successfully."); // Redirect to restaurant page
            exit();
        } else {
            header("Location: restaurant.php?id=$restaurant_id&message=Error submitting comment. Please try again."); // Redirect back with error
            exit();
        }
    }
}
