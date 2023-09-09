<aside>
    <?php if (isset($categories)) : ?>
    <!-- display links for all categories -->
    <h2>Categories</h2>
    <ul>
        <?php foreach ($categories as $category) : ?>
        <li id="category_li">
            <a href="<?php echo APP_ROOT.
                'admin/posts?action=list_posts' .
                '&amp;category_id=' . $category['categoryID']; ?>">
                <?php echo htmlspecialchars($category['categoryName']); ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</aside>
