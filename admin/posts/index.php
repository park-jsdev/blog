<?php
require_once('../../util/config.php');
require_once('../../util/main.php');
require_once('../../util/valid_admin.php');
require_once('../../util/images.php');
require_once('../../model/post_db.php');
require_once('../../model/category_db.php');

$action = strtolower(filter_input(INPUT_POST, 'action'));
if ($action == NULL) {
    $action = strtolower(filter_input(INPUT_GET, 'action'));
    if ($action == NULL) {        
        $action = 'list_posts';
    }
}

switch ($action) {
    case 'list_posts':
        // get categories and post
        $category_id = filter_input(INPUT_GET, 'category_id', 
                FILTER_VALIDATE_INT);
        if (empty($category_id)) {
            $category_id = 1;
        }
        $current_category = get_category($category_id);
        $categories = get_categories();
        $posts = get_posts_by_category($category_id);

        // display post list
        include('post_list.php');
        break;
    case 'view_post':
        $categories = get_categories();
        $post_id = filter_input(INPUT_GET, 'post_id', 
                FILTER_VALIDATE_INT);
        $post = get_post($post_id);
        include('post_view.php');
        break;
    case 'delete_post':
        $category_id = filter_input(INPUT_POST, 'category_id', 
                FILTER_VALIDATE_INT);
        $post_id = filter_input(INPUT_POST, 'post_id', 
                FILTER_VALIDATE_INT);
        delete_post($post_id);
        
        // Display the post List page for the current category
        header("Location: .?category_id=$category_id");
        break;
    case 'show_add_edit_form':
        $post_id = filter_input(INPUT_GET, 'post_id', 
                FILTER_VALIDATE_INT);
        if ($post_id === null) {
            $post_id = filter_input(INPUT_POST, 'post_id', 
                    FILTER_VALIDATE_INT);
        }
        $post = get_post($post_id);
        $categories = get_categories();
        include('post_add_edit.php');
        break;
    case 'add_post':
        $category_id = filter_input(INPUT_POST, 'category_id', 
                FILTER_VALIDATE_INT);
        $tags = filter_input(INPUT_POST, 'tags');
        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description');

        // Validate inputs
        if (empty($tags) || empty($name) || empty($description)) {
            $error = 'Invalid post data.
                      Check all fields and try again.';
            include('../../errors/error.php');
        } else {
            $categories = get_categories();
            $post_id = add_post($category_id, $tags, $name,
                    $description);

            $post = get_post($post_id);

            // Image section
            $image_filename = $post_id . '.png';
            // $image_dir = $doc_root . $app_path . 'images/';
            $image_dir = FILE_ROOT . 'images/';

            if (isset($_FILES['file1'])) {
                $source = $_FILES['file1']['tmp_name'];
                $target = $image_dir . DIRECTORY_SEPARATOR . $image_filename;

                // save uploaded file with correct filename
                move_uploaded_file($source, $target);

                // add code that creates the medium and small versions of the image
                process_image($image_dir, $image_filename);

            } else {
                
            }
            include('post_view.php');
        }
        break;
    case 'update_post':
        $post_id = filter_input(INPUT_POST, 'post_id', 
                FILTER_VALIDATE_INT);
        $category_id = filter_input(INPUT_POST, 'category_id', 
                FILTER_VALIDATE_INT);
        $tags = filter_input(INPUT_POST, 'tags');
        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description');

        // Validate inputs
        if (empty($tags) || empty($name) || empty($description)) {
            $error = 'Invalid post data.
                      Check all fields and try again.';
            include('../../errors/error.php');
        } else {
            $categories = get_categories();
            update_post($post_id, $tags, $name, $description, $category_id);
            $post = get_post($post_id);
            include('post_view.php');
        }
        break;
    case 'upload_image':
        $post_id = filter_input(INPUT_POST, 'post_id', 
                FILTER_VALIDATE_INT);
        $post = get_post($post_id);
        $tags = $post['tags'];

        $image_filename = $post_id . '.png';
        // $image_dir = $doc_root . $app_path . 'images/';
        $image_dir = FILE_ROOT . 'images/';

        if (isset($_FILES['file1'])) {
            $source = $_FILES['file1']['tmp_name'];
            $target = $image_dir . DIRECTORY_SEPARATOR . $image_filename;

            // save uploaded file with correct filename
            move_uploaded_file($source, $target);

            // add code that creates the medium and small versions of the image
            process_image($image_dir, $image_filename);

            // display post with new image
            include('post_view.php');
        }
        break;
}
?>