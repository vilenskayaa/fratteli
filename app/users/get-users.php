<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {
    $json = file_get_contents('php://input');
    $req = json_decode($json, true);

    $select = "select * from user where user_role != 'admin'";
    $res = queryAll($db, $select);

    echo json_encode($res);
} catch (\Throwable $e) {
    echo json_encode(array(
        "error" => $e->getMessage(),
        "success" => false
    ));
}