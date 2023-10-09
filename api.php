<?php
$url = "https://jsonplaceholder.typicode.com/posts";
$postId = $_POST['postId'];

if (!empty($postId)) $url .= "/" . $postId;

$response = file_get_contents($url);

if ($response !== false) {
    $data = json_decode($response, true);

    if(empty($postId)) {
        foreach ($data as $post) echo resHtml($post);
    }
    else echo resHtml($data);
}

function resHtml($post): string
{
    $html = '';
    $html .= '<tr>';
    $html .= '<td>' . $post['id'] . '</td>';
    $html .= '<td>' . $post['title'] . '</td>';
    $html .= '<td>' . $post['body'] . '</td>';
    $html .= '</tr>';

    return $html;
}
