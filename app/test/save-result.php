<?php


session_start();
require_once '../db.php';

header("Content-Type: application/json;");
$user_id = $_SESSION['user']['id'];

try {

    $json = file_get_contents('php://input');
    $req = json_decode($json, true);

    $answer_ids = $req['answer_ids'];
    $test_id = $req["test_id"];

    if (count($answer_ids) == 0) {
        throw new Exception("Вы не ответили ни на один вопрос! Пройдите тест позже:)");
    }

//    $answer_ids = array_map(function($i) { return "'$i'"; }, $answer_ids);
    $selectAnswersFromDbQuery = "SELECT * FROM `answer`";

    $answersData = $db->query($selectAnswersFromDbQuery);

    $answersList = [];

    while ($answer = $answersData->fetch_assoc()) {
        array_push($answersList, $answer);
    }

    $selectCountQuestionsOfTest = "SELECT COUNT(*) AS `questions_count` FROM `question` WHERE `test_id` = $test_id";
    $countQuestions = (int)$db->query($selectCountQuestionsOfTest)->fetch_assoc()["questions_count"];

    $countOfCorrectAnswers = 0;

    for($i = 0; $i<count($answer_ids); $i++){
        for ($j = 0;  $j<count($answersList); $j++) {

            if($answer_ids[$i]==$answersList[$j]["answer_id"]){
                if ($answersList[$j]["is_correct"]) {
                    $countOfCorrectAnswers++;
                }
            }
            else{
                if($answer_ids[$i]==$answersList[$j]["answer_title"]){
                    if ($answersList[$j]["is_correct"]) {
                        $countOfCorrectAnswers++;
                    }
                }
            }
        }
    }

    $rating = round($countOfCorrectAnswers * 100 / $countQuestions, 2);

    $selectStudentId = "SELECT `student_id` FROM `student` WHERE `user_id` = '$user_id'";
    $student_id = (int)$db->query($selectStudentId)->fetch_assoc()["student_id"];

    $selectResultsByTestIdAndStudentId = "SELECT * FROM `exam` WHERE `student_id` = $student_id AND `test_id` = $test_id";
    $res = $db->query($selectResultsByTestIdAndStudentId)->fetch_assoc()["exam_id"];
    $exam_id = (int)$res["exam_id"] ?? false;

    if (!$exam_id) {
        $insertTestResult = "INSERT INTO `exam`
        (`exam_id`, `student_id`, `test_id`, `exam_rating`) VALUES
        (NULL, '$student_id', '$test_id', '$rating')";

        $db->query($insertTestResult);    
    } else {
        if ((int)$res['count_attempts'] > 2) {
            throw new Exception('Максимальное количество попыток - 3. Вы истратили все.');
        }

        $updateTestResult = "UPDATE `exam` SET count_attempts = count_attempts + 1, `exam_rating` = $rating";
        $db->query($updateTestResult); 
    }

    $rating_id = $db->query($selectResultsByTestIdAndStudentId)->fetch_assoc()["exam_id"];
    echo json_encode(array(
        "success" => true,
        "count_questions" => $countQuestions,
        "count_correct" => $countOfCorrectAnswers,
        "rating" => $rating,
        "exam_id" => $rating_id
    ), JSON_UNESCAPED_UNICODE);
} catch (\Exception $e) {
    echo json_encode(array("error" => $e->getMessage(), "success" => false), JSON_UNESCAPED_UNICODE);
}