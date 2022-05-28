<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {

    $json = file_get_contents('php://input');
    $req = json_decode($json, true);

    $group_id = $_GET['id'];

    $res = array();

    $selectStudents = "SELECT * FROM `student` INNER JOIN user ON student.user_id=user.user_id WHERE `group_id` = '$group_id';";

    $groupsData = $db->query($selectStudents);
    while ($group = $groupsData->fetch_assoc()) {
        array_push($res, $group);
    }

    echo json_encode($res);
} catch (Exception $e) {
    echo json_encode(array("error" => $e->getMessage(), "success" => false));
}
