<?php
    require_once '../pack/member_session.php';
    // mid and memail are avialable
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
        <title>My Status</title>
        <script>
            $(document).ready(function(){
               $('#tool').tooltip();
                $('#log').tooltip();
            });
            function getStatus()
            {
                var xmlhttp;
                var doc=window.document;
                var str3=doc.getElementById("status").value;
                if (str3.length==0)
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
                xmlhttp.open("GET","getStatus.php?status="+str3,true);
                xmlhttp.send();
        }
            function cancelRequest(str3)
            {
                var xmlhttp;
                var doc=window.document;
                if (str3.length==0)
                { 
                        document.getElementById("s4").innerHTML="";
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
                                        document.getElementById("s4").innerHTML=xmlhttp.responseText;
                        }
                };
                xmlhttp.open("GET","cancelRequest.php?tid="+str3,true);
                xmlhttp.send();
        }
        </script>    
    </head>
    <body onload="getStatus()">
        <?php 
        require_once '../pack/DataManager.php';
        $rs=executeQuery("select * from member where memail='$memail' and mid='$mid'");
        $n=mysql_num_rows($rs);
        $row=mysql_fetch_array($rs);
        
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
                        <a href="#" class="navbar-brand">Library Management</a>
                    </div>
                    <div class="collapse navbar-collapse" id="mynavbar">
                        <ul class="nav navbar-nav">
                        <li><a href="askQuestion.jsp">Ask Question</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                                My Account<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a href="editProfile.jsp" tabindex="-1" role="menuitem"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Profile</a></li>
                                    <li role="presentation"><a href="chngPic.jsp" tabindex="-1" role="menuitem"><span class="glyphicon glyphicon-user"></span>&nbsp;Change Profile Pic</a></li>
                                    <li role="presentation"><a href="chngPwd.jsp" tabindex="-1" role="menuitem"><span class="glyphicon glyphicon-lock"></span>&nbsp;Change Password</a></li>
                                </ul>   
                        </li>
                        <li class="active"><a href="myStatus.php">My Status</a></li>
                    </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#" id="tool" data-placement="bottom" data-toggle="tooltip" title="<?php echo $row['mname']; ?>" >
                                
                                    <img class="img-circle img-responsive" src="../images/img_avatar.png" width="22" alt=""/>
                         
<!--                                <img class="img-circle img-responsive" alt="User" width="22" src="images/img_avatar.png"/>-->
                             </a></li>
                             <li><a href="../Logout.php" id="log" data-placement="bottom" data-toggle="tooltip" title="Are u want to Logout?" ><span class="glyphicon glyphicon-log-out">Logout</span></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        
            <br/><br/><br/><br/>
            <div id="s4"></div>
                <div class="row">
                    <div class="col-sm-1 pull-right">
                        <button onclick="getStatus()" class="btn btn-primary btn-sm">Search</button>
                    </div>
                    <div class="col-sm-2 pull-right">
                        <select  class="form-control" name="status" id="status">
                                 <option>All</option>
                                 <option>Requested</option>
                                 <option>Issued</option>
                                 <option>Returned</option>
                        </select>
                    </div>
                </div>
            <hr/>
            <div id="s1">
                
            </div>
        </div>
    </body>
</html>
