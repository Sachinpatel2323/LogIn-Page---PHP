<?php
session_start();

    if(isset($_SESSION['user'])) {
        session_unset();
        session_destroy();
        echo "<script> location.replace('http://localhost/22BCA232/project/index.php'); </script>";
    }
?>