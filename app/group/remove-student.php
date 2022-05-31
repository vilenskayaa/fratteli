<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {

    $teacher_id = $_SESSION["user"]["id"];
    
    $json = file_get_contents('php://input');
    $req = json_decode($json, true);

    $user_id = $req["user_id"];
    $group_id = $req["group_id"];

    $deleteUserFromGroup = "DELETE FROM `student` WHERE `user_id` = '$user_id' AND `group_id` = '$group_id'";

    $succes = $db->query($deleteUserFromGroup);
    $res = array("removed" => mysqli_affected_rows($db), "success" => true);

    echo json_encode($res);

} catch (Exception $e) {
    echo json_encode(array("error" => $e->getMessage(), "success" => false), JSON_UNESCAPED_UNICODE);
}