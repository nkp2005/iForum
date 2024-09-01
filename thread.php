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
            margin-bottom: -55px;
        }

        .jumbotron-container {
            margin-top: 20px;
        }
    </Style>

</head>

<body>
    <?php require 'components/_header.php'; ?>

    <!-- Post Comment Form PHP Code Starts here -->
    <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            // Fetch Username from his account
            $login_user = $_SESSION['username'];
            // echo $login_user; // check if correctly taking login username
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $form_type = $_POST['form_type'] ?? '';
            if ($form_type == 'comment') {
                $id = $_GET['threadid'];
                $comment_content = $_POST['comment'];
                $sql = "INSERT INTO `comments` (`comment_content`, `comment_threadid`,     `comment_username`) VALUES ('$comment_content', '$id', '$login_user');";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<div class="alert alert-success alert-dismissible fade show"      role="alert">
                        <strong>Success!</strong> Your Comment has been Posted. 
                        <button type="button" class="close" data-dismiss="alert"        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                }
            }
        }
    ?>

    <!-- Delete thread using Delete button PHP Script Starts here -->
    <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            if (isset($_GET['delete'])) {
                $id = $_GET['delete'];
                $deletesql = "DELETE FROM `comments` WHERE `comments`.`comment_id` = $id";
                $deleteresult = mysqli_query($conn, $deletesql);
                if ($deleteresult) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class = "text-danger">Deleted!</strong> The comment has       been deleted successfully.
                    <button type="button" class="close"         data-dismiss="alert"aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                }
            }
        }
    ?>

    <!-- Category container starts here -->
    <div class="jumbotron container" style="margin-top: 3.5rem !important;">
        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE thread_id = $id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['thread_title'];
            $tdes = $row['thread_des'];
            $tusername = $row['thread_user_name'];
        }

        ?>
        <h6 class="display-6 text-left"><?php echo "$title"; ?></h6>
        <p class="lead text-left"><?php echo "$tdes"; ?></p>
        <p>Asked by : <b><?php echo "$tusername"; ?></b></p>
        <hr class="my-4">
        <p class="text-left">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post comments. Remain respectful of other members at all times.</p>
    </div>

    <!-- iForum - Post Comment -->
    <?php 
        $noresult = true;
        echo'<div class="container" style="margin-bottom: 5rem !important;">
            <h4 class="my-4 text-center">iForum - Start Commenting</h4>';
        
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            echo'<form action="'.$_SERVER["REQUEST_URI"].'" method="post">
                <input type="hidden" name="form_type" value="comment">
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <input type="text" class="form-control" id="comment" name="comment"     placeholder="Enter your Comment" required>
                </div>
                <button class="btn btn-outline-success btn-lg" type = "submit">Post Comment</button>
               
            </form>';
        } else {
            echo '<p class = "text-center">You are not logged in. Please login to able post comment.</p>';
        }
    
        echo '</div>';
    ?>



    <!-- iForum - Browse Comments -->
    <div class="container" style="margin-bottom: 5rem !important;">
        <h4 class="my-4 text-center">iForum - Browse Comments</h4>
        <?php
        // PHP script for display the comments
        $sql = "SELECT * FROM `comments` WHERE comment_threadid= $id";
        $result = mysqli_query($conn, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            $id = $row['comment_id'];
            $comment_date = $row['comment_date'];
            $comment_username = $row['comment_username'];
            $comment_content = $row['comment_content'];
            echo '<div class="media my-4 py-4">
            <img class="mr-3" src="./img/user.png" width="75px" alt="Generic placeholder image">
            <div class="media-body"><p class="text-success py-0 px-0 my-0 mx-0">' . $comment_username . ' at ' . $comment_date . '</p>
                <p class="mt-0">' . $comment_content . '</p>';
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
                    $login_user = $_SESSION['username'];
                    if($login_user == $comment_username) {
                        echo '<a class="btn btn-outline-danger btn-lg" href="?threadid=' . $_GET['threadid'] . '&delete=' . $id . '" role="button">Delete Thread</a>';
                    }
                }
            
           echo '</div>
        </div>';
        }

        if ($noresult) {
            echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                <p class="display-4">Comments Not Found</p>
                <p class="lead">Be the first person to post a comment.</p>
                </div>
            </div>';
        }

        ?>
    </div>





    <?php require 'components/_footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>