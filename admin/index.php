<?php
  session_start();
  if(!isset($_SESSION['admin'])) {
    header("Location: ./login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../lib/bootstrap.min.css">
  <script src="../lib/jquery-3.5.1.min.js"></script>

  <link rel="stylesheet" href="../styles/global.css">
  <link rel="stylesheet" href="../styles/index.css">
  
  <title>Quizzes | Quizzerist</title>

</head>
<body class="bg-light">
  
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light shadow-lg p-2 fixed-top">
    <div class="container">
      <a href="./index.php" class="navbar-brand">
        <img id="banner" src="../assets/banner.png" alt="banner">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item active ml-3">
            <a class="nav-link" href="./index.php">Quizzes</a>
          </li>
          <li class="nav-item ml-3">
            <a class="nav-link" href="./create-quiz.php">Create Quiz</a>
          </li>
          <li class="nav-item ml-3">
            <a class="nav-link" href="./server/logoutAdmin.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- PAGE CONTENT -->
  <div class="content container mb-4 pb-4">

    <div class="topContainer mt-4 pt-4">
      <div class="h2 p-0 m-0">Quizzes</div>
    </div>
    <hr>

    <!-- LIST OF PUBLISHED QUIZZES -->
    <div class="quizListContainer mb-4">

    </div>
  </div>

  <script src="../lib/axios.min.js"></script>
  <script src="../lib/jquery-3.5.1.min.js"></script>
  <script src="../lib/bootstrap.min.js"></script>
  <script src="./scripts/adminQuizzesHandler.js"></script>
  <script>
    getQuizzes();
  </script>
</body>
</html>