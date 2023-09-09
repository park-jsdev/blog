<?php
// Get the document root, Get the application path, and Set the include path
require_once('util/config.php');
require_once('util/main.php');
require_once('model/post_db.php');
require_once('model/quote_db.php');

// Set the featured post IDs in an array
$post_ids = array(2, 20, 9);

// Get an array of featured posts from the database
$posts = array();
foreach ($post_ids as $post_id) {
    $post = get_post($post_id);
    $posts[] = $post; // add post to array
}

// Display the home page
include('home_view.php');
?>