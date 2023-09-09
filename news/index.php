<?php
require_once('../util/config.php');
require_once('../util/main.php');
require_once('../model/post_db.php');
require_once('../model/quote_db.php');
include '../view/header.php';

$db;
 $query = "SELECT * FROM feed";
 try {
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    display_db_error($error_message);
}
    $rows = $result;
    $now = time();
    foreach($rows as $row){

        // check if RSS feed should be fetched
        if($row['last_access'] + ($row['frequency'] *60) < $now){
            $content = file_get_contents($row['url']); // this could be done with cURL
            if(!$content){
                continue;
            }
            $xml = new SimpleXmlElement($content); 
            //loop through all RSS items
            foreach($xml->channel->item as $entry)
            {
                //store the item into the database
                $item['title'] = $entry->title;
                $item['content'] = $entry->description;
                $item['guid'] = $entry->link;
                $item['pub_date'] = strtotime($entry->pubdate);
                $item['insert_date'] = time();

                $query = "INSERT IGNORE INTO article (title,content,url,pub_date,insert_date) VALUES (
                    :title,
                    :content,
                    :guid,
                    :pub_date,
                    :insert_date
                    )";
                try {
                    $statement = $db->prepare($query);
                    $statement->bindValue(':title', $item['title']);
                    $statement->bindValue(':content', $item['content']);
                    $statement->bindValue(':guid', $item['guid']);
                    $statement->bindValue(':pub_date', $item['pub_date']);
                    $statement->bindValue(':insert_date', $item['insert_date']);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    $statement->closeCursor();
                } catch (PDOException $e) {
                    $error_message = $e->getMessage();
                    display_db_error($error_message);
                }

        //change feed last access
        $query = "UPDATE feed SET last_access='".time()."' WHERE id=:feed_id";
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':feed_id', $row['id']);
            $statement->execute();
            $result = $statement->fetchAll();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
 
            }
        }
    }
?>

    <main>
    <h2>News:</h2>
    <table>
    <?php
    // Test getting the rss
    $query = "SELECT * FROM article ORDER BY insert_date DESC";
    try {
       $statement = $db->prepare($query);
       $statement->execute();
       $result = $statement->fetchAll();
       $statement->closeCursor();
   } catch (PDOException $e) {
       $error_message = $e->getMessage();
       display_db_error($error_message);
   }
   $rows = $result;
   foreach($rows as $row){
    $title = $row['title'];
    $link = $row['url'];
    $content = $row['content'];

    echo "<tr>";
    echo "<td class='feed'>";
    echo "<a href='$link'>$title</a><br>";
    echo $content;
    echo "</td>";
    echo "</tr>";
}
    ?>
    </table>
</main>

<?php include FILE_ROOT.'view/footer.php'; ?>
