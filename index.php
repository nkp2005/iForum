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
    .slide {
      margin-top: 66px;
    }
    .alert {
      margin-top: 66px;
      margin-bottom: -66px;
    }
  </Style>

</head>

<body>
  <?php require 'components/_header.php';?>

  <!-- Carousel Starts here -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="./img/1.png" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./img/2.png" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./img/1.png" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <div class="container my-4" id="ques" style="margin-bottom: 5.5rem!important">
    <h2 class="text-center my-4">iForum - Browse Categories</h2>
    <div class="row my-4">
      <!-- Fetch all the categories and use a loop to iterate through categories -->
      <?php
      $sql = "SELECT * FROM `category`";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['category_id'];
        $cat = $row['category_name'];
        $des = $row['category_des'];
        $img = $row['category_img'];
        echo '<div class="col-md-4 my-2">
                <div class="card" style="width: 18rem;">
                  <img src=" ' . $img . ' " ' . $id . '.jpg" class="card-img-top" alt="image for this category">
                  <div class="card-body">
                    <h5 class="card-title"><a class = "text-success" href="threadlist.php?catid=' . $id . '">' . $cat . '</a></h5>
                    <p class="card-text">' . substr($des, 0, 61) . '... </p>
                    <a href="threadlist.php?catid=' . $id . '" class="btn btn-outline-success">View Threads</a>
                  </div>
                </div>
              </div>';
      }
      ?>
    </div>
  </div>


  <?php require 'components/_footer.php'; ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- <script>
    function validateUsername() {
      const username = document.getElementById("username").value;
      const regex = /^[a-z0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<script>\/?]*$/;

      if (!regex.test(username)) {
        alert("Username is invalid! Only lowercase letters, numbers, and symbols are allowed. No spaces or uppercase letters.");
      }
    }
  </script> -->


</body>

</html>