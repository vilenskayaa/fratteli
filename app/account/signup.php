<?php

session_start();

require_once '../db.php';

$email = $_POST['email'];
$name = $_POST['name'];
$password = md5($_POST['password']);
$role = $_POST['role'];
$level = $_POST['level'];

$query = "INSERT INTO user VALUE (NULL, '$email', '$name', '$password', '$role', '$level')";
mysqli_query($db, $query);

$response = ["key" => true];
echo json_encode($response);