<?php
    session_start();
    session_destroy();
      Print '<script>alert("You have been successfully logged out!");</script>';
    header("location: login.php");
?>