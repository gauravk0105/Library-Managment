<?php 
    require_once '../pack/employee_session.php';
    require_once '../pack/DataManager.php';
    $mid = filter_input(INPUT_GET, 'mid');
    $qry = "select * from transaction where mid='$mid' ";
    $res=executeQuery("select * from member where mid='$mid'");
    $rs=executeQuery($qry);
    $n=mysql_num_rows($rs);
    if($n>0)
    {
        $flag=1;
        $result=executeQuery("select * from transaction where mid='$mid' and tstatus='issued'");
        $n1=mysql_num_rows($result);
        $ctn=0;
        $rw=mysql_fetch_array($res);
        if($n1>0)
        {
            while((mysql_fetch_array($result))!=null)
            {
                $ctn++;
            }
        }
        if($ctn==4)
        {
           $flag=0; ?>
<h4 class="text-center text-warning ">Limit Up <strong><?php echo $rw['mname']; ?></strong> No Book Can Be Issued</h4>
<br/>
            <?php    
        }
        else
        {
            ?>
<h4 class="text-center text-success "><?php echo 4-$ctn; ?> More Books <strong><?php echo $rw['mname']; ?></strong> can Issued.</h4>
     <br/>
       <?php
            
        }
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
                                    <th class="text-uppercase text-center text-warning">
                                        Current Status
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Option
                                    </th>
                </thead>
                <tbody id="myTable">
<?php
            $index=0;
            while(($row=mysql_fetch_array($rs))!=null)
            {
                ;
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
                               ?><span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo date('d:m:Y H:m:i',$row['tdateissued']);
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
                           ?><span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo date('d:m:Y H:m:i',$row['tdateret']);
                            }
                            ?>
                        </td>
                        <td class="text-center bg-success">
                            <?php
                                if($row['tstatus']=='req')
                                {
                                    ?><span class="label label-warning">Requested</span><?php
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
                        <td class="text-center bg-info">
                            <?php 
                                if($row['tstatus']=='req')
                                {
                                    if($flag==1)
                                        {
                                            ?><button onclick="setIssued('<?php echo $row['tid']; ?>','<?php echo $mid; ?>')" class="btn btn-success">Issued</button><?php
                                        }
                                    if($flag==0)
                                    {
                                        ?><button onclick="setIssued('<?php echo $row['tid']; ?>','<?php echo $mid; ?>')" class="disabled btn btn-success">Issued</button><?php
                                    }
                                        
                                    
                                }
                                if($row['tstatus']=='issued')
                                {
                                    ?><button onclick="setReturned('<?php echo $row['tid']; ?>','<?php echo $mid; ?>')" class="btn btn-warning">Returned</button><?php
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