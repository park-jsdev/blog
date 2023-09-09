<?php 
// Debug:
// echo phpinfo();

?>

<!DOCTYPE html>
<html>
<head>
    <title><?= APP_NAME ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="scripts.js"></script>
</head>
<body>
<main>


<div class="header">
    <header>
        <h1><?= APP_NAME ?></h1>
        <p><?= APP_DESC ?></p>
        <?php
        $quote = get_quote();
        echo "<blockquote>";
        echo "<p class='quote'>" . $quote['text'] . "</p>";
        echo "</blockquote>";
        ?>
        <?php include 'view/sidebar_admin_resp.php'; ?>
    </header>
</div>


<div class="content">
    <section>
        <nav>
        <h1>Featured Posts</h1>
        <table>
        <?php foreach ($posts as $post) :
            // Get post data
            $description = $post['description'];
            
            // Get first paragraph of description
            $description_with_tags = add_tags($description);
            $i = strpos($description_with_tags, "</p>");
            $first_paragraph = substr($description_with_tags, 3, $i-3);        
        ?>
            <tr>
                <td class="post_image_column" >
                    <img src="images/<?php echo htmlspecialchars($post['postID']); ?>_s.png"
                         alt="&nbsp;">
                </td>
                <td>
                    <p>
                        <a href="catalog?post_id=<?php echo
                               $post['postID']; ?>">
                            <?php echo htmlspecialchars($post['postName']); ?>
                        </a>
                    </p>
                    <p>
                        <?php echo $first_paragraph; ?>
                    </p>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>

        </nav>
    </section>
</div>

<div class="content">
    
</div>


<?php include 'view/footer.php'; ?>