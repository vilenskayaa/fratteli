<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {
    
    $json = file_get_contents('php://input');
    $teacher_id = $_SESSION["user"]["id"];
    
    $lesson_date = $_GET["lesson_date"];

    $selectLessonOnDay = "SELECT * FROM `lesson` WHERE `lesson_date` = '$lesson_date';";
    $res = [];

    $lessonsData = $db->query($selectLessonOnDay);

    while($lesson = $lessonsData->fetch_assoc()){
        array_push($res, $lesson);
    }

    echo json_encode($res);

} catch (Exception $e) {
    echo json_encode(array(
        "error" => $e->getMessage(),
        "success" => false
    ));
}