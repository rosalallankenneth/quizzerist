<?php
  session_start();

  require_once 'dbHandler.inc.php';

  $publish = $_SESSION['publish'];
  $id = $_SESSION['viewID'];

  if($publish == "1") {
    $publish = "0";
  } else {
    $publish = "1";
  }

  $sql = "UPDATE quizzes SET published='$publish' WHERE quiz_ID='$id';";
  $result = mysqli_query($con, $sql) or die(mysqli_error($con));

  header("Location: ../view-quiz.php");

?>