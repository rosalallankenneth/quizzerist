<?php
  require_once 'dbHandler.inc.php';
  session_start();

  header('Content-type: application/json');
  $_POST = json_decode(array_keys($_POST)[0], true);

  $username = trim(mysqli_real_escape_string($con, $_POST['username']));
  $pwd = trim(mysqli_real_escape_string($con, $_POST['pwd']));

  function sendResponse($hasError, $msg) {
    $response = array();
    $response["error"] = $hasError;
    $response["message"] = $msg;

    echo json_encode($response);
    exit();
  }

  if(empty($username) || empty($pwd)) {
    sendResponse(true, "Unable to login. Please fill in all the required fields.");
  }
  
  $sql = "SELECT username, pwd FROM admin WHERE username='$username'";
  $result = mysqli_query($con, $sql);
  $count = mysqli_num_rows($result);

  if($count < 1) {
    sendResponse(true, "Unable to login. User does not exists.");
  }

  while($row = mysqli_fetch_assoc($result)) {
    if($row['username'] == $username && $row['pwd'] == $pwd) {
      $_SESSION['admin'] = $username;
      sendResponse(false, "Login successful.");
    } else {
      sendResponse(true, "Unable to login. Invalid login credentials.");
    }
  }
  