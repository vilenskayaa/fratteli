<?php

session_start();
require_once '../db.php';

header("Content-Type: application/json;");

$user_id = $_SESSION['user']['id'];
$role = $_SESSION['user']['role'];
$test_id = $_GET["test_id"] ?? 0;

if ($test_id) {
    $selectTest = "SELECT * FROM `test` WHERE `test_id` = '$test_id'";
    $selectQuestions = "SELECT * FROM `question` WHERE `test_id` = '$test_id'";

    $testData = $db->query($selectTest)->fetch_assoc();
    $questionsData = $db->query($selectQuestions);

    $res = [
        "test_id" => $testData["test_id"],
        "test_title" => $testData["test_title"],
        "test_time" => $testData["test_time"],
        "test_complexity" => $testData["test_complexity"],
        "test_level" => $testData["test_level"],
        "questions" => [],
        "questions_count" => 0
    ];

    while ($question = $questionsData->fetch_assoc()) {
        $question_id = $question["question_id"];
        $selectAnswer = "SELECT * FROM `answer` WHERE `question_id` = '$question_id'";
        $answersData = $db->query($selectAnswer);

        $question["answers"] = array();

        while ($answer = $answersData->fetch_assoc()) {
            $answer["is_correct"] = (bool)$answer["is_correct"];
            array_push($question["answers"], $answer);
        }

        array_push($res["questions"], $question);
    }
} else {
    if ($role === 'student') {
        $selectTest = "SELECT 
    t.`test_id`, t.`test_title`, t.`test_level`, t.`test_time`, t.`test_complexity`, t.`created_by`,
    (SELECT COUNT(*) FROM `question` AS q WHERE q.`test_id` = t.`test_id`) as `questions_count`
    FROM `test` AS t inner join test_group  tg on tg.test_id = t.test_id inner join student s on s.group_id = tg.group_id 
    where user_id = {$user_id}";
    } else {
        $selectTest = "SELECT 
    t.`test_id`, t.`test_title`, t.`test_level`, t.`test_time`, t.`test_complexity`, t.`created_by`,
    (SELECT COUNT(*) FROM `question` AS q WHERE q.`test_id` = t.`test_id`) as `questions_count`
    FROM `test` AS t where t.created_by = {$user_id}";
    }
    $res = queryAll($db, $selectTest);
}

echo json_encode($res, JSON_UNESCAPED_UNICODE);
