<?php
  if(!isset($_SESSION['username'])) {
    //header("Location: ./login.php");
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
  <link rel="stylesheet" href="./styles/create-quiz.css">
  
  <title>Create Quiz | Quizzerist</title>

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
          <li class="nav-item ml-3">
            <a class="nav-link" href="./index.php">Quizzes</a>
          </li>
          <li class="nav-item active ml-3">
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

    <div class="h2 my-4 pt-4 text-center">
      Create a new Quiz
    </div>

    <div class="container createContainer mb-4">
      <form id="addQuizForm" action="/create-quiz.php" method="POST" class="form">

        <div class="card">
          <div class="card-header bg-theme">
            Quiz Information
          </div>

          <div class="card-body">
            <div class="form-group">
              <label for="title" class="form-label">Title</label>
              <input id="title" type="text" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="desc" class="form-label">Description</label>
              <input id="desc" type="text" class="form-control" required>
            </div>
          </div>
        </div>
        
        <div class="card mt-4">
          <div class="card-header bg-theme">
            Quiz Content
          </div>
          
          <div class="card-body">
            
          <div id="1" class="questionWrap">
            <div class="form-group">
              <label for="question" class="form-label font-weight-bold">Question #1</label>
              <input id="q-1" type="text" class="form-control question" required>
            </div>
            <div class="container">
              <div class="form-group">
                <label for="choice" class="form-label">Choices</label>
                <input type="text" class="form-control choice c1" placeholder="Choice 1" required>
                <input type="text" class="form-control choice c1" placeholder="Choice 2" required>
                <input type="text" class="form-control choice c1" placeholder="Choice 3" required>
                <input type="text" class="form-control choice c1" placeholder="Choice 4" required>
              </div>
              <div class="form-group answerContainer">
                <label for="choice" class="form-label">Answer</label>
                <select class="form-control answer a1">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>

                <label for="choice" class="form-label">Remark</label>
                <input type="number" class="form-control remark r1" placeholder="Enter a value in digits" required>
              </div>
            </div>
          </div>

          <div>
            <button id="btn-addQuestion" type="button" class="btn bg-theme mt-3 mr-2">Add a Question</button>
            <button id="btn-deleteQuestion" type="button" class="btn btn-danger mt-3">Delete Last Question</button>
          </div>
          </div>
        </div>

        <p class="text-center pt-4">Please do not leave a field blank and review all your inputs.</p>
        <div class="actionsBtnContainer">
          <select id="publish" class="form-control mr-3">
            <option value="1">Publish</option>
            <option value="0">Do not Publish</option>
          </select>
          <button class="btn btn-success">Create Quiz</button>
        </div>
      
      </form>
    </div>
  </div>

  <script src="../lib/axios.min.js"></script>
  <script src="../lib/jquery-3.5.1.min.js"></script>
  <script src="../lib/bootstrap.min.js"></script>
  <script src="./scripts/addDeleteQuestionHandler.js"></script>
  <script src="./scripts/addQuizHandler.js"></script>
  <script>
    $(document).ready(() => {
      $('#card-nav a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
      })
    })
  </script>
</body>
</html>