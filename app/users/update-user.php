<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {
    $json = file_get_contents('php://input');
    $req = json_decode($json, true, 520, JSON_THROW_ON_ERROR);
    $userId = $req['user_id'];
    $email = $req['email'];
    $name = $req['name'];
    $level = $req['level'];
    $approved = $req['approved'];

    $update = "update user set user_email = '{$email}', user_name = '{$name}', user_level = '{$level}', approved = '{$approved}' where user_id = {$userId}";
    $res = $db->query($update);

    echo json_encode(["success" => $res], JSON_THROW_ON_ERROR);
} catch (\Throwable $e) {
    echo json_encode([
        "error" => $e->getMessage(),
        "success" => false
    ]);
}