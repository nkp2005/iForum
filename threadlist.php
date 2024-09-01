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
        ._btn {
            margin-left: 470px;
        }

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


    <!-- Ask Question Form PHP Code Starts here -->
    <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            // Fetch Username from his account
            $login_user = $_SESSION['username'];
            // echo $login_user; // check if correctly taking login username
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $form_type = $_POST['form_type'] ?? '';
            if ($form_type == 'question') {
                $id = $_GET['catid'];
                $thread_title = $_POST['title'];
                $thread_des = $_POST['des'];
                $sql = "INSERT INTO `threads` (`thread_title`, `thread_des`, `thread_cat_id`, `thread_user_name`) VALUES ('$thread_title', '$thread_des', '$id' ,   '$login_user')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo '<div class="alert alert-success alert-dismissible fade show"  role="alert">
                    <strong>Success!</strong> Your Question has been Posted. 
                    <button type="button" class="close" data-dismiss="alert"    aria-label="Close">
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
                $deletesql = "DELETE FROM `threads` WHERE `threads`.`thread_id` = $id";
                $deleteresult = mysqli_query($conn, $deletesql);
                if ($deleteresult) {
                    echo '<div class="alert alert-success alert-dismissible fade show"      role="alert">
                        <strong class = "text-danger">Deleted!</strong> The thread has  been     deleted successfully.
                        <button type="button" class="close"     data-dismiss="alert"aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                }
            }
        }
    ?>


    <!-- Category container starts here -->
    <div class="jumbotron-container jumbotron container" style="margin-top: 3.5rem !important;">
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `category` WHERE category_id = $id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $catname = $row['category_name'];
            $catdes = $row['category_des'];
        }

        ?>
        <h1 class="display-4 text-center">Welcome - <?php echo "$catname"; ?></h1>
        <p class="lead text-center"><?php echo "$catdes"; ?></p>
        <hr class="my-4">
        <p class="text-center">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>
        <p class="lead">
            <a class="_btn btn btn-outline-success btn-lg" href="#" role="button">Learn more</a>
        </p>
    </div>


    <!-- iForum - Ask Questions -->
    <?php 
        echo'<div class="container" style="margin-bottom: 5rem !important;">
        <h4 class="my-4 text-center">iForum - Start Discussion</h4>';


        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            echo'<form action="'.$_SERVER["REQUEST_URI"].'" method="post">
                    <input type="hidden" name="form_type" value="question">
                    <div class="form-group">
                        <label for="title">Query Title</label>
                        <input type="text" class="form-control" id="title" name="title"     placeholder="Query Title" required>
                    </div>
                    <div class="form-group">
                        <label for="des">Query Description</label>
                        <textarea class="form-control" id="des" name="des" rows="5"     placeholder="Query Description" required></textarea>
                    </div>
                    <input type="hidden" name="thread_id" value="<?php echo $id; ?>">
                    <button type="submit" class="_btn btn btn-outline-success btn-lg">Post  Thread</button> <!-- Update ID here -->
                </form>';
        } else {
            echo '<p class = "text-center">You are not logged in. Please login to able post     thread.</p>';
        }

        echo '</div>';
    ?>

    <!-- iForum - Browse Questions -->
    <div class="container" style="margin-bottom: 5rem !important;">
        <h4 class="my-4 text-center">iForum - Browse Questions</h4>
        <?php
        // PHP script for display the questions
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id= $id";
        $result = mysqli_query($conn, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $des = $row['thread_des'];
            $thread_username = $row['thread_user_name'];
            echo '<div class="media my-4 py-4">
            <img class="mr-3" src="./img/user.png" width="75px" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0"><a class = "text-success" href = "./thread.php?threadid=' . $id . '" >' . $title . '</a></h5>
               <p class "text-dark">' . $des . '</p>';

               if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
                $login_user = $_SESSION['username'];
                if($login_user == $thread_username) {
               echo '<a class="btn btn-outline-danger btn-lg" href="?catid=' . $_GET['catid'] . '&delete=' . $id . '" role="button">Delete Thread</a>';
                }
            }

            echo '</div>
        </div>';
        }

        if ($noresult) {
            echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                <p class="text-center display-4">Questions Not Found</p>
                <p class="text-center lead">Be the first person to ask a Question.</p>
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