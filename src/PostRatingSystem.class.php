<?php

class PostRatingSystem {
  private $db;

  function __construct($db) {
    $this->db = $db;
  }

  // Zapisuje ocenę posta przez użytkownika
  function ratePost($user_id, $post_id, $rating) {
    $query = "SELECT * FROM post_ratings WHERE user_id = $user_id AND post_id = $post_id";
    $result = $this->db->query($query);

    if ($result && $result->num_rows > 0) {
      // Użytkownik już ocenił ten post wcześniej, więc nie pozwalamy mu na ponowne oddanie głosu
      return false;
    } else {
      // Dodajemy nowy wpis do tabeli post_ratings z informacją o tym, że użytkownik o ID $user_id dał ocenę $rating postowi o ID $post_id
      $query = "INSERT INTO post_ratings (user_id, post_id, rating) VALUES ($user_id, $post_id, $rating)";
      $this->db->query($query);

      return true;
    }
  }

  // Zwraca sumę punktów dla danego posta (dodatnią lub ujemną)
  function getPostRating($post_id) {
    $query = "SELECT SUM(rating) AS rating_sum FROM post_ratings WHERE post_id = $post_id";
    $result = $this->db->query($query);

    if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row['rating_sum'];
    } else {
      return 0;
    }
  }
}

// Model bazy danych dla tabeli post_ratings
class PostRating {
  public $id;
  public $user_id;
  public $post_id;
  public $rating;

  function __construct($id, $user_id, $post_id, $rating) {
    $this->id = $id;
    $this->user_id = $user_id;
    $this->post_id = $post_id;
    $this->rating = $rating;
  }
}

?>
