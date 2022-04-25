<?php


session_start();
require_once '../db.php';

header("Content-Type: application/json;");


$test_id = $_GET["test_id"];

if ($test_id) {
    $selectTest = "SELECT * FROM `test` WHERE `test_id` = '$test_id'";
    $selectQuestions = "SELECT * FROM `question` WHERE `test_id` = '$test_id'";

    $testData = $db->query($selectTest)->fetch_assoc();
    $questionsData = $db->query($selectQuestions);

    $res = array(
        "test_id" => $testData["test_id"],
        "test_title" => $testData["test_title"],
        "test_time" => $testData["test_time"],
        "test_complexity" => $testData["test_complexity"],
        "test_level" => $testData["test_level"],
        "questions" => [],
        "questions_count" => 0
    );

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
    $selectTest = "SELECT 
    t.`test_id`, t.`test_title`, t.`test_level`, t.`test_time`, t.`test_complexity`, t.`created_by`,
    (SELECT COUNT(*) FROM `question` AS q WHERE q.`test_id` = t.`test_id`) as `questions_count`
    FROM `test` AS t";
    $testsList = $db->query($selectTest);

    $res = [];

    while ($test = $testsList->fetch_assoc()) {
        array_push($res, $test);
    }
}



echo json_encode($res, JSON_UNESCAPED_UNICODE);
