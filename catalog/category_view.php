<?php include '../view/header.php'; ?>

<main>
    <h1><?php echo htmlspecialchars($category_name); ?></h1>
    <?php if (count($posts) == 0) : ?>
        <p>There are no posts in this category.</p>
    <?php else: ?>
        <?php foreach ($posts as $post) : ?>
        <p>
            <a href="<?php echo '?post_id=' . $post['postID']; ?>">
                <?php echo htmlspecialchars($post['postName']); ?>
            </a>
        </p>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php
        // Check if user is logged in
        if (isset($_SESSION['admin'])):
            echo "<h1>Links</h1>";
            echo "<p><a href='../admin/posts/index.php?action=show_add_edit_form'>Add post</a></p>";
        endif;
        ?>
    
</main>
<?php include '../view/footer.php'; ?>