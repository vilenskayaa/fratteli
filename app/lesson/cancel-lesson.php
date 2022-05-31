<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {
    $json = file_get_contents('php://input');
    $req = json_decode($json, true);
    $lesson_id = $req["lesson_id"];

    $selectLesson = "SELECT COUNT(*) as `count` FROM `lesson` WHERE `lesson_id` = '$lesson_id' AND `canceled_at` IS NOT NULL;";
    $countLessons = (int)$db->query($selectLesson)->fetch_assoc()["count"];

    if ($countLessons != 0) {
        throw new Exception("Урок не создан либо уже отменён!");
    }

    $updateLesson = "UPDATE `lesson` SET `canceled_at` = NOW() WHERE lesson_id = {$lesson_id}";


    $db->query($updateLesson);

    $res = array("affected_rows" => mysqli_affected_rows($db), 'success' => true);

    echo json_encode($res);

} catch (Exception $e) {
    echo json_encode(array(
        "error" => $e->getMessage(),
        "success" => false
    ));
}