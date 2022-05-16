<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {

    $user_id = $_SESSION["user"]["id"];

    if (!$user_id) {
        throw new Exception("Необходимо авторизация!");
    }
    

    $word_italian = $_POST["word_italian"];
    $word_rus = $_POST["word_rus"];
    $word_picture = $_POST["word_picture"];

    $insetWordRow = "INSERT INTO `word`
        (`word_id`, `word_italian`, `word_rus`, `word_picture`, `created_by`) VALUES
        (NULL, '$word_italian', '$word_rus', '$word_picture', '$user_id');
    ";

    $groupData = $db->query($insetWordRow);

    $res = array("word_id" => mysqli_insert_id($db));

    echo json_encode($res);
} catch (Exception $e) {
    echo json_encode($e->getMessage(), JSON_UNESCAPED_UNICODE);
}