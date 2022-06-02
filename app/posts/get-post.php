<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {
    $json = file_get_contents('php://input');
    $req = json_decode($json, true);
    $res = [];

    $selectPosts = "SELECT * FROM `posts` where post_id = {$req['id']}";

    $postsData = $db->query($selectPosts);

    echo json_encode($postsData->fetch_assoc());
} catch (Exception $e) {
    echo json_encode(array("error" => $e->getMessage(), "success" => false));
}
