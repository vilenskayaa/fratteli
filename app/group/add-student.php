<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {

    $teacher_id = $_SESSION["user"]["id"];

    $json = file_get_contents('php://input');
    $req = json_decode($json, true);

    $student_email = $req["student_email"];
    $group_id = $req["group_id"];

    $selectUserWithEmali = "SELECT * FROM `user` WHERE `user_email` = '$student_email'";
    $userData = mysqli_query($db, $selectUserWithEmali);
    $user_row = $userData->fetch_assoc();
    $user_id = $user_row["user_id"];

    $selectStudent = "SELECT COUNT(*) as `student_count` FROM `student` WHERE `user_id` = '$user_id' AND `group_id` = '$group_id';";
    $user_already_exist = (int)$db->query($selectStudent)->fetch_assoc()["student_count"];

    if ($user_already_exist != 0) {
        throw new Exception("Такой пользователь уже добавлен в группу!");
    }

    $insertUserToGroup = "INSERT INTO `student`
        (`student_id`, `group_id`, `user_id`) VALUES
        (NULL, '$group_id', '$user_id')
    ";

    $succes = $db->query($insertUserToGroup);
    $res = array("student_id" => mysqli_insert_id($db), "group_id" => $group_id, "success" => $succes);

    echo json_encode($res);
} catch (Exception $e) {
    echo json_encode(array("error" => $e->getMessage(), "success" => false), JSON_UNESCAPED_UNICODE);
}
