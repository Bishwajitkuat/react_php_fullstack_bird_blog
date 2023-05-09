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

// blog post quary, read() method returns $stmt
$result = $post->getAllPost();

// get row count
$num = $result->rowCount();
// checking if any posts exists
if ($num > 0) {
// post array which has a key data which contains a array and each post will be pushed into this array
    $posts_arr = array();
    $posts_arr['data'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
// extract() function takes array as parameter and key become variable and values are assigned into this variables
        extract($row);
        $post_item = array(
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'category' => $category,
            'img' => $img,
        );
// pushing each post_item into data array of posts_arr array
        array_push($posts_arr['data'], $post_item);
    }
// when fetching is complete, $posts_arr is turnd into json object and echo it
    echo json_encode($posts_arr);
} else {
    echo json_encode(array('message' => 'No post found'));
}
