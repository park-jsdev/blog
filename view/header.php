<?php 

// include('../../util/secure_conn.php');
// require_once('../../../model/database.php'); 
// require_once('../../util/scripts.php'); 

// Session start is needed at the beginning of each page that needs to access session variables. It is best to put in the header.
// start_session_if_no_session();
require_once(FILE_ROOT.'model/quote_db.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= APP_NAME ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?=FOLDER?>main.css">
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="<?=FOLDER?>scripts.js"></script>
</head>
<body>
<main>


<div class="header">
    <header>
        <h1><?= APP_NAME ?></h1>
        <p>My personal blog</p>
        <?php
        $quote = get_quote();
        echo "<blockquote>";
        echo "<p class='quote'>" . $quote['text'] . "</p>";
        echo "</blockquote>";
        ?>
        <?php include FILE_ROOT.'view/sidebar_admin_resp.php'; ?>
    </header>
</div>

<div class="content">
