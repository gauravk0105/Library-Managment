<?php
    if(filter_input(INPUT_POST,'login')!=null)
    {
        $email = filter_input(INPUT_POST,'email');
        $pwd = filter_input(INPUT_POST,'pwd');
        $userType = filter_input(INPUT_POST,'userT');
        require_once './pack/DataManager.php';
        if($userType=="mem")
        {
            $rs = executeQuery("select * from member where memail='$email' and pwd='$pwd'");
            $n=mysql_num_rows($rs);
            if($n>0)
            {
                $row=mysql_fetch_array($rs);
                session_start(); // create session
                $_SESSION['id']=$row['mid'];
                $_SESSION['email']=$row['memail'];
                $_SESSION['user']="mem";
                header("location:member/memberconsole.php");
                die();
            }
            else
            {
                 header("location:LoginError.php");
                 die();
            }
        }
        else
        {
            if($userType=="emp")
            {
                $rs = executeQuery("select * from employee where eemail='$email' and pwd='$pwd'");
                $n=mysql_num_rows($rs);
                if($n>0)
                {
                    $row=mysql_fetch_array($rs);
                    session_start(); // create session
                    $_SESSION['id']=$row['eid'];
                    $_SESSION['email']=$row['eemail'];
                    $_SESSION['user']="emp";
                    header("location:employee/employeeconsole.php");
                    die();
                }
                else
                {
                    header("location:LoginError.php");
                    die();
                }
            }
        }
    }
    
?>