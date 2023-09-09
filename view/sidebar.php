<aside>
<div class="topnav">
    <!-- You should have a functional navbar -->
    <nav>
    <a href="<?php echo $app_path; ?>">Home</a>
      
    <!-- Try to do sub menus -->
    <!-- <h2>Categories</h2> -->
        <!-- display links for all categories -->
        <?php
            require_once('model/database.php');
            require_once('model/category_db.php');
            
            $categories = get_categories();
            foreach($categories as $category) :
                $name = $category['categoryName'];
                $id = $category['categoryID'];
                $url = $app_path . 'catalog?category_id=' . $id;
        ?>
            <a href="<?php echo $url; ?>">
               <?php echo htmlspecialchars($name); ?>
            </a>
        <?php endforeach; ?>

        <?php
            if (isset($_SESSION['admin'])) :
        ?>
            <a href="<?php echo $app_path; ?>admin">Admin Page</a>
        <?php else: ?>
            <a href="<?php echo $app_path; ?>admin">Login</a>
        <?php endif; ?>
    </nav>
</div>
</aside>
