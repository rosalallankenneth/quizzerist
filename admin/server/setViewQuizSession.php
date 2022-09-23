<?php
  require_once 'dbHandler.inc.php';
  session_start();

  $_SESSION['viewID'] = $_GET['id'];

  header("Location: ../view-quiz.php");
?>