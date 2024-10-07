<?php
class ReservationModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function checkExistingReservation($restaurantId, $reservationDate, $reservationTime) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM reservations WHERE restaurant_id = ? AND reservation_date = ? AND reservation_time = ?");
        $stmt->execute([$restaurantId, $reservationDate, $reservationTime]);
        return $stmt->fetchColumn() > 0; // returns true if there is an existing reservation
    }

    public function createReservation($userId, $restaurantId, $reservationDate, $reservationTime) {
        $stmt = $this->pdo->prepare("INSERT INTO reservations (user_id, restaurant_id, reservation_date, reservation_time) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$userId, $restaurantId, $reservationDate, $reservationTime]);
    }
}
