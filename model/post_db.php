<?php
function get_posts_by_category($category_id) {
    global $db;
    $query = '
        SELECT *
        FROM posts p
           INNER JOIN categories c
           ON p.categoryID = c.categoryID
        WHERE p.categoryID = :category_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_post($post_id) {
    global $db;
    $query = '
        SELECT *
        FROM posts p
           INNER JOIN categories c
           ON p.categoryID = c.categoryID
       WHERE postID = :post_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':post_id', $post_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_post($category_id, $tags, $name, $description) {
    global $db;
    $query = 'INSERT INTO posts
                 (categoryID, tags, postName, description, dateAdded)
              VALUES
                 (:category_id, :tags, :name, :description, NOW())';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':tags', $tags);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':description', $description);
        $statement->execute();
        $statement->closeCursor();

        // Get the last post ID that was automatically generated
        $post_id = $db->lastInsertId();
        return $post_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_post($post_id, $tags, $name, $desc, $category_id) {
    global $db;
    $query = '
        UPDATE posts
        SET postName = :name,
            tags = :tags,
            description = :desc,
            categoryID = :category_id
        WHERE postID = :post_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':tags', $tags);
        $statement->bindValue(':desc', $desc);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':post_id', $post_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_post($post_id) {
    global $db;
    $query = 'DELETE FROM posts WHERE postID = :post_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':post_id', $post_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>