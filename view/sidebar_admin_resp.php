<aside>
<div class="topnav" id="myTopnav">
  <nav>
        <?php
        // Check if user is logged in and
        // display appropriate account links
        $account_url = APP_ROOT . 'admin';
        $logout_url = $account_url . '?action=logout';
        if (isset($_SESSION['admin'])) :
        ?>
            <a href="<?php echo $logout_url; ?>">Logout</a>
        <?php else: ?>
            <a href="<?php echo $account_url; ?>">Login</a>
        <?php endif; ?>
            <a href="<?php echo APP_ROOT; ?>">Home</a>
            <a href="<?php echo $account_url; ?>">Admin</a>

        <div class="dropdown">
          <button class="dropbtn">Topics 
            <i class="fa fa-caret-down"></i>
          </button>
          
          <div class="dropdown-content">
            <?php
            require_once(FILE_ROOT.'model/database.php');
            require_once(FILE_ROOT.'model/category_db.php');
            
            $categories = get_categories();
            foreach($categories as $category) :
                $name = $category['categoryName'];
                $id = $category['categoryID'];
                $url = APP_ROOT . 'catalog?category_id=' . $id;
            ?>
            <a href="<?php echo $url; ?>">
               <?php echo htmlspecialchars($name); ?>
            </a>
          <?php endforeach; ?>
          </div>

        </div> 
        <?php $news_url = APP_ROOT . 'news'; ?>
        <a href="<?php echo $news_url; ?>">News</a>
    
    </nav>

  <a href="javascript:void(0);" class="icon" onclick="responsive_navbar()">&#9776;</a>
</div>



</aside>

<script>
// When the user scrolls the page, execute sticky_navbar
window.onscroll = function() {sticky_navbar()};

// Get the navbar
var navbar = document.getElementById("myTopnav");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;
</script>
