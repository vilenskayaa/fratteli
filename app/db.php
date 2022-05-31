<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$db = mysqli_connect(
  'localhost',
  'root',
  'root',
  'fratteli'
);

if (!$db) {
  die('Error connect to DataBase');
}