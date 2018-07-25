<?php
    require_once '../pack/employee_session.php';
    require_once '../pack/DataManager.php';
    $tid = filter_input(INPUT_GET,'tid');
    $mid = filter_input(INPUT_GET,'mid');
    $time = time();
    $n=executeUpdate("update transaction set tstatus='issued',tdateissued=$time where tid='$tid' and mid='$mid'");
    if($n==0)
    {
        echo "fail";
    }
    if($n==1)
    {
        $rs=executeQuery("select * from transaction where tid='$tid' and mid='$mid'");
        $row=mysql_fetch_array($rs);
        $time = time();
        $id=getNextNid($mid);
        $bid=$row['bid'];
        $nid=$mid.$id;
        $n= executeUpdate("insert into notification values('$nid','$mid','$bid',$time,'unread','issued')");
        echo "success";
    }

?>