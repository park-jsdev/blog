<?php include '../../view/header.php'; ?>

<?php if (!isset($post_order_count)) { $post_order_count = 0; } ?>
<main>
    <h1>Post Manager - View post</h1>
    
    <!-- display post -->
    <?php include '../../view/post.php'; ?>

    <!-- display buttons -->
    <br>
    <div id="edit_and_delete_buttons">
        <form action="." method="post" id="edit_button_form" >
            <input type="hidden" name="action" value="show_add_edit_form">
            <input type="hidden" name="post_id"
                   value="<?php echo $post['postID']; ?>">
            <input type="hidden" name="category_id"
                   value="<?php echo $post['categoryID']; ?>">
            <input type="submit" value="Edit post">
        </form>
        <?php if ($post_order_count == 0) : ?>
        <form action="." method="post" id="delete_button_form" >
            <input type="hidden" name="action" value="delete_post">
            <input type="hidden" name="post_id"
                   value="<?php echo $post['postID']; ?>">
            <input type="hidden" name="category_id"
                   value="<?php echo $post['categoryID']; ?>">
            <input type="submit" value="Delete post">
        </form>
        <?php endif; ?>
    </div>
    <div id="image_manager">
        <h1>Image Manager</h1>
        <form action="." method="post" enctype="multipart/form-data" id="upload_image_form">
            <input type="hidden" name="action" value="upload_image">
            <input type="file" name="file1"><br>
            <input type="hidden" name="post_id"
                   value="<?php echo $post['postID']; ?>">
            <input type="submit" value="Upload Image">
        </form>
        <p><a href="../../images/<?php echo $post['postID']; ?>.png">
            View large image</a></p>
        <p><a href="../../images/<?php echo $post['postID']; ?>_s.png">
            View small image</a></p>
    </div>
</main>
<?php include '../../view/footer.php'; ?>