<?php 
  if(session_status() == PHP_SESSION_NONE) {
      session_start();
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
    .container {
      margin-top: 90px;
      width: 100%;
    }

    .alert {
      margin-top: 66px;
      margin-bottom: -66px;
    }
  </Style>

</head>

<body>
  <?php require 'components/_header.php'; ?>

  <div class="container">
    <div class="text-center mb-5">
      <h1>About Us</h1>
      <p class="lead">Connecting Coding Enthusiasts Across the Global</p>
    </div>

    <div class="row mx-4">
      <div class="col-md-6">
        <img src="./img/welcome.png" class="img-fluid rounded" alt="About Us">
      </div>
      <div class="col-md-6">
        <h2>Welcome to iForum</h2>
        <p>iForum is a community platform where coding enthusiasts can connect with other developers, engage in discussions, ask for help, and share their knowledge with a supportive community. It's a perfect place to improve your coding skills and to find a community of like-minded individuals who share your passion for coding.</p>
        <p>Whether you are a beginner just starting out or an experienced developer, iForum provides the perfect environment to learn, grow, and collaborate. Our community is made up of passionate coders who are eager to share their knowledge, offer advice, and support one another on their coding journey.</p>
      </div>
    </div>

    <div class="text-center my-4">
      <h2>Our Mission</h2>
      <p>To create a welcoming and inclusive space for coders of all levels to connect, learn, and grow together.</p>
    </div>
    <div class="row my-5">
      <div class="col-md-4 text-center">
        <img src="./img/community.png" class="rounded-circle mb-3" alt="Community">
        <h3>Community</h3>
        <p>Join a vibrant community of developers who are eager to share their knowledge and help others.</p>
      </div>
      <div class="col-md-4 text-center">
        <img src="./img/learning.png" class="rounded-circle mb-3" alt="Learning">
        <h3>Learning</h3>
        <p>Access a wealth of resources and discussions that will help you improve your coding skills.</p>
      </div>
      <div class="col-md-4 text-center">
        <img src="./img/support.png" class="rounded-circle mb-3" alt="Support">
        <h3>Support</h3>
        <p>Get help from experienced developers and contribute by helping others in the community.</p>
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