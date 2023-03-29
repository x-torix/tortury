<?php
class Post {
    private int $id;
    private string $filename;
    private string $timestamp;
    private string $title;
    private string $authorId;
    private string $authorName;

    function __construct(int $i, string $f, string $t, string $title, int $authorId ) {
        $this->id = $i;
        $this->filename = $f;
        $this->timestamp = $t;
        $this->title = $title;
        $this->authorId = $authorId;
        global $db;
        $this->authorName = User::getNameById($this->authorId);
    }

    public function getFilename() : string {
        return $this->filename;
    }
    public function getTimestamp() : string {
        return $this->timestamp;
    }
    public function getTitle() : string {
        return $this->title;
    }
    public function getAuthorName() : string {
        return $this->authorName;
    }

    static function getLast() : Post {
        global $db;
        $query = $db->prepare("SELECT * FROM cms ORDER BY timestamp DESC LIMIT 1");
        $query->execute();
        $result = $query->get_result();
        $row = $result->fetch_assoc();
        $p = new Post($row['id'], $row['filename'], $row['timestamp'], $row['title'], $row['userId']);
        return $p; 
    }
    static function getPage(int $pageNumber = 1, int $postsPerPage = 10) : array {
        global $db;
        $query = $db->prepare("SELECT * FROM post ORDER BY timestamp DESC LIMIT ? OFFSET ?");
        $offset = ($pageNumber-1)*$postsPerPage;
        $query->bind_param('ii', $postsPerPage, $offset);
        $query->execute();
        $result = $query->get_result();
        $postsArray = array();
        while($row = $result->fetch_assoc()) {
            $post = new Post($row['id'],$row['filename'],$row['timestamp'], $row['title'], $row['userId']);
            array_push($postsArray, $post);
        }
        return $postsArray;
    }

    static function upload(string $tempFileName, string $title, int $userId) {
        $targetDir = "img/";
        $imgInfo = getimagesize($tempFileName);
        if(!is_array($imgInfo)) {
            die("BŁĄD: Przekazany plik nie jest obrazem!");
        }
        $randomNumber = rand(10000, 99999) . hrtime(true);
        $hash = hash("sha256", $randomNumber);
        $newFileName = $targetDir . $hash . ".webp";
        if(file_exists($newFileName)) {
            die("BŁĄD: Podany plik już istnieje!");
        }
        $imageString = file_get_contents($tempFileName);
        $gdImage = @imagecreatefromstring($imageString);
        imagewebp($gdImage, $newFileName);
        global $db;
        $query = $db->prepare("INSERT INTO cms VALUES(NULL, ?, ?, ?, ?)");
        $dbTimestamp = date("Y-m-d H:i:s");
        $query->bind_param("sssi", $dbTimestamp, $newFileName, $title, $userId);
        if(!$query->execute())
            die("Błąd zapisu do bazy danych");

    }
}
?>