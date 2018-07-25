<?php
    session_start();
    if($_SESSION['id']==null)
    {
        header("location:AuthError.php");
        die();
    }
    if($_SESSION['user']!='mem')
    {
        header("location:AuthError.php");
        die();
    }
    $mid = $_SESSION['id'];
    $memail=$_SESSION['email'];