<?php
    session_start();
    if($_SESSION['id']==null)
    {
        header("location:AuthError.php");
        die();
    }
    unset($_SESSION['id']);
    unset($_SESSION['user']);
    unset($_SESSION['email']);
    header("location:index.php");
    die();
    