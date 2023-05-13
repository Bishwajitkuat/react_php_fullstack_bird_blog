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

// get posts by id
    public function getById()
    {
        $quary = "select id, title, body, author, category, img from $this->table where id=:id";
        // prepare PDO statement
        $stmt = $this->conn->prepare($quary);

        $stmt->bindParam(':id', $this->id);
        // Execute PDO statement
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
// setting property values into
        $this->id = $row['id'];
        $this->title = $row['title'];
        $this->body = $row['body'];
        $this->author = $row['author'];
        $this->category = $row['category'];
        $this->img = $row['img'];

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
// update post
    public function update()
    {
// sql quary
        $quary = "update $this->table set title = :title, body = :body, author = :author, category = :category, img = :img where id = :id";
// prepareing PDO statement
        $stmt = $this->conn->prepare($quary);

// cleaing data
        $this->title = htmlspecialchars($this->title);
        $this->body = htmlspecialchars($this->body);
        $this->author = htmlspecialchars($this->author);
        $this->category = htmlspecialchars($this->category);
        $this->id = htmlspecialchars($this->id);
        $this->img = htmlspecialchars($this->img);

// bind property values with $stmt
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':img', $this->img);
// executing update $stmt
        if ($stmt->execute()) {
            return true;
        } else {
            echo $stmt->error;
            return false;
        };
    }
// delete post
    public function delete()
    {
// sql quary
        $quary = "delete from $this->table where id = :id";
// PDO statement creation
        $stmt = $this->conn->prepare($quary);
// binding id to $stmt
        $stmt->bindParam(':id', $this->id);
// if deletion successfull
        if ($stmt->execute()) {
            return true;
        } else {
            echo $stmt->error;
            return false;
        }
    }

}
