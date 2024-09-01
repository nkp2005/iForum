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
    .alert {
      margin-top: 65px;
      margin-bottom: -65px;
    }

    .map {
      margin-top: 65px;
      margin-left: 3px;
    }

    ._btn {
      margin-left: 500px;
      margin-bottom: 80px;
    }
  </Style>

</head>

<body>
  <?php require 'components/_header.php'; ?>

  <!-- contact us form php script -->
  <?php
  require 'components/_dbconnect.php';
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $form_type = $_POST['form_type'] ?? '';
    if ($form_type == 'contact') {
      $contact_name = $_POST['contact_name'];
      $contact_phone = $_POST['contact_phone'];
      $contact_email = $_POST['contact_email'];
      $contact_query = $_POST['contact_query'];
      $sql = "INSERT INTO `contacts` (`contact_name`, `contact_phone`,`contact_email`,        `contact_query`) VALUES ('$contact_name', '$contact_phone','$contact_email',        '$contact_query')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your form has been submitted successfully. Our team   will  contact you soon.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button></div>';
      } else {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Your form has not been submitted successfully.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button></div>';
      }
    }
  }

  ?>


  <!-- Google Map embed -->
  <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d435.85357071831186!2d75.14938366711779!3d28.356414075412744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391365815171cb1f%3A0x92ffc2909949bd18!2sShyodanpura%2C%20Rajasthan%20331021!5e0!3m2!1sen!2sin!4v1724992933174!5m2!1sen!2sin" width="1513" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

  <!-- Contact Us Form container -->
  <div class="container">
    <h3 class="text-center">Contact Us!</h3>
    <form action="./contact.php?formsubmit=true" Method="POST">
      <input type="hidden" name="form_type" value="contact">
      <div class="form-group">
        <label for="contact_name">Full Name</label>
        <input type="text" class="form-control" name="contact_name" id="contact_name" aria-describedby="nameHelp" placeholder="Enter Full Name" Required>
      </div>
      <div class="form-group">
        <label for="contact_phone">Mobile No.</label>
        <input type="tel" minlength="10" maxlength="15" class="form-control" name="contact_phone" id="contact_phone" aria-describedby="phoneHelp" placeholder="Enter Mobile No." Required>
      </div>
      <div class="form-group">
        <label for="contact_email">Email address</label>
        <input type="email" class="form-control" name="contact_email" id="contact_email" aria-describedby="emailHelp" placeholder="Enter Email" Required>
      </div>
      <div class="form-group">
        <label for="contact_query">Query</label>
        <textarea class="form-control" id="contact_query" name="contact_query" rows="5" placeholder="Enter Query" optional></textarea>
      </div>
      <button type="submit" class="_btn btn btn-outline-success btn-lg">Submit</button>
    </form>
  </div>

  <?php require 'components/_footer.php'; ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>