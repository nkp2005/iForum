<?php 
    require 'components/_dbconnect.php';
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
    .searchResults {
      min-height: 535px;
      margin-top: 90px;
    }
    .alert {
      margin-top: 66px;
      margin-bottom: -66px;
    }
  </Style>

</head>

<body>
  <?php require 'components/_header.php';
  ?>


    <!-- Display search results -->
    <div class="searchResults">
        <h3 class="text-center">iForum - Search Results</h3>
        <?php
            $noresult = true;
            $search_query = $_GET['searchquery'];
            echo '<h5 class="text-center my-3">Search result For -- '. $search_query . '</h5>';
                $sql = "SELECT * FROM `threads` WHERE MATCH(`thread_title`, `thread_des`) AGAINST ('$search_query')";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['thread_title'];
                    $tdes = $row['thread_des'];
                    $id = $row['thread_id'];
                    $noresult = false;
                        echo '<div class="result container ">
                                <h5 class = "text-center my-4" ><a href=thread.php?threadid="'.$id.'" class="text-success">'. $title. '</a> </h5>
                                <p class = "text-center my-4" >'. $tdes .'</p>
                            </div>';
                }

                if($noresult) {
                    echo '<div class="jumbotron container" style="margin-top: 3.5rem    !important;">
                        <h5 class="text-center my-0">No Result Found For -- '. $search_query . '</h5>
                        <ul><li><p>It looks like there are no matches for your search.</p></li><li><p>Try using words that might appear on the page that you’re looking for. For example, Search "cake recipes" instead of "how to make a cake."</p></li></ul>
                    </div>';
                }
        ?>
        <div class="results">
            <h5 class="text-center"></h5>
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