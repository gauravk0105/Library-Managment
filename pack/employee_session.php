<?php
    session_start();
    if($_SESSION['id']==null)
    {
        header("location:AuthError.php");
        die();
    }
    if($_SESSION['user']!='emp')
    {
        header("location:AuthError.php");
        die();
    }
    $eid = $_SESSION['id'];
    $eemail=$_SESSION['email'];