<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {

    $user_id = $_SESSION["user"]["id"];
    $user_name = $_SESSION["user"]["name"]; 

    $json = file_get_contents('php://input');
    $req = json_decode($json, true);

    $reviewsText = $req["reviews_text"];
    $reviewsDate = date("d.m.Y");

    $insertReviews = "INSERT INTO `review`
        (`review_id` ,`user_id`, `review_text`, `review_date`) VALUES
        (NULL, '$user_id', '$reviewsText', '$reviewsDate')
    ";

    $succes = $db->query($insertReviews);
    $res = array(
      "name" => $user_name,
      "date" => $reviewsDate, 
      "text" => $reviewsText, 
      "success" => $succes
    );

    echo json_encode($res);
} catch (Exception $e) {
    echo json_encode(array("error" => $e->getMessage(), "success" => false), JSON_UNESCAPED_UNICODE);
}
