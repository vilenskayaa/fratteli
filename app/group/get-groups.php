<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {

    $teacher_id = $_SESSION["user"]["id"];

    $json = file_get_contents('php://input');
    $req = json_decode($json, true);

    $res = array();

    $selectGroups = "SELECT * FROM `group` WHERE `teacher_id` = '$teacher_id';";

    $groupsData = $db->query($selectGroups);
    while ($group = $groupsData->fetch_assoc()) {
        array_push($res, $group);
    }

    echo json_encode($res);
} catch (Exception $e) {
    echo json_encode(array("error" => $e->getMessage(), "success" => false));
}
