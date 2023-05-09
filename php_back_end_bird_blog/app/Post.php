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
// constractor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }
// get posts
    public function getAllPost()
    {
        $quary = "select id, title, body, author, category from $this->table";
// prepare PDO statement
        $stmt = $this->conn->prepare($quary);
// Execute PDO statement
        $stmt->execute();
// Return statement
        return $stmt;
    }
}
