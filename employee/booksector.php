<?php
    require_once '../pack/employee_session.php';
?>
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
        <title>Book Sector</title>
        <style>
ul.breadcrumb {
    padding: 10px 16px;
    list-style: none;
    background-color: #eee;
}
ul.breadcrumb li {
    display: inline;
    font-size: 18px;
}
ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: ">>\00a0";
}
ul.breadcrumb li a {
    color: #0275d8;
    text-decoration: none;
}
ul.breadcrumb li a:hover {
    color: #01447e;
    text-decoration: underline;
}
</style>
    </head>
    <body>
       <?php 
        require_once '../pack/DataManager.php';
        $rs1=executeQuery("select * from employee where eemail='$eemail' and eid='$eid'");
        $n1=mysql_num_rows($rs1);
        $row=mysql_fetch_array($rs1);
        
        ?>
        <div class="container-fluid">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header navbar-left">
                        <button class="navbar-toggle" data-target="#mynavbar" data-toggle="collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="employeeconsole.php" class="navbar-brand">Library Management</a>
                    </div>
                    <div class="collapse navbar-collapse" id="mynavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="membersector.php">Member Sector</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                                My Account<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a href="editProfile.jsp" tabindex="-1" role="menuitem"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Profile</a></li>
                                    <li role="presentation"><a href="chngPic.jsp" tabindex="-1" role="menuitem"><span class="glyphicon glyphicon-user"></span>&nbsp;Change Profile Pic</a></li>
                                    <li role="presentation"><a href="chngPwd.jsp" tabindex="-1" role="menuitem"><span class="glyphicon glyphicon-lock"></span>&nbsp;Change Password</a></li>
                                </ul>   
                        </li>
                    </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#" id="tool" data-placement="bottom" data-toggle="tooltip" title="<?php echo $row['ename']; ?>" >
                                
                                    <img class="img-circle img-responsive" src="../images/img_avatar.png" width="22" alt=""/>
                         
<!--                                <img class="img-circle img-responsive" alt="User" width="22" src="images/img_avatar.png"/>-->
                             </a></li>
                             <li><a href="../Logout.php" id="log" data-placement="bottom" data-toggle="tooltip" title="Are u want to Logout?" ><span class="glyphicon glyphicon-log-out">Logout</span></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <br/><br/>
            <br/><br/>
            <ul class="breadcrumb">
                <li><a href="employeeconsole.php">Home</a></li>
                <li class="active">Book Sector</li>
            </ul>

            <ul class="nav nav-pills nav-justified">
                <li class="active"><a href="#" data-target="#addB" data-toggle="pill">Book Registration</a></li>
                <li><a href="#" data-target="#showB" data-toggle="pill">View And Update Book Info</a></li>
            </ul>
            
            <div class="tab-content">
                
                <div id="addB" class="tab-pane fade in active">
                    <h3 class="page-header text-uppercase text-warning">Book Registration</h3>
                    
                    <form class="form-horizontal" method="post" action="addBook.php">
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="title">Title:</label>
                          <div class="col-sm-8">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="author">Author Name:</label>
                          <div class="col-sm-8">
                            <input type="text" name="author" class="form-control" id="author" placeholder="Enter Author Name">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="pub">Publication:</label>
                          <div class="col-sm-8">
                            <input type="text" name="pub" class="form-control" id="pub" placeholder="Enter Publication">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="edition">Edition:</label>
                          <div class="col-sm-8">
                              <select class="form-control" name="edition" id="edition">
                                <option>Ist</option>
                                <option>IInd</option>
                                <option>IIIrd</option>
                                <option>IVth</option>
                              </select>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="price">Fine:</label>
                          <div class="col-sm-8">
                              <input type="number" name="price" class="form-control" id="price" placeholder="Price">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="cat">Category:</label>
                          <div class="col-sm-8">
                              <select class="form-control" name="cat" id="cat">
                                <option>Science fiction</option>
                                <option>Action and Adventure</option>
                                <option>History</option>
                                <option>Science</option>
                                <option>Math</option>
                                <option>Encyclopedias</option>
                                <option>Comics</option>
                                <option>Journals</option>
                                <option>Series</option>
                                <option>Biographies</option>
                                <option>Art</option>
                                <option>Fantasy</option>
                              </select>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="qty">Quantity:</label>
                          <div class="col-sm-8">
                              <input type="number" name="qty" value="1" class="form-control" id="qty" placeholder="Quantity">
                          </div>
                        </div>
                        
                        <div class="form-group"> 
                          <div class="col-sm-offset-2 col-sm-10">
                              <input type="submit" value="Add Book"  type="submit" name="addbook" class="btn btn-info btn-lg"/>
                          </div>
                        </div>
                     </form>
                    </div>
                
                
                <div id="showB" class="tab-pane">
                    <h3 class="page-header text-uppercase text-warning">View and Update Book Info</h3>
                    <div class="row">
                        <div class="col-sm-3 pull-right">
                            <input class="form-control" id="myInput" type="text" placeholder="Search Student">
                        </div>
                    </div>
                    <br/>
                    <?php 
                        require_once '../pack/DataManager.php';
                        $rs=executeQuery("select * from book");
                        $n=mysql_num_rows($rs);
                        if($n==0)
                        {
                    ?>
                            <div class="alert alert-warning">
                                <p><strong>No Book Yet</strong> To add Book<a href="#" class="alert-link"> Upload Book? Go TO Add Book Section</a></p>
                            </div>
                    <?php
                        }
                        else
                        {
                    ?>
                        <div id="s1"></div>
                    <br/>
                        <div class="table-responsive">
                        <table class="table table-bordered  table-hover table-striped">
                            <thead>
                                <tr>
<!--                                    <th class="text-uppercase text-center text-primary">
                                        Member ID
                                    </th>-->
                                    <th class="text-uppercase text-center text-primary">
                                        Book Title
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Book Author
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Book Publication 
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Book Edition
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Book Fine
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Book Category
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Book Quantity
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Update Option
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="myTable">            
                    <?php
                            while(($row=mysql_fetch_array($rs))!=null)
                            {
                    ?>
                                <tr>
                                    <td class="text-center text-info bg-danger">
                                        <?php echo $row['title']; ?>
                                    </td> 
                                    <td class="text-center text-info bg-info">
                                        <?php echo $row['author']; ?>
                                    </td> 
                                    <td class="text-center text-info bg-danger">
                                        <?php echo $row['publication']; ?>
                                    </td> 
                                    <td class="text-center text-info bg-danger">
                                        <?php echo $row['edition']; ?>
                                    </td> 
                                    <td class="text-center text-info bg-info">
                                        <i class="fa fa-inr" style="font-size:24px"></i><?php echo $row['price']; ?>
                                    </td> 
                                    <td class="text-center text-info bg-warning">
                                        <?php echo $row['category']; ?>
                                    </td> 
                                    <td class="text-center text-info bg-success">
                                    <?php 
                                        if($row['qty']==0)
                                        {
                                    ?>
                                        Out of Stock <span class="badge"><?php echo $row['qty']; ?></span>  
                                    <?php    
                                        }
                                        else
                                        {
                                    ?>
                                          Available <span class="badge"><?php echo $row['qty']; ?></span> 
                                    <?php      
                                        }
                                    ?>        
                                    </td> 
                                    <td class="text-center text-info bg-warning">
                                        <a href="updateBook.php?curBid='<?php echo $row['bid']; ?>'" class="btn btn-default btn-warning"><span class="glyphicon glyphicon-edit">&nbsp;Update</span></a>
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
                    ?>
                </div>
            </div>    
        </div>    
    </body>
</html>
