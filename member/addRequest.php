<?php 
     require_once '../pack/member_session.php';
     require_once '../pack/DataManager.php';
     $bid=filter_input(INPUT_GET, 'bookid');
     $time = time();
     $id= getNextTid();
     $tid = "TID".$id;
     $tstatus='req';
     $n=executeUpdate("insert into transaction(tid,mid,bid,tdatereq,tstatus) values ('$tid','$mid','$bid',$time,'$tstatus')");
     if($n==1)
     {
         echo "success";
     }
     else
     {
         echo "fail";
     }
?>