<?php
    require_once '../pack/member_session.php';
    $author=filter_input(INPUT_GET,'author');
    $cat=filter_input(INPUT_GET,'cat');
    $pub=filter_input(INPUT_GET,'pub');
    //echo $pub;
    $qry = "select * from book where 1=1";
    if($author!="All")
    {
        $qry = "$qry and author='$author'";
    }
    if($cat!="All")
    {
        $qry = "$qry and category='$cat'";
    }
    if($pub!="All")
    {
        $qry = "$qry and publication='$pub'";
    }
    $qry2 = "$qry and bid not in (select bid from transaction where tstatus='issued' and mid='$mid')";
    require_once '../pack/DataManager.php';
    //echo $qry;
    $rs=executeQuery($qry2);
    $n=mysql_num_rows($rs);
    if($n>0)
    {
?>
        <div class="table-responsive">
            <table  class="table table-striped">
                <thead>
                    <th class="text-uppercase text-center text-primary">
                                        Book Name
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Book Author
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Book Category
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Book Edition
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Book Publication
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Status
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Options
                                    </th>
                </thead>
                <tbody id="myTable">
<?php
        while(($row=mysql_fetch_array($rs))!=null)
        {
            $flag=1;
            $bookid = $row['bid'];
            $result=executeQuery("select * from transaction where bid='$bookid' and tstatus='req' and mid='$mid'");
            $n4=mysql_num_rows($result);
            if($n4==0)
            {
                // nahi h tho issued i request kr sakta h 
                $flag=1;
            }
            else
            {
                // cannot request
                $flag=0;
            }
?>
                <tr>
                    <td class="text-center">
                        <img src="../images/img_avatar.png" width="70" height="70" alt="book"/>
                        <p class="text-center"><?php echo $row['title']; ?></p>
                    </td>
                    <td class="text-center">
                        <?php echo $row['author']; ?>
                    </td>
                    <td class="text-center">
                        <?php echo $row['category']; ?>
                    </td>
                    <td class="text-center">
                        <?php echo $row['edition']; ?>
                    </td>
                    <td class="text-center">
                        <?php echo $row['publication']; ?>
                    </td>
                    <td class="text-center">
                        <?php 
                            if($row['qty']>0)
                            {
                                if($flag==0)
                                {
                                    ?> <span class="label label-success">Already Requested</span> <?php
                                }
                                if($flag==1)
                                {
                                    ?> <span class="label label-success">AVAILABLE</span> <?php
                                }    
                                
                            }
                            else
                            {
                                ?> <span class="label label-danger">OUT OF STOCK</span> <?php
                            }
                        ?>
                    </td>
                    <td class="text-center">
                        <?php 
                            if($row['qty']>0)
                            {
                                if($flag==0)
                                {
                                    ?><button class="btn btn-success disabled">Issue</button><?php
                                }
                                if($flag==1)
                                {
                                    ?><button class="btn btn-success" onclick="addRequest('<?php echo $row['bid'];?>')">Issue</button><?php
                                }
                            }
                            else
                            {
                                ?> <button class="btn btn-danger">Make Request</button><?php
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