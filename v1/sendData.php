<?php
$url = 'https://my-json-server.typicode.com/Yourloff/json-server/posts';

$postData = [
    "title" => $_POST["postTitle"],
    "body" => $_POST["postBody"],
    "userId" => $_POST["userId"]
];

$options = [
    "http" => [
        "method" => "POST",
        "header" => "Content-Type: application/json",
        "content" => json_encode($postData)
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);
echo $response;
