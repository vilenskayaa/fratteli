<?php

session_start();
require_once '../db.php';

// header("Content-Type: application/json;");

try {

    $user_id = $_SESSION["user"]["id"];

    if (!$user_id) {
        throw new Exception("Необходимо авторизация!");
    }

    $postHeader = $_POST["post_header"];
    $postText = $_POST["post_text"];

    $path = 'uploads/' . time() . $_FILES['post_picture']['name'];
    if (!move_uploaded_file($_FILES['post_picture']['tmp_name'], '../' . $path)) {

    }
    $postPicture = '/app/' . $path;

    $insetPostRow = "INSERT INTO `posts`
        (`post_header`, `post_text`, `post_picture`) VALUES 
        ('{$postHeader}','{$postText}','{$postPicture}');
    ";

    $groupData = $db->query($insetPostRow);
    $id = mysqli_insert_id($db);
    $res = array("post_id" => $id);

    $_SESSION['message'] = "Post created";

    header("Location: /web/amaterials.php");
} catch (Exception $e) {
    echo json_encode($e->getMessage(), JSON_UNESCAPED_UNICODE);
}