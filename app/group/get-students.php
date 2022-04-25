<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");
$user_id = $_SESSION['user']["id"];
$group_id = $_GET["group_id"];

$selectGroupStudents = "SELECT * FROM `user` AS u LEFT JOIN `student` AS s ON u.`user_id` = s.`user_id` WHERE s.`group_id` = '$group_id'";

$res = [];

$studentsStudentsData = $db->query($selectGroupStudents);

while ($student = $studentsStudentsData->fetch_assoc()) {
    array_push($res, $student);
}

echo json_encode($res, JSON_UNESCAPED_UNICODE);