<?php
    require_once '../pack/member_session.php';
    require_once '../pack/DataManager.php';
    $status=filter_input(INPUT_GET, 'status');
    $qry = "select * from transaction where mid='$mid'";
    if($status!="All")
    {
        if($status=="Requested")
        {
            $qry = "$qry and tstatus='req'";
        }
        if($status=="Issued")
        {
            $qry = "$qry and tstatus='issued'";
        }
        if($status=="Returned")
        {
            $qry = "$qry and tstatus='ret'";
        }
    }
    $rs=executeQuery($qry);
    $n=mysql_num_rows($rs);
    if($n>0)
    {
?>   
       <div class="table-responsive">
            <table  class="table table-striped">
                <thead>
                    <th class="text-uppercase text-center text-primary">
                                        S.No
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Book Title
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Author
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Request Date & Time
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Issued Date & Time
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Returned Date & Time
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Status
                                    </th>
                </thead>
                <tbody id="myTable">
<?php
            $index=0;
            while(($row=mysql_fetch_array($rs))!=null)
            {
                $bookid = $row['bid'];
                $result=executeQuery("select * from book where bid='$bookid'");
                $rw=mysql_fetch_array($result);
                $index++;
?>
                    <tr>
                        <td class="text-center bg-primary"><?php echo $index; ?></td>
                        <td class="text-center bg-info"><?php echo $rw['title']; ?></td>
                        <td class="text-center bg-success"><?php echo $rw['author']; ?></td>
                        <td class="text-center bg-danger"><span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo date('d:m:Y H:m:i',$row['tdatereq']); ?></td>
                        <td class="text-center bg-warning">
                           <?php
                            if($row['tdateissued']==0)
                            {
                               ?>Not Issued Yet<?php
                            }
                            else
                            {
                               ?><span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo date('d:m:Y H:m:i',$row['tdatereq']);
                            }
                            ?>
                        </td>
                        <td class="text-center bg-primary">
                            <?php
                            if($row['tdateret']==0)
                            {
                               ?>Not Returned Yet<?php
                            }
                            else
                            {
                               ?><span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo date('d:m:Y H:m:i',$row['tdatereq']);
                            }
                            ?>
                        </td>
                        <td class="text-center bg-success">
                            <?php
                                if($row['tstatus']=='req')
                                {
                                    ?><span class="label label-warning">Requested</span>
                                    &nbsp;&nbsp;<button onclick="cancelRequest('<?php echo $row['tid'];?>');" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span>&nbsp;Cancel</button>  <?php
                                    
                                }
                                if($row['tstatus']=='ret')
                                {
                                    ?><span class="label label-primary">Returned</span><?php
                                }
                                if($row['tstatus']=='issued')
                                {
                                    ?><span class="label label-success">Issued</span><?php
                                }
                            ?>
                        </td>
                    </tr>
<?php
            }
?>
                </tbody>
            </table>
       </div>
<?php                    
    }
    else
    {
 ?>
<h3 class="text-center text-danger">No Search Result Found!!!...</h3>
<?php
    }
?>