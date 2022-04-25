<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {
    
    $json = file_get_contents('php://input');
    $teacher_id = $_SESSION["user"]["id"];
    $req = json_decode($json, true);

    $group_id = $req["group_id"];
    $lesson_title = $req["lesson_title"];
    $lesson_date = $req["lesson_date"];
    $lesson_link = $req["lesson_link"];

    $selectLessonOnDay = "SELECT COUNT(*) as `count` FROM `lesson` WHERE `lesson_date` = '$lesson_date' AND `group_id` = $group_id;";
    $countLessonsOnDay = (int)$db->query($selectLessonOnDay)->fetch_assoc()["count"];

    if ($countLessonsOnDay != 0) {
        throw new Exception("Группа в этот день занята!");
    }

    $insertLesson = "INSERT INTO `lesson`
        (`lesson_id`, `group_id`, `lesson_title`, `lesson_date`, `lesson_link`) VALUES
        (NULL, '$group_id', '$lesson_title', '$lesson_date', '$lesson_link');";


    $db->query($insertLesson);

    $res = array("lesson_id" => mysqli_insert_id($db));

    echo json_encode($res);

} catch (Exception $e) {
    echo json_encode(array(
        "error" => $e->getMessage(),
        "success" => false
    ));
}