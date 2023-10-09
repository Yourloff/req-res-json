<?php
ini_set('display_errors', 0);

$url = "https://my-json-server.typicode.com/Yourloff/json-server/posts";

$postId = $_POST['postId'];

if (!empty($postId)) {
    $url .= "/" . $postId;
}

$response = file_get_contents($url);

if ($response !== false) {
    $output = '';
    $data = json_decode($response, true);

    if (empty($postId)) {
        foreach ($data as $post) {
            $output .= resHtml($post);
        }
    } else {
        if (empty($data) || isset($data['error'])) {
            echo "Ошибка: Пост не найден.";
        } else {
            $output .= resHtml($data);
        }
    }
    $html = "<tr><th>id пользователя</th><th>Заголовок</th><th>Текст</th></tr>" . $output;
    echo $html;
} else {
    if (http_response_code() == 404) {
        echo "Ошибка: Пост не найден.";
    } else {
        echo "Ошибка при получении ответа.";
    }
}

function resHtml($post): string
{
    $html = '';
    $html .= '<tr>';
    $html .= '<td>' . $post['userId'] . '</td>';
    $html .= '<td>' . $post['title'] . '</td>';
    $html .= '<td>' . $post['body'] . '</td>';
    $html .= '</tr>';

    return $html;
}
