<?php include '../../view/header.php'; ?>

<main>
    <?php
    if (isset($post_id)) {
        $heading_text = 'Edit post';
    } else {
        $heading_text = 'Add post';
    }
    ?>
    <h1>Post Manager - <?php echo $heading_text; ?></h1>
    <form action="index.php" method="post" enctype="multipart/form-data" id="add_post_form" class="product_form">
        <?php if (isset($post_id)) : ?>
            <input type="hidden" name="action" value="update_post">
            <input type="hidden" name="post_id"
                   value="<?php echo $post_id; ?>">
        <?php else: 
            // Unset post attributes if no post id is set
            $post['categoryID'] = '';
            $post['postName'] = '';
            $post['tags'] = '';
            $post['description'] = '';
            ?>
            <br>
            <input type="hidden" name="action" value="add_post">
        <?php endif; ?>
            <input type="hidden" name="category_id"
                   value="<?php echo $post['categoryID']; ?>">

                <!-- Icon for image post button -->
                <div id="img_container"> 
                <label for="file-input">
                  <img id="image_src">
                  <input type="file" name="file1" id="file-input">
                </label>
                </div>
                <br>

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ($categories as $category) : 
            if ($category['categoryID'] == $post['categoryID']) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
        ?>
            <option value="<?php echo $category['categoryID']; ?>"<?php
                      echo $selected ?>>
                <?php echo htmlspecialchars($category['categoryName']); ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Title:</label>
        <input type="text" name="name" 
               value="<?php echo htmlspecialchars($post['postName']); ?>">
        <br>

        <label>Tags:</label>
        <input type="text" name="tags"
               value="<?php echo htmlspecialchars($post['tags']); ?>">
        <br>

        <label>Body:</label>
        <textarea name="description" rows="10"
                  cols="50"><?php echo $post['description']; ?></textarea>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Submit">

    </form>
    <div id="formatting_directions">
        <br>
        <ul>
            <!-- <li>Use two returns to start a new paragraph.</li>
            <li>Use an asterisk to mark items in a bulleted list.</li>
            <li>Use one return between items in a bulleted list.</li>
            <li>Use standard HMTL tags for bold and italics.</li> -->
        </ul>
    </div>

</main>
<?php include '../../view/footer.php'; ?>