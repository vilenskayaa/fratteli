<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {
    $userId = $_SESSION['user']['id'];
    $list = [];

    $select = "select w.* from word w left join vocabulary v on v.word_id = w.word_id and v.user_id = {$userId} where v.vocabulary_id is null";

    $res = $db->query($select);

    while ($item = $res->fetch_assoc()) {
        $list[] = $item;
    }

    echo json_encode($list, JSON_THROW_ON_ERROR);
} catch (Exception $e) {
    echo json_encode(array(
        "error" => $e->getMessage(),
        "success" => false
    ));
}