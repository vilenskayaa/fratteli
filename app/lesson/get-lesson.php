<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {
    
    $json = file_get_contents('php://input');
    $teacher_id = $_SESSION["user"]["id"];
    
    $lesson_date = $_GET["lesson_date"];
    $lesson_id = $_GET["lesson_id"];


    $select = "SELECT * FROM `lesson`";

    $res = [];

    
    if ($lesson_date) {
        $select .= "WHERE `lesson_date` = '$lesson_date'";
        
        $lessonsData = $db->query($select);

        while($lesson = $lessonsData->fetch_assoc()){
            array_push($res, $lesson);
        }
    }
    if ($lesson_id) {
        $select .= "WHERE `lesson_id` = '$lesson_id';";

        
        $lessonsData = $db->query($select)->fetch_assoc();

        $res = $lessonsData;
    }

    

    echo json_encode($res);

} catch (Exception $e) {
    echo json_encode(array(
        "error" => $e->getMessage(),
        "success" => false
    ));
}