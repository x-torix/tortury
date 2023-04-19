<?php
class PostRating {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addRating($postId, $userId, $rating) {
        if ($this->hasRated($postId, $userId)) {
            return false;
        }

        $stmt = $this->db->prepare("INSERT INTO post_ratings (post_id, user_id, rating) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $postId, $userId, $rating);
        $stmt->execute();

        return true;
    }

    public function getRating($postId) {
        $stmt = $this->db->prepare("SELECT SUM(IF(rating = '+', 1, -1)) AS rating_sum FROM post_ratings WHERE post_id = ?");
        $stmt->bind_param("i", $postId);
        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();

        return $result['rating_sum'];
    }

    public function hasRated($postId, $userId) {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS count FROM post_ratings WHERE post_id = ? AND user_id = ?");
        $stmt->bind_param("ii", $postId, $userId);
        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();

        return $result['count'] > 0;
    }
}

 // Utworzenie obiektu klasy PostRating i połączenie z bazą danych
$postRating = new PostRating($db);

// Dodanie oceny dla danego posta i użytkownika
$postId = 1;
$userId = 2;
$rating = '+';
$postRating->$add;
?>