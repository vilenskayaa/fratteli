<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {
    $select = "SELECT * FROM `review` as r LEFT JOIN `user` AS u ON r.`user_id` = u.`user_id` ORDER BY review_id DESC";

    $res = [];

    $reviewsData = $db->query($select);

    while ($reviews = $reviewsData->fetch_assoc()) {
      array_push($res, $reviews);
    }
    
    echo json_encode($res);
} catch (Exception $e) {
    echo json_encode(array(
        "error" => $e->getMessage(),
        "success" => false
    ));
}
