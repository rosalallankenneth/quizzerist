<?php
  // THIS SCRIPT RETRIEVES ALL THE QUIZ RECORDS FROM THE DATABASE

  require_once 'dbHandler.inc.php';

  $sql = "SELECT * FROM quizzes WHERE deleted='0' ORDER BY date_created ASC;";
  $result = mysqli_query($con, $sql) or die(mysqli_error($con));
  $count = mysqli_num_rows($result);

  if($count > 0) {
    $response = array();		
        	
		while($row = mysqli_fetch_assoc($result)) {
      $data = array();		
      
			$data["quiz_ID"] = $row['quiz_ID'];
			$data["author_ID"] = $row['author_ID'];
			$data["title"] = $row['title'];
			$data["description"] = $row['description'];
			$data["date_created"] = $row['date_created'];
      $data["published"] = $row['published'];
      $_SESSION['publish'] = $row['published'];
      
      array_push($response, $data);
		}
    echo json_encode($response);
  } else {
    echo false;
  }

?>