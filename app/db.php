<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$db = mysqli_connect(
  'localhost',
  'fratteli',
  '123QWEfghnm,',
  'fratteli'
);

if (!$db) {
  die('Error connect to DataBase');
}

function queryAll($db, string $query): array
{
    $res = [];
    $rows = $db->query($query);

    while ($row = $rows->fetch_assoc()) {
        $res[] = $row;
    }

    return $res;
}

