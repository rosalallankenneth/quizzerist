<?php
  session_start();
  if(!isset($_SESSION['admin'])) {
    header("Location: ./login.php");
  }
  if(!isset($_SESSION['viewID'])) {
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
  <link rel="stylesheet" href="../styles/index.css">
  <link rel="stylesheet" href="./styles/view-quiz.css">
  
  <title>View Quiz | Quizzerist</title>

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
    <input id="quizID" type="text" value="<?php echo $_SESSION['viewID']; ?>" style="display: none" />

    <div class="topContainer mt-4 pt-4">

      <div class="h5 p-0 m-0">
        <a href="./index.php">Quizzes</a>
        / <span id="bc-title"></span>
      </div>

    </div>
    <hr>

    <div class="container viewContainer mb-4">
      <div class="actionsBtnContainer">
        <p class="m-0">Date created: <span id="dateCreated"></span></p>
        <div>
          <a id="btn-publish" href="./server/setPublish.php" class="btn btn-sm btn-success">
            Publish / Unpublish
          </a>
        </div>
      </div>

      <div class="detailsContainer card mt-3">
        <div class="card-body">
          <div>
            <small>Title:</small>
            <div id="title" class="text-theme"></div>
          </div>
          <div>
            <small>Description:</small>
            <div id="desc"></div>
          </div>
          <div>
            <small>Author:</small>
            <div id="author"></div>
          </div>
        </div>
      </div>

      <div class="card mt-4">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs" id="card-nav" role="tablist">

            <li class="nav-item">
              <a class="nav-link active" href="#questions-pane" role="tab" aria-controls="description" aria-selected="true">
                Quiz Content
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link"  href="#submissions" role="tab" aria-controls="history" aria-selected="false">
                Submission Results
              </a>
            </li>

          </ul>
        </div>

        <div class="card-body">
          <div class="tab-content">
  
            <div id="questions-pane" class="tab-pane active" id="description" role="tabpanel">
              <div class="px-3">
                <p>
                  <span id="total-items" class="font-weight-bold"></span> | 
                  <span id="total-points" class="font-weight-bold"></span>
                </p>
              </div>
            </div>
            
            <div class="tab-pane table-responsive" id="submissions" role="tabpanel" aria-labelledby="history-tab">  
              <table class="table">
                  <tr>
                    <th>Username</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Score</th>
                    <th>Date</th>
                  </tr>
                  <tbody>
                    <tr>
                      <td>Marites123</td>
                      <td>Ponce</td>
                      <td>Marites</td>
                      <td>Balbahutob</td>
                      <td>10/10</td>
                      <td>Feb 25, 2020</td>
                    </tr>
                  </tbody>
              </table>
              <p><small>* Markup data only</small></p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script src="../lib/axios.min.js"></script>
  <script src="../lib/jquery-3.5.1.min.js"></script>
  <script src="../lib/bootstrap.min.js"></script>
  <script src="./scripts/viewQuizHandler.js"></script>
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