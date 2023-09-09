<aside>
<div class="topnav">
    <!-- You should have a functional navbar -->
    <nav>
        <?php
        // Check if user is logged in and
        // display appropriate account links
        $account_url = $app_path . 'admin/account';
        $logout_url = $account_url . '?action=logout';
        if (isset($_SESSION['admin'])) :
        ?>
            <a href="<?php echo $logout_url; ?>">Logout</a>
        <?php else: ?>
            <a href="<?php echo $account_url; ?>">Login</a>
        <?php endif; ?>
            <a href="<?php echo $app_path; ?>">Home</a>
            <a href="<?php echo $app_path; ?>admin">Admin</a>

    <?php if (isset($categories)) : ?>
    <!-- display links for all categories -->
    <ul>
        <?php foreach ($categories as $category) : ?>
            <a href="<?php echo $app_path .
                'admin/posts?action=list_posts' .
                '&amp;category_id=' . $category['categoryID']; ?>">
                <?php echo htmlspecialchars($category['categoryName']); ?>
            </a>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    </nav>
</div>
</aside>
