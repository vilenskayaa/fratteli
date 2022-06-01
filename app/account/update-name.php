<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {
    $user_id = $_SESSION["user"]["id"];
    $user_name = $_SESSION["user"]["name"];

    $json = file_get_contents('php://input');
    $req = json_decode($json, true);

    $newName = $req['name'];
    $update = "UPDATE user SET user_name='{$newName}' WHERE user_id={$_SESSION['user']['id']}";
    $res = $db->query($update);

    echo json_encode(["success" => $res]);
} catch (\Throwable $e) {
    echo json_encode(["error" => $e->getMessage(), "success" => false], JSON_UNESCAPED_UNICODE);
}