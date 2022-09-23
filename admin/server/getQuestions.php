<?php

  require_once 'dbHandler.inc.php';

  $quizID = trim(mysqli_real_escape_string($con, $_GET['id']));

  $sql = "SELECT * FROM question WHERE quiz_ID='$quizID'";
  $result = mysqli_query($con, $sql) or die(mysqli_error($con));
  $count = mysqli_num_rows($result);

  if($count > 0) {
    $response = array();

		while($row = mysqli_fetch_assoc($result)) {
      $data = array();		
      
			$data["question_ID"] = $row['questions_ID'];
			$data["quiz_ID"] = $row['quiz_ID'];
			$data["question"] = $row['question'];
			$data["choices"] = $row['choices'];
			$data["answer"] = $row['answer'];
			$data["remark"] = $row['remark'];
      
      array_push($response, $data);
		}
    echo json_encode($response);
  } else {
    echo false;
  }

?>