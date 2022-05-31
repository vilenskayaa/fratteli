<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {

    $userId = $_SESSION["user"]["id"];

    $json = file_get_contents('php://input');
    $req = json_decode($json, true);

    $res = array();

    if ($_SESSION['user']['role'] === 'teacher') {
        $selectGroups = "SELECT * FROM `group` WHERE `teacher_id` = {$userId}";
    } else {
        $selectGroups = "SELECT g.* FROM `student` s INNER JOIN `group` g ON g.group_id = s.group_id WHERE s.user_id = {$userId}";
    }

    $groupsData = $db->query($selectGroups);
    while ($group = $groupsData->fetch_assoc()) {
        array_push($res, $group);
    }


    echo json_encode($res);
} catch (Exception $e) {
    echo json_encode(array("error" => $e->getMessage(), "success" => false));
}
