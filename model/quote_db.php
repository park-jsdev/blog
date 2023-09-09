<?php

// Get a random quote from the db
function get_quote() {
    global $db;
    $query = '
        SELECT *
        FROM quotes 
        ORDER BY RAND() LIMIT 1';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

?>