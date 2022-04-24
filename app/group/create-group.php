<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {

    $teacher_id = $_SESSION["user"]["id"];
    
    $json = file_get_contents('php://input');
    $req = json_decode($json, true);

    $group_title = $req["group_title"];
    $group_level = $req["group_level"];

    $insetGroupRow = "INSERT INTO `group`
        (`group_id`, `group_title`, `group_level`, `teacher_id`) VALUES
        (NULL, '$group_title', '$group_level', '$teacher_id');
    ";

    $groupData = $db->query($insetGroupRow);

    $res = array("group_id" => mysqli_insert_id($db));

    echo json_encode($res);
} catch (Exception $e) {
    echo json_encode($e->getMessage(), JSON_UNESCAPED_UNICODE);
}