<?php
  session_start();
  if(isset($_SESSION['admin'])) {
    header("Location: ./index.php");
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
  <link rel="stylesheet" href="../styles/login.css">
  
  <title>Admin Login | Quizzerist</title>

</head>
<body class="bg-light">
  
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light shadow-lg p-2 fixed-top">
    <div class="container">
      <a href="./index.php" class="navbar-brand">
        <img id="banner" src="../assets/banner.png" alt="banner">
      </a>
    </div>
  </nav>
  
  <!-- PAGE CONTENT -->
  <div class="content container pt-4">
      <!-- LOGIN FORM -->
      <form id="form-login" action="./login.php" method="POST" class="form bg-light">
        <h4 class="text-center mb-4">Admin Login</h4>
        <p><small class="text-info">Only authorized personnel are allowed here.</small></p>

        <div class="form-group">
          <label for="txt-username" class="form-label">Username</label>
          <input id="txt-username" name="username" type="text" class="form-control" placeholder="Try 'JohnDoe21'">
        </div>
        <div class="form-group">
          <label for="txt-pw" class="form-label">Password <small class="text-secondary"> (Try 'admin123')</small> </label>
          <input id="txt-pw" name="pw" type="password" class="form-control">
        </div>
        <input type="submit" id="btn-login" class="btn btn-block mb-4 bg-theme" value="Login">
      </form>
  </div>

  <script src="../lib/axios.min.js"></script>
  <script src="../lib/jquery-3.5.1.min.js"></script>
  <script src="../lib/bootstrap.min.js"></script>
  <script src="./scripts/loginAdminHandler.js"></script>
</body>
</html>