<?php


session_start();
require_once '../db.php';

header("Content-Type: application/json;");
$user_id = $_SESSION['user']['id'];

print_r($_SESSION['user']);

try {
    
    $json = file_get_contents('php://input');
    $req = json_decode($json, true);

    $answer_ids = $req['answer_ids'];
    $test_id = $req["test_id"];

    $answer_ids = array_map(function($i) { return "'$i'"; }, $answer_ids);
    $selectAnswersFromDbQuery = "SELECT * FROM `answer` WHERE `answer_id` IN (".implode(",", $answer_ids).")";

    $answersData = $db->query($selectAnswersFromDbQuery);

    $answersList = [];

    while ($answer = $answersData->fetch_assoc()) {
        array_push($answersList, $answer);
    }

    $selectCountQuestionsOfTest = "SELECT COUNT(*) AS `questions_count` FROM `question` WHERE `test_id` = $test_id";
    $countQuestions = (int)$db->query($selectCountQuestionsOfTest)->fetch_assoc()["questions_count"];

    $countOfCorrectAnswers = array_reduce($answersList, function($carry, $item) {
        if ($item["is_correct"]) {
            return $carry + 1;
        }
        return $carry;
    }, 0);

    $rating = round($countOfCorrectAnswers * 100 / $countQuestions, 2);

    $selectStudentId = "SELECT `student_id` FROM `student` WHERE `user_id` = '$user_id'";
    $student_id = (int)$db->query($selectStudentId)->fetch_assoc()["student_id"];

    $insertTestResult = "INSERT INTO `exam`
        (`exam_id`, `student_id`, `test_id`, `exam_rating`) VALUES
        (NULL, '$student_id', '$test_id', '$rating')";

    echo $insertTestResult;
    $db->query($insertTestResult);    
    $rating_id = mysqli_insert_id($db);

    echo json_encode(array(
        "count_questions" => $countQuestions,
        "count_correct" => $countOfCorrectAnswers,
        "rating" => $rating,
        "exam_id" => $rating_id
    ), JSON_UNESCAPED_UNICODE);

} catch (\Exception $e) {
    echo json_encode($e->getMessage(), JSON_UNESCAPED_UNICODE);
}