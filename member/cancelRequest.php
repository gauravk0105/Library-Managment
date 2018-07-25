<?php 
    require_once '../pack/member_session.php';
    require_once '../pack/DataManager.php';
    $tid = filter_input(INPUT_GET,'tid');
    $n=executeUpdate("delete from transaction where tid='$tid'");
    if($n==0)
    {
        ?>
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> Something Went Wrong Try Again!!!
            </div>
        <?php
    }
    if($n==1)
    {
        ?>
        <div class="alert alert-success alert-dismissible fade in">
            <strong>Success!</strong> Canceled Successfully <button onclick="window.location.reload();">Refresh Page</button>
        </div>
        <?php
    }
?>