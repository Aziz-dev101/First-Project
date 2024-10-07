<?php
class CommentModel {
    private $db;

    // Constructor to initialize the database connection
    public function __construct($db) {
        $this->db = $db; // Assign the PDO instance to the class property
    }

    // Method to insert a comment into the database
    public function addComment($user_id, $restaurant_id, $content) {
        $stmt = $this->db->prepare("INSERT INTO comments (user_id, restaurant_id, content) VALUES (?, ?, ?)");
        return $stmt->execute([$user_id, $restaurant_id, $content]);
    }
}
