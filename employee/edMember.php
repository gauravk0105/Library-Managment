<?php 

    if(filter_input(INPUT_GET, 'mid')!=null && filter_input(INPUT_GET,'curStatus')!=null)
    {
        $mid = filter_input(INPUT_GET,'mid');
        $curstatus = filter_input(INPUT_GET,'curStatus');
        if($curstatus=="enable")
        {
            // then disable
            require_once '../pack/DataManager.php';
            $n = executeUpdate("update member set status='disable' where mid='$mid' and status='$curstatus'");
            if($n==1)
            {
?>
<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Status Updated Successfully. <button onclick="window.location.reload();" class="alert-link">Refresh Page</button>.  
</div>
<?php
            }
            else
            {
?>
<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Fail!</strong> Unable to update status Try Again.
</div>
<?php
            }
        }
        else
        {
            //enable
            require_once '../pack/DataManager.php';
            $n = executeUpdate("update member set status='enable' where mid='$mid' and status='$curstatus'");
            if($n==1)
            {
?>
<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Status Updated Successfully  <button onclick="window.location.reload();" class="alert-link">Refresh Page</button>. 
</div>
<?php
            }
            else
            {
?>
<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Fail!</strong> Unable to update status Try Again.  
</div>
<?php
            }
        }
    }