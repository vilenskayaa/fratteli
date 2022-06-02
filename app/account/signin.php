<?php

session_start();

require_once '../db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$key = signin($email, md5($password), $db);

$url = $_SESSION['user']['role'] === 'admin' ? '/web/amaterials.php' : '/web/lessons.php';

echo json_encode(['key' => $key, 'url' => $url]);


// --------------------------------------------------------


function signin($email, $password, $db)
{
  $query = "SELECT * FROM `user` WHERE user_email='$email' AND user_password= '$password'";
  $check_user = mysqli_query($db, $query);

  if (mysqli_num_rows($check_user) > 0) {

    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user'] = [
      "id" => $user['user_id'],
      "email" => $user['user_email'],
      "name" => $user['user_name'],
      "role" => $user['user_role'],
      "level" => $user['user_level']
    ];

    return 'true';
  } else {
    if (signin_email($email, $db) == 'true') {
      return 'email';
    } else {
      return 'password';
    }
  }
}

function signin_email($email, $db)
{
  $query = "SELECT * FROM `user` WHERE user_email='$email'";
  $check_email = mysqli_query($db, $query);

  if (mysqli_num_rows($check_email) == 0) {
    return 'true';
  }
}