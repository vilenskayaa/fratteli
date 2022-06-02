<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

$userId = $_SESSION['user']['id'] ?? 0;

try {
    $list = [];
    $select = "select w.*, v.vocabulary_id from word w inner join vocabulary v on v.word_id = w.word_id and vocabulary_status = 1 where v.user_id={$userId}";
    $rows = $db->query($select);

    while ($row = $rows->fetch_assoc()) {
        $list[] = $row;
    }

    echo json_encode($list, JSON_THROW_ON_ERROR);
} catch (\Throwable $e) {
    echo json_encode(['error' => $e->getMessage(), 'success' => false]);
}