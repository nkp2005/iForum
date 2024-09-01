<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  // If not logged in, redirect to the index.php page
  header('Location: index.php');
  exit; // Ensure no further code is executed
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Welcome to the - iForum</title>

  <Style>
    .mainContainer {
      margin-top: 60px;
      margin-bottom: -12px;
    }
    .overview-container {
      margin-top: 10px;
    }

    .mt-4 {
      margin-top: 0.6rem !important;
    }

    .bg-orange {
      background-color: #151E3F;
    }

    .active-success {
      background-color: #28A745;
    }

    ._btn {
      margin-left: 450px;
    }
  </Style>

</head>

<body>
  <?php require 'components/_header.php'; ?>

  <div class="mainContainer row">
    <div class=" sidebar d-flex flex-column flex-shrink-0 pb-1 px-2 text-white bg-orange" style="width: 280px;">
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <a href="./dashboard_overview.php" class="nav-link text-white"> Dashboard </a>
        <ul>
          <li><a href="./dashboard_overview.php" class="nav-link  my-3 text-white">Overview</a></li>
          <li><a href="./dashboard_threads.php" class="nav-link my-3  text-white">Threads</a></li>
          <li><a href="./dashboard_comments.php" class="nav-link my-3  text-white">Comments</a></li>
        </ul>
        </li>
        <li>
        <a href="./account_profile.php" class="nav-link active-success text-white"> Account Setting </a>
          <ul>
          <li>
            <a href="./account_profile.php" class="nav-link active-success my-3 text-white">Profile</a>
            <ul>
              <li><a href="./account_profile_update.php" class="nav-link my-3 text-white">Update Profile</a></li>
              <li><a href="./account_profile_delete.php" class="nav-link my-3 text-white">Delete Profile</a></li>
            </ul>
          </li>
          <li><a href="./account_security.php" class="nav-link my-3  text-white">Security</a></li>
        </ul>
        </li>
      </ul>
      <hr>
    </div>


    <div class="container overview-container">
        <div class="jumbotron jumbotron-fluid py-4">
            <h4 class=" text-center">Welcome Dear - Admin(username)</h4>

        </div>
    </div>



  </div> 
  <?php require 'components/_footer.php'; ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>