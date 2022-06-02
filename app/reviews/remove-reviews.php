<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {
    $user_id = $_SESSION["user"]["id"];
    $user_name = $_SESSION["user"]["name"]; 

    $json = file_get_contents('php://input');
    $req = json_decode($json, true);

    $insertReviews = "DELETE FROM `review` WHERE review_id = {$req['id']}";

    $succes = $db->query($insertReviews);
    $res = [
      "success" => $succes
    ];

    echo json_encode($res);
} catch (Exception $e) {
    echo json_encode(array("error" => $e->getMessage(), "success" => false), JSON_UNESCAPED_UNICODE);
}
