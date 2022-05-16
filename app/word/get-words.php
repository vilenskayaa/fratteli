<?php

session_start();
require_once '../db.php';
require_once 'word_state.php';

header("Content-Type: application/json;");

try {
    
    $user_id = $_SESSION['user']['id'];

    $state = $_GET["state"];

    if (isValidState($state)) {
        $selectWords = "SELECT * FROM `user_word` AS `uw` LEFT JOIN `word` AS `w` ON `w`.`word_id` = `uw`.`word_id`";

        $words_list = [];
        $rows = $db->query($selectWords);

        while ($row = $rows->fetch_assoc()) {
            array_push($words_list, $row);
        }

        echo json_encode($words_list);
    } else {
        $selectWords = "SELECT * FROM `word`";

        $words_list = []; 
    
        $rows = $db->query($selectWords);
    
        while($row = $rows->fetch_assoc()) {
            array_push($words_list, $row);
        }
    
        echo json_encode($words_list);
    }

    

} catch (Exception $e) {
    echo json_encode(array(
        "error" => $e->getMessage(),
        "success" => false
    ));
}