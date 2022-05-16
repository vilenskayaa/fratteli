<?php

session_start();
require_once '../db.php';
require_once 'word_state.php';

$added_state = $word_state["ADDED"];

header("Content-Type: application/json;");

try {

    $user_id = $_SESSION["user"]["id"];

    $word_id = $_GET["word_id"];

    

    $selectWordById = "SELECT COUNT(*) AS `count` FROM `word` WHERE `word_id` = '$word_id'";
    $wordExist = (int)$db->query($selectWordById)->fetch_assoc()["count"] == 1;

    if (!$wordExist) {
        throw new Exception("Произошла ошибка, такого слова не существует. Но не впадайте в депрессию, ведь Вы можете его создать! Не плачьте пожалуйста ;)");
    }

    $wordData = $db->query($selectWordById);

    $addWordToUserQuery = "INSERT INTO `user_word`
        (`id`, `word_id`, `user_id`, `state`) VALUES
        (NULL, '$word_id', '$user_id', '$added_state')
    ";

    $succes = $db->query($addWordToUserQuery);
    $res = array("id" => mysqli_insert_id($db), "word_id" => $word_id, "success" => $succes);

    echo json_encode($res);
} catch (Exception $e) {
    echo json_encode(array("error" => $e->getMessage(), "success" => false), JSON_UNESCAPED_UNICODE);
}
