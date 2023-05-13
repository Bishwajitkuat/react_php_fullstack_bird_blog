<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../Database.php';
include_once '../Post.php';

// Instantiate DB & connect
$database = new Database();
// using $connect() method from Database object to make a connection
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);

// setting id to the post object and id is taken from the GET super global variable
$post->id = isset($_GET['id']) ? $_GET['id'] : die();
// readById() method is called to get the post ot that ID
$post->getById();

$post_arr = array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => html_entity_decode($post->body),
    'author' => $post->author,
    'category' => $post->category,
    'img' => $post->img,
);

echo json_encode($post_arr);
