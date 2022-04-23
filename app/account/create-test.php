<?php

session_start();

try {
    require_once '../db.php';

    print_r($_POST);
    
    $test_title = $_POST['test_title'];
    $test_time = $_POST['test_time'];
    $test_level = $_POST['test_level'];
    $test_complexity = $_POST['test_complexity'];
    $test_creator = $_SESSION['user']['id'];
    
    $query = "INSERT INTO `test` 
        (`test_id`, `test_title`, `test_level`, `test_time`, `text_complexity`) VALUES
        (NULL,'$test_title','$test_level','$test_time','$test_complexity')
    ";
    $res = mysqli_query($db, $query);  
    
    echo "<br>";
    var_dump($res);

} catch (\Exception $e) {

    var_dump($e);
}

