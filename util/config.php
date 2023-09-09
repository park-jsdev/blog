<?php
// TODO: Change to https

// Config file:
// Use the config array to define paths and constants, so you only have to define them once.
// Don't use extract() function with user inputs as it can create constants that you don't want to exist.
// Only use it with arrays you trust.
//
// Usage:
// 
// 1. Extracting:
// include 'util/config.php';
// extract($config);
// echo $config['view_dir'];
//
// 2. Defining constants (extra step, but gives constants):
// define('DB_HOST', $config['DB_HOST']);
// extract($config);
// echo DB_HOST;
//
// Paths:
// include 'config.php';
// include $config['view_dir'] . 'header.php';
//
// 
//

$file_root = dirname(dirname(__FILE__)) . '/';

// Set the app's base url in the initial load and set as a constant.
// $current_url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$folder_name = '/' . basename(dirname(dirname(__FILE__))) . '/'; // Gets the name of folder the project is contained in.
define('FOLDER', $folder_name); // Set as constant

// $base_url = "https://" . $_SERVER['HTTP_HOST'] . '/' . $folder_name . '/';
$base_url = "http://" . $_SERVER['HTTP_HOST'] . $folder_name;

// Get the document root - this is for files, not url
$doc_root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT', FILTER_SANITIZE_STRING);

// Get the application path
// $uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
// $dirs = explode('/', $uri);
// $app_path = '/' . $dirs[1] . '/' . $dirs[2] . '/';
$app_path = dirname($_SERVER['PHP_SELF']) . '/'; // This is not constant even if defined as constant.

// Set the include path
set_include_path($doc_root . $app_path);

$constants = array(
    'app_name' => 'My Blog',
    'app_path' => $app_path,
    'app_desc' => 'This is a description of the blog',
    'app_home' => dirname($_SERVER['PHP_SELF']),
    'app_base_url' => $base_url,
  );

// Define constants for readability when using in app
define('FILE_ROOT', $file_root);
define('APP_NAME', $constants['app_name']);
// define('APP_PATH', $constants['app_path']);
define('APP_ROOT', $constants['app_base_url']);
define('APP_DESC', $constants['app_desc']);
define('HOME', $constants['app_home']);
?>