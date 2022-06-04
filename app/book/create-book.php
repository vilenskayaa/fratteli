<?php

session_start();
require_once '../db.php';

// header("Content-Type: application/json;");

try {

    $user_id = $_SESSION["user"]["id"];

    if (!$user_id) {
        throw new Exception("Необходимо авторизация!");
    }

    $bookHeader = $_POST["book_name"];
    $bookLink = $_POST["book_link"];

    $path = 'uploads/' . time() . $_FILES['book_image']['book_image'];
    if (!move_uploaded_file($_FILES['book_image']['tmp_name'], '../' . $path)) {

    }
    $bookImage = '/app/' . $path;

    $insertBookRow = "INSERT INTO `books`
        (`book_name`, `book_link`, `book_image`) VALUES 
        ('{$bookHeader}','{$bookLink}','{$bookImage}');
    ";

    $groupData = $db->query($insertBookRow);
    $id = mysqli_insert_id($db);
    $res = array("book_id" => $id);

    $_SESSION['message'] = "Книга загружена";

    header("Location: /web/amaterials.php");
} catch (Exception $e) {
    echo json_encode($e->getMessage(), JSON_UNESCAPED_UNICODE);
}