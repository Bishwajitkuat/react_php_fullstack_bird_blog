<?php
class Post
{
// DB info
    private $conn;
    private $table = 'posts';
// post properties
    public $id;
    public $title;
    public $body;
    public $author;
    public $category;
    public $img;
// constractor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }
// get posts
    public function getAllPost()
    {
        $quary = "select id, title, body, author, category, img from $this->table";
// prepare PDO statement
        $stmt = $this->conn->prepare($quary);
// Execute PDO statement
        $stmt->execute();
// Return statement
        return $stmt;
    }
// Create post
    public function create()
    {
// sql quary
        $quary = "insert into $this->table (title, body, author, category, img) values(:title, :body, :author, :category, :img)";

// prepare PDO statement
        $stmt = $this->conn->prepare($quary);

// cleaning data
        $this->title = htmlspecialchars($this->title);
        $this->body = htmlspecialchars($this->body);
        $this->author = htmlspecialchars($this->author);
        $this->category = htmlspecialchars($this->category);
        $this->img = htmlspecialchars($this->img);

// bind property values with $stmt
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':img', $this->img);
// if execution successfull
        if ($stmt->execute()) {
            return true;
        }
        echo json_encode(array("message" => "new post creation failed"));
    }

}
