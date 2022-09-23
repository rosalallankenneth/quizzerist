<?php
  session_start();

  require_once 'dbHandler.inc.php';
  header('Content-type: application/json');
  $_POST = json_decode(file_get_contents("php://input"), true);

  $title = trim(mysqli_real_escape_string($con, $_POST['title']));
  $desc = trim(mysqli_real_escape_string($con, $_POST['desc']));
  $questions = $_POST['questions'];
  $publish = trim(mysqli_real_escape_string($con, $_POST['publish']));
  $author = $_SESSION['admin'];

  function sendResponse($hasError, $msg) {
    $response = array();
    $response["error"] = $hasError;
    $response["message"] = $msg;

    echo json_encode($response);
    exit();
  }
  
  $sqlQuiz = "INSERT INTO quizzes (author_ID, title, description, published) values ('$author', '$title', '$desc', '$publish')";
  $resultQuiz = mysqli_query($con, $sqlQuiz);

  if($resultQuiz) {
    $sqlID = "SELECT quiz_ID from quizzes order by quiz_ID desc limit 1";
    $resultID = mysqli_query($con, $sqlID);
    $quizID = "";

		while($row = mysqli_fetch_assoc($resultID)) {
      $quizID = $row["quiz_ID"];
    }

    $sqlQuestions = "INSERT INTO question (quiz_ID, question, choices, answer, remark) values ";

    foreach ($questions as $q) {
      $question = $q["question"];
      $choices = $q["choices"];
      $answer = $q["answer"];
      $remark = $q["remark"];
    
      $sqlQuestions .= "('$quizID','$question','$choices','$answer','$remark'),";
    }
    $sqlQuestions = rtrim($sqlQuestions, ',');

    $result = mysqli_query($con, $sqlQuestions) or die(mysqli_error($con));
    
    if($result) {
      sendResponse(false, "Quiz was created successfully.");
    } else {
      sendResponse(true, "There was an error in creating the quiz questions.");
    }
  } else {
    sendResponse(true, "There was an error in creating the quiz details.");
  }
  
