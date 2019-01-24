<?php
    session_start();
    session_destroy();
    Print '<script>alert("You have been successfully logged out!");</script>';
    header("location: login.php");
    // unset($_SESSION['user_email']);
    // echo "<script> window.open('index.php','_self')</script>";
    // header('Location:'.$_SERVER['HTTP_REFERER']);
    ?>