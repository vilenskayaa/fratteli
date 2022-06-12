<?php

session_start();

require_once '../db.php';

$email = $_COOKIE['email'];
$name = $_COOKIE['name'];
$password = md5($_COOKIE['password']);
$role = $_COOKIE['role'];
$level = $_COOKIE['level'];

$approved = $role === 'student' ? 1 : 0;
$query = "INSERT INTO user VALUE (NULL, '$email', '$name', '$password', '$role', '$level', '$approved')";
mysqli_query($db, $query);

$_SESSION['user'] = [
    "id" => mysqli_insert_id($db),
    "email" => $email,
    "name" => $name,
    "role" => $role,
    "level" => $level,
    "approved" => $approved
];

echo json_encode($role === 'student' ? true : false);