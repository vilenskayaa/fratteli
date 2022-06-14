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

    $lesson_date = explode(' ', $req["lesson_date"])[0];
    $lesson_time = explode(' ', $req["lesson_date"])[1];
    $lesson_link = $req["lesson_link"];

    $selectLessonOnDay = "SELECT l.* FROM `lesson` l inner join `group` g on g.group_id = l.group_id
                           WHERE l.lesson_date = '$lesson_date' AND g.teacher_id = $teacher_id";
    $res = queryAll($db, $selectLessonOnDay);

    $lessonTimeInt = explode(':', $lesson_time);
    $lessonTimeInt = (int)($lessonTimeInt[0] ?? 0 . $lessonTimeInt[1] ?? 0);
    foreach ($res as $item) {
        $tmpTime = $item['lesson_time'];
        $tmpTimeInt = $tmpTime ? explode(':', $tmpTime) : [];
        $tmpTimeInt = (int)($tmpTimeInt[0] ?? 0 . $tmpTimeInt[1] ?? 0);

        if ($lessonTimeInt < $tmpTimeInt + 100 && $lessonTimeInt > $tmpTimeInt - 100) {
            throw new Exception("У вас уже есть занятие на это время");
        }
    }

    $insertLesson = "INSERT INTO `lesson`
        (`lesson_id`, `group_id`, `lesson_title`, `lesson_date`, `lesson_time`, `lesson_link`) VALUES
        (NULL, '$group_id', '$lesson_title', '$lesson_date', '$lesson_time', '$lesson_link');";

    $created = $db->query($insertLesson);

    if($created) {
        $res = array("lesson_id" => mysqli_insert_id($db), "success" => true);

        echo json_encode($res);
    } else {
        throw new Exception("Ой-ой, какая-то неизвестная ошибка, сообщите нам об этом!");
    }

} catch (Exception $e) {
    echo json_encode(array(
        "error" => $e->getMessage(),
        "success" => false
    ));
}