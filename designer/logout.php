<?php
    session_start();
    unset($_SESSION['writer_email']);
      header("location: login.php");
?>