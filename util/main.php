<?php
require_once(FILE_ROOT.'util/secure_conn.php');

// Get common code
require_once(FILE_ROOT.'util/tags.php');
require_once(FILE_ROOT.'model/database.php');

extract($constants);

// echo $file_path = $_SERVER['DOCUMENT_ROOT'] . '/path/to/file.php';
// require_once $file_path;

// echo 'http: ' . $_SERVER['HTTP_HOST'] . ' ';
// echo 'request: ' . $_SERVER['REQUEST_URI'];
// echo get_include_path();

// $current_url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// $base_url = substr($current_url, 0, strrpos($current_url, '/') + 1);
// $file_url = $base_url . 'path/to/file.php';
// require_once $file_url;

// Define some common functions
function display_db_error($error_message) {
    global $app_path;
    include APP_ROOT.'/errors/db_error.php';
    exit;
}

function display_error($error_message) {
    global $app_path;
    include APP_ROOT.'/errors/error.php';
    exit;
}

function redirect($url) {
    session_write_close();
    header("Location: " . $url);
    exit;
}

// Debug to console function: https://stackoverflow.com/questions/4323411/how-can-i-write-to-the-console-in-php
// Usage: debug_to_console("Test");
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

// Start session management with a session cookie for initial load to store user data
// session_set_cookie_params(0, '/');

// Start session to store user and cart data
session_start();
?>
