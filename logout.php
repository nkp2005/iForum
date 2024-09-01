<?php
require('components/_dbconnect.php');
session_start();


session_unset();
session_destroy();

header("location: ./index.php?logoutsuccess=true");
exit;


?>