<?php
session_start();
require_once '../db.php';

header("Content-Type: application/json;");

$userId = $_SESSION['user']['id'] ?? 0;

try {
    $json = file_get_contents('php://input');
    $req = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

    $update = "insert into vocabulary (vocabulary_status, user_id, word_id) values ({$req['type']}, {$userId}, {$req['id']})";
    $res = $db->query($update);
    echo json_encode(['success' => $res]);
} catch (\Throwable $e) {
    echo json_encode(['error' => $e->getMessage(), 'success' => false]);
}