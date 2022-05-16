<?php

session_start();
require_once '../db.php';
require_once 'word_state.php';

$complete_state = $word_state["COMPLETE"];

header("Content-Type: application/json;");

try {

    $user_id = $_SESSION["user"]["id"];

    $word_id = $_GET["word_id"];

    $selectWordById = "SELECT COUNT(*) AS `count` FROM `user_word` WHERE `word_id` = '$word_id' AND `user_id` = $user_id";
    $wordExist = (int)$db->query($selectWordById)->fetch_assoc()["count"] == 1;

    if (!$wordExist) {
        throw new Exception("Произошла ошибка, такого слова не добавили... Но не впадайте в депрессию, ведь Вы можете его добавить! Не плачьте пожалуйста ;)");
    }

    $wordData = $db->query($selectWordById);

    $completeWordToUserQuery = "INSERT INTO `user_word`
        (`id`, `word_id`, `user_id`, `state`) VALUES
        (NULL, '$word_id', '$user_id', '$complete_state')
    ";

    $succes = $db->query($completeWordToUserQuery);
    $res = array("id" => mysqli_insert_id($db), "word_id" => $word_id, "success" => $succes);

    echo json_encode($res);
} catch (Exception $e) {
    echo json_encode(array("error" => $e->getMessage(), "success" => false), JSON_UNESCAPED_UNICODE);
}
