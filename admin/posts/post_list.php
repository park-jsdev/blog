<?php include '../../view/header.php'; ?>


<main>
    <h1 class="top">Post Manager - List Posts</h1>
    <p>To view, edit, or delete a post, select the post.</p>
    <p>To add a post, select the "Add Post" link.</p>
    <?php include 'post_sidebar.php'; ?>
    <?php if (count($posts) == 0) : ?>
        <p>There are no posts for this category.</p>
    <?php else : ?>
        <h1>
            <?php echo htmlspecialchars($current_category['categoryName']); ?>
        </h1>
            <?php foreach ($posts as $post) : ?>
            <p>
                <a href="?action=view_post&amp;post_id=<?php
                          echo $post['postID']; ?>">
                    <?php echo htmlspecialchars($post['postName']); ?>
                </a>
            </p>
            <?php endforeach; ?>
    <?php endif; ?>

    <h1>Menu</h1>
    <p><a href="index.php?action=show_add_edit_form">Add post</a></p>

</main>
<?php include '../../view/footer.php'; ?>