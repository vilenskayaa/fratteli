<?php

session_start();
require_once '../db.php';

// header("Content-Type: application/json;");

try {

    $user_id = $_SESSION["user"]["id"];

    if (!$user_id) {
        throw new Exception("Необходимо авторизация!");
    }

    $word_italian = $_POST["word_italian"];
    $word_rus = $_POST["word_rus"];
    
    $path = 'uploads/' . time() . $_FILES['word_picture']['name'];
    if (!move_uploaded_file($_FILES['word_picture']['tmp_name'], '../' . $path)) {

    }
    $word_picture = '/app/' . $path;

    $insetWordRow = "INSERT INTO `word`
        (`word_italian`, `word_rus`, `word_picture`, `created_by`) VALUES
        ('$word_italian', '$word_rus', '$word_picture', '$user_id');
    ";

    $groupData = $db->query($insetWordRow);

    $res = array("word_id" => mysqli_insert_id($db));
    $_SESSION['message'] = "Word created";

    header("Location: /web/amaterials.php");
} catch (Exception $e) {
    echo json_encode($e->getMessage(), JSON_UNESCAPED_UNICODE);
}