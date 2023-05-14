<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

include_once '../Database.php';
include_once '../Post.php';

// Instantiate DB & connect
$database = new Database();
// using $connect() method from Database object to make a connection
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);

// get raw data from the post request
$data = json_decode(file_get_contents('php://input'));
// setting the value of the post object
$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category = $data->category;
$post->img = $data->img;
// if post->create() successfull it will return success message and if fails, fail message will return
if ($post->title) {
    if ($post->create()) {
        echo json_encode(array('message' => 'Post has been created sccessfully!'));
    } else {
        echo json_encode(array('message' => 'post insertion fails'));
    }}
