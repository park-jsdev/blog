<?php
    // Parse data
    $category_id = $post['categoryID'];
    $tags = $post['tags'];
    $post_name = $post['postName'];
    $description = $post['description'];

    // Add HMTL tags to the description
    $description_with_tags = add_tags($description);

    // Get image URL and alternate text
    $image_filename = $post_id . '_m.png';
    // $image_path = $app_path . 'images/' . $image_filename;
    $image_path = APP_ROOT . 'images/' . $image_filename;
    $image_alt = 'Image filename: ' . $image_filename;
?>
<h1><?php echo htmlspecialchars($post_name); ?></h1>
<div id="left_column">
    <p><img id="post_img" src="<?php echo $image_path; ?>"
            alt="<?php echo $image_alt; ?>" /></p>
</div>

<div id="right_column">
    <p><b>Tags:</b>
        <?php echo $tags; ?></p>
    <!-- <h2>Description</h2> -->
    <?php echo $description_with_tags; ?>
    <br>

    <!-- Next post feature: needs a check if post id exists in database, and group in category -->
    <!-- <p class="right"><a href="?action=view_post&amp;post_id=<?php
                          // echo $post['postID']+1; ?>">Next</a></p> -->
</div>
