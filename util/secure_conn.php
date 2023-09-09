<?php
// This utiliy script serves 2 purposes: 
// 1. HTTPS secure connection
// 2. Solves url include path issues. If you redirect all non-HTTPS requests to HTTPS with this script,
// you can specify include paths relative to the root directory of the website (the HTTP_HOST portion).

// make sure the page uses a secure connection, change all HTTP to HTTPS again once you get a domain, SSL certificate and set up HTTPS on AWS.
$http = filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_URL);
if (!$http){
    $host = filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_URL);
    $uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);
    $url = 'http://'.$host.$uri;
    header("Location: ".$url);
    exit();
}
?>