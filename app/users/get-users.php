<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

try {
    $json = file_get_contents('php://input');
    $req = json_decode($json, true);
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  
    $results_per_page = 10;  
    $page_first_result = ($page-1) * $results_per_page;

    $selectCount = "select * from user where user_role != 'admin'";
    $resCount = count(queryAll($db, $selectCount));
    $select = "select * from user where user_role != 'admin' limit " . $page_first_result . ',' . $results_per_page;
    $res = queryAll($db, $select);

    echo json_encode([
        "pages" => ceil($resCount / $results_per_page),
        "users" => $res
    ]);
} catch (\Throwable $e) {
    echo json_encode(array(
        "error" => $e->getMessage(),
        "success" => false
    ));
}