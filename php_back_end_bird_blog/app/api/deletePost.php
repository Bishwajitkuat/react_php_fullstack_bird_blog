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

// // setting data to post object
$post->id = $data->id;

if ($post->delete()) {
    echo json_encode(array('message' => 'The post has been successfully deleted!'));
} else {
    echo json_encode(array('message' => 'delete failed'));
}
