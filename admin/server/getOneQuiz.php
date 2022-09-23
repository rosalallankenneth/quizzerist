<?php

  session_start();
  require_once 'dbHandler.inc.php';

  $quizID = trim(mysqli_real_escape_string($con, $_GET['id']));

  $sql = "SELECT * FROM quizzes WHERE quiz_ID='$quizID' ORDER BY quiz_ID DESC LIMIT 1;";
  $result = mysqli_query($con, $sql) or die(mysqli_error($con));
  $count = mysqli_num_rows($result);

  if($count > 0) {
    $data = array();		
    
		while($row = mysqli_fetch_assoc($result)) {
      
			$data["quiz_ID"] = $row['quiz_ID'];
			$data["author_ID"] = $row['author_ID'];
			$data["title"] = $row['title'];
			$data["description"] = $row['description'];
			$data["date_created"] = $row['date_created'];
			$_SESSION["publish"] = $row['published'];

		}
    echo json_encode($data);
  } else {
    echo false;
  }

?>