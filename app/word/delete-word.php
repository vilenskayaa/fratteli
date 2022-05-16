<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {

    $user_id = $_SESSION["user"]["id"];

    if (!$user_id) {
        throw new Exception("Необходимо авторизация!");
    }
    
    $word_id = $_GET["word_id"];

    $deleteWordById = "DELETE FROM `word` WHERE `word_id` = '$word_id'";

    $wordData = $db->query($deleteWordById);

    $res = array("removed" => mysqli_affected_rows($db));

    echo json_encode($res);
} catch (Exception $e) {
    echo json_encode($e->getMessage(), JSON_UNESCAPED_UNICODE);
}