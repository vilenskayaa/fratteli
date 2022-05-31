<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {
    $teacher_id = $_SESSION["user"]["id"];

    $json = file_get_contents('php://input');
    $req = json_decode($json, true);

    $groupId = $req["group_id"];

    $select = "SELECT count(*) as count FROM lesson WHERE group_id = {$groupId}";
    $res = $db->query($select)->fetch_assoc();

    if ($res['count'] > 0) {
        throw new Exception('Нельзя удалить, есть уроки для этой группы!');
    }

    $deleteUserFromGroup = "DELETE FROM `student` WHERE `group_id` = '$groupId'";
    $deleteGroup = "DELETE FROM `group` WHERE `group_id` = '$groupId'";

    $db->query($deleteUserFromGroup);
    $success = $db->query($deleteGroup);
    $res = array("removed" => mysqli_affected_rows($db), 'success' => true);

    echo json_encode($res);

} catch (Exception $e) {
    echo json_encode(array("error" => $e->getMessage(), "success" => false), JSON_UNESCAPED_UNICODE);
}