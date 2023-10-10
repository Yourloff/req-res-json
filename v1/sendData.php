<?php
ini_set('display_errors', 0);

$url = 'https://jsonplaceholder.typicode.com/posts';
$postTitle = $_POST["title"];
$postBody = $_POST["body"];
$userId = $_POST["userId"];

$postData = [
    "title" => $postTitle,
    "body" => $postBody,
    "userId" => $userId
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
$html = resHtml(json_decode($response));
echo $html;

function resHtml($post): string
{
    $html = '';
    $html .= '<tr>';
    $html .= '<td>' . $post->userId . '</td>';
    $html .= '<td>' . $post->title . '</td>';
    $html .= '<td>' . $post->body . '</td>';
    $html .= '</tr>';

    return $html;
}
