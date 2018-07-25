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
        <title>Member Sector</title>
        <script type="text/javascript">
        function setED(str,str2)
        {
                var xmlhttp;
                if (str.length==0)
                { 
                        document.getElementById("s1").innerHTML="";
                        return;
                }
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp=new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange=function()
                {
                        if (xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                                        document.getElementById("s1").innerHTML=xmlhttp.responseText;
                        }
                };
                xmlhttp.open("GET","edMember.php?mid="+str+"&curStatus="+str2,true);
                xmlhttp.send();
        }
        function getMemberTransactionDetail()
        {
                var xmlhttp;
                var doc=window.document;
                var str1=doc.getElementById("mem").value;
                if (str1.length==0)
                { 
                        document.getElementById("s9").innerHTML="";
                        return;
                }
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp=new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange=function()
                {
                        if (xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                                        document.getElementById("s9").innerHTML=xmlhttp.responseText;
                        }
                };
                xmlhttp.open("GET","getTransactionDetail.php?mid="+str1,true);
                xmlhttp.send();
        }
        function setIssued(str1,str2)
            {
                var xmlhttp;
                if (str1.length==0 || str2.length==0)
                { 
                        window.alert("Error");
                        return;
                }
                var result = confirm("Wanna To Issue The Book?");
                if(result==true)
                {
                    if (window.XMLHttpRequest)
                        {// code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp=new XMLHttpRequest();
                         }
                        else
                        {// code for IE6, IE5
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }

                        xmlhttp.onreadystatechange=function()
                        {
                            if (xmlhttp.readyState==4 && xmlhttp.status==200)
                            {
//                                        document.getElementById("suc").innerHTML=xmlhttp.responseText;
                                        var out=xmlhttp.responseText;
                                        alert(out);
                                        if(out=="success")
                                        {
                                            alert("Successfully Issued.. ThankYou!!!");
                                            getMemberTransactionDetail();
                                        }
                                        else
                                        {
                                            alert("Fail To Complete Your Request TO Issue Book.");
                                        }
                            }
                        };
                        xmlhttp.open("GET","setIssued.php?tid="+str1+"&mid="+str2,true);
                        xmlhttp.send();
                }
                else
                {
                    return;
                }
            }
        
        function setReturned(str1,str2)
            {
                var xmlhttp;
                if (str1.length==0 || str2.length==0)
                { 
                        window.alert("Error");
                        return;
                }
                var result = confirm("Wanna To Returned The Book?");
                if(result==true)
                {
                    if (window.XMLHttpRequest)
                        {// code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp=new XMLHttpRequest();
                         }
                        else
                        {// code for IE6, IE5
                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                        }

                        xmlhttp.onreadystatechange=function()
                        {
                            if (xmlhttp.readyState==4 && xmlhttp.status==200)
                            {
//                                        document.getElementById("suc").innerHTML=xmlhttp.responseText;
                                        var out=xmlhttp.responseText;
                                        alert(out);
                                        if(out=="success")
                                        {
                                            alert("Successfully Returned.. ThankYou!!!");
                                            getMemberTransactionDetail();
                                        }
                                        else
                                        {
                                            alert("Fail To Complete Your Request TO Return Book.");
                                        }
                            }
                        };
                        xmlhttp.open("GET","setReturned.php?tid="+str1+"&mid="+str2,true);
                        xmlhttp.send();
                }
                else
                {
                    return;
                }
            }
        </script>
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
                            <li><a href="booksector.php">Book Sector</a></li>
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
                <li class="active">Member Sector</li>
            </ul>
            
            <ul class="nav nav-pills nav-justified">
                <li class="active"><a href="#" data-target="#addS" data-toggle="pill">Member Registration</a></li>
                <li><a href="#" data-target="#showS" data-toggle="pill">Show Member</a></li>
                <li><a href="#" data-target="#IssueDeposit" data-toggle="pill">Member Issue Deposit Request</a></li>
            </ul>
            
            <br/>
            
            <div class="tab-content">
                
                <div id="addS" class="tab-pane fade in active">
                    <h2 class="page-header text-uppercase text-warning">Member Registration</h2>
                    <form class="form-horizontal" method="post" action="addMember.php">
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="name">Name:</label>
                          <div class="col-sm-8">
                            <input type="text" name="mname" class="form-control" id="name" placeholder="Enter Name">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="email">Email:</label>
                          <div class="col-sm-8">
                            <input type="email" name="memail" class="form-control" id="email" placeholder="Enter email">
                          </div>
                        </div>
                        
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="gender">Gender</label>
                             <div class="col-sm-8">
                                <label class="radio-inline">
                                    <input type="radio" value="Male" checked="true" name="gender"><strong>Male</strong>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="Female" name="gender"><strong>Female</strong>
                                </label>
                             </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="addr">Address:</label>
                          <div class="col-sm-8">
                              <textarea class="form-control" id="addr" name="addr" cols="60" rows="5" placeholder="Member's Address"></textarea>
                          </div>
                        </div> 
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="cno">Contact Number:</label>
                          <div class="col-sm-8">
                            <input type="text" name="cno" class="form-control" id="cno" placeholder="Enter Contact Number">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class=" text-info control-label col-sm-2" for="pwd">Password:</label>
                          <div class="col-sm-8"> 
                            <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Enter password">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="con_pwd">Confirm Password:</label>
                          <div class="col-sm-8"> 
                            <input type="password" class="form-control" id="con_pwd" placeholder="Enter Confirm password">
                          </div>
                        </div>
                        
                        <div class="form-group"> 
                          <div class="col-sm-offset-2 col-sm-10">
                              <input type="submit" value="Add Member"  type="submit" name="addmem" class="btn btn-info btn-lg"/>
                          </div>
                        </div>
                     </form>
 
                </div>
                
                <div class="tab-pane" id="showS">
                    <h2 class="page-header text-uppercase text-warning">Show Members</h2>
                    <div class="row">
                        <div class="col-sm-3 pull-right">
                            <input class="form-control" id="myInput" type="text" placeholder="Search Student">
                        </div>
                    </div>
                    <br/>
                    <?php
                        require_once '../pack/DataManager.php';
                        $rs=executeQuery("select * from member");
                        $n=mysql_num_rows($rs);
                        if($n==0)
                        {
                    ?>
                        <div class="alert alert-warning">
                            <p><strong>No Member Yet</strong> To add Member<a href="#" class="alert-link"> Upload Member? Go TO Add Member Section</a></p>
                        </div>
                    <?php
                        }
                        else
                        {
                    ?>
                    <div id="s1"></div>
                    <br/>
                        <div class="table-responsive">
                        <table class="table table-bordered  table-hover">
                            <thead>
                                <tr>
<!--                                    <th class="text-uppercase text-center text-primary">
                                        Member ID
                                    </th>-->
                                    <th class="text-uppercase text-center text-primary">
                                        Member Name
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Member Email
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Member Contact Number 
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Member Gender
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Member Address
                                    </th>
                                    <th class="text-uppercase text-center text-primary">
                                        Options E/D
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
                                <?php echo $row['mname']; ?>
                            </td>
                            <td class="text-center text-info bg-info">
                                <?php echo $row['memail']; ?>
                            </td>
                            <td class="text-center text-info bg-warning">
                                <?php echo $row['cno']; ?>
                            </td>
                            <td class="text-center text-info bg-primary">
                                <?php echo $row['gender']; ?>
                            </td>
                            <td class="text-center text-info info">
                                <?php echo $row['address']; ?>
                            </td>
                                <?php 
                                        if($row['status']=="enable")
                                        {
                                ?>
                                  <td class="text-center bg-success">
                                      <button onclick="setED('<?php echo $row['mid']; ?>','<?php echo $row['status']; ?>')" class="btn btn-default btn-danger"><span class="glyphicon glyphicon-remove">&nbsp;Disable</span></button>
                                      &nbsp;&nbsp;
                                      <a href="editmember.php?email='<?php echo $row['memail']; ?>'"  class="btn btn-default btn-warning"><span class="glyphicon glyphicon-edit">&nbsp;Edit</span></a>
                                  </td>      
                                <?php
                                        }
                                        else
                                        {
                                ?>
                                 <td class="text-center bg-danger">
                                     <button  onclick="setED('<?php echo $row['mid']; ?>','<?php echo $row['status']; ?>')" class="btn btn-default btn-success"><span class="glyphicon glyphicon-ok">&nbsp;Enable</span></button>
                                     &nbsp;&nbsp;
                                      <a href="editmember.php?email='<?php echo $row['memail']; ?>'" class="btn btn-default btn-warning"><span class="glyphicon glyphicon-edit">&nbsp;Edit</span></a>
                                 </td>      
                                <?php
                                        }
                                ?>
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
                <div class="tab-pane" id="IssueDeposit">
                    <br/>
                    <div class="row">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-2 text-center">
                                <input class="form-control" id="mem" type="text" placeholder="Enter The Member ID" />       
                        </div>
                        <div class="col-sm-1">
                            <button onclick="getMemberTransactionDetail()" class="btn btn-primary">GO!!</button>
                        </div>
                    </div>
                    <hr/>
                    <div id="s10"></div>
                    <div id="s9">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
