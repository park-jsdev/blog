<?php
require_once('../util/config.php');
require_once('../util/main.php');
require_once('../model/post_db.php');
require_once('../model/category_db.php');

$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
$post_id = filter_input(INPUT_GET, 'post_id', FILTER_VALIDATE_INT);
if ($category_id !== null) {
    $action = 'category';
} elseif ($post_id !== null) {
    $action = 'post';
} else {
    $action = '';
}

switch ($action) {
    // Display the specified category
    case 'category':
        // Get category data
        $category = get_category($category_id);
        $category_name = $category['categoryName'];
        $posts = get_posts_by_category($category_id);

        // Display category
        include('./category_view.php');
        break;
    // Display the specified post
    case 'post':
        // Get post data
        $post = get_post($post_id);

        // Display post
        include('./post_view.php');
        break;
    default:
        $error = 'Unknown catalog action: ' . $action;
        include('errors/error.php');
        break;
}
?>