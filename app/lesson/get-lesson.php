<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {

    $json = file_get_contents('php://input');
    $user_id = $_SESSION["user"]["id"];
    $user_role = $_SESSION["user"]["role"];

    $lesson_date = $_GET["lesson_date"] ?? null;
    $lesson_id = $_GET["lesson_id"] ?? null;


    $select = "SELECT * FROM `lesson` as l
    ";

    $res = [];


    if ($lesson_date) {
        $select .= $user_role == "teacher" ?
            "LEFT JOIN `group` as g ON g.group_id = l.group_id WHERE g.`teacher_id` = $user_id"
            : "LEFT JOIN `student` AS s ON s.`group_id` = l.`group_id` WHERE s.`user_id` = $user_id";
        $select .= "
        AND l.`lesson_date` = '$lesson_date'
        AND l.canceled_at IS NULL
        ";

        $lessonsData = $db->query($select);

        while ($lesson = $lessonsData->fetch_assoc()) {
            array_push($res, $lesson);
        }
    }
    if ($lesson_id) {
        $select .= $user_role == "teacher" ?
            "LEFT JOIN `group` AS g ON g.`group_id` = l.`group_id` WHERE g.`teacher_id` = $user_id" :
            "LEFT JOIN `student` AS s ON s.`group_id` = l.`group_id` WHERE s.`user_id` = $user_id";
        $select .= "
        AND l.`lesson_id` = '$lesson_id'
        ";

        $lessonsData = $db->query($select)->fetch_assoc();

        $res = $lessonsData;
    }
    if (!$lesson_id && !$lesson_date) {

        $lessonsData = $db->query($select);

        while ($lesson = $lessonsData->fetch_assoc()) {
            array_push($res, $lesson);
        }
    }



    echo json_encode($res);
} catch (Exception $e) {
    echo json_encode(array(
        "error" => $e->getMessage(),
        "success" => false
    ));
}
