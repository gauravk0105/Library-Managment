<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="SourcePackage/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <script src="SourcePackage/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="SourcePackage/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
        <script src="SourcePackage/bootstrap.min.js" type="text/javascript"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="SourcePackage/jquery.min.js" type="text/javascript"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Edit Member</title>
    </head>
    <body>
        <div class="container-fluid">
            <h2 class="page-header text-uppercase text-warning">Edit Information</h2>
        <?php
            if(filter_input(INPUT_GET,'email')!=null)
            {
                $memail = filter_input(INPUT_GET,'email');
                require_once '../pack/DataManager.php';
                $rs=executeQuery("select * from member where memail=$memail");
                $n=mysql_num_rows($rs);
                if($n>0)
                {
                    $row = mysql_fetch_array($rs);
                    $mid = $row['mid'];
                    $mname = $row['mname'];
                    $cno = $row['cno'];
                    $gender = $row['gender'];
                    $addr = $row['address'];
                    
        ?>
            <form class="form-horizontal" method="post" action="updateMemberDetail.php">
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="mid">Member ID:</label>
                          <div class="col-sm-8">
                              <input type="text" value='<?php echo $mid; ?>' name="mid" class="form-control disabled" id="mid" readonly="">
                          </div>
                        </div>
                
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="name">Name:</label>
                          <div class="col-sm-8">
                            <input type="text" name="mname" value='<?php echo $mname; ?>' class="form-control" id="name" placeholder="Enter Name">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="email">Email:</label>
                          <div class="col-sm-8">
                            <input type="email" name="newmail" value=<?php echo $memail; ?> class="form-control" id="email" placeholder="Enter email">
                          </div>
                        </div>
                        
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="gender">Gender</label>
                             <div class="col-sm-8">
                <?php
                        if($gender=="Male")
                        {
                ?>
                        <label class="radio-inline">
                                    <input type="radio" value="Male" checked="true" name="gender"><strong>Male</strong>
                        </label>
                        <label class="radio-inline">
                                    <input type="radio" value="Female" name="gender"><strong>Female</strong>
                        </label>         
                <?php                 
                        }   
                        else
                        {
                ?>
                         <label class="radio-inline">
                                    <input type="radio" value="Male"  name="gender"><strong>Male</strong>
                         </label>
                        <label class="radio-inline">
                            <input type="radio" value="Female" checked="true" name="gender"><strong>Female</strong>
                        </label>        
                <?php                 
                        }
                ?>                 
                                
                             </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="addr">Address:</label>
                          <div class="col-sm-8">
                              <textarea class="form-control" id="addr" name="addr"  cols="60" rows="5" placeholder="Member's Address"><?php echo $addr; ?></textarea>
                          </div>
                        </div> 
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="cno">Contact Number:</label>
                          <div class="col-sm-8">
                            <input type="text" name="cno" class="form-control" value='<?php echo $cno; ?>' id="cno" placeholder="Enter Contact Number">
                          </div>
                        </div>
                        
                        <div class="form-group"> 
                          <div class="col-sm-offset-2 col-sm-10">
                              <input type='hidden' value=<?php echo $memail; ?> name='oldemail'/>
                              <input type="submit" value="Update Detail" name="editmem" class="btn btn-info btn-lg"/>
                          </div>
                        </div>
                     </form>
        <?php
                }
                else
                {
        ?>
        <h1>Fail</h1>
        <?php
                }
            }
            else
            {
        ?>
        <h1>Something Went Wrong</h1>
        <?php        
            }
        ?>
        </div>
    </body>
</html>
