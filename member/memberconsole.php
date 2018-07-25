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
        <title>Member Console</title>
        <style>
            #notification_li
{
position:relative
}
#notificationContainer 
{
background-color: #fff;
border: 1px solid rgba(100, 100, 100, .4);
-webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);
overflow: visible;
position: absolute;
top: 50px;
margin-left: -150px;
width: 400px;
z-index: -1;
display: none;  
}
#notificationContainer:before {
content: '';
display: block;
position: absolute;
width: 0;
height: 0;
color: transparent;
border: 10px solid black;
border-color: transparent transparent white;
margin-top: -20px;
margin-left: 188px;
}
#notificationTitle
{
font-weight: bold;
padding: 8px;
font-size: 13px;
background-color: #ffffff;
position: fixed;
z-index: 1000;
width: 384px;
border-bottom: 1px solid #dddddd;
}
#notificationsBody
{
padding: 33px 0px 0px 0px !important;
min-height:300px;
}
#notificationFooter
{
background-color: #e9eaed;
text-align: center;
font-weight: bold;
padding: 8px;
font-size: 12px;
border-top: 1px solid #dddddd;
}
        </style>
        <script>
            $(document).ready(function(){
               $('#tool').tooltip();
               $('#log').tooltip();
               $('[data-toggle="popover"]').popover();   
               $("#notificationLink").click(function()
{
$("#notificationContainer").fadeToggle(300);
$("#notification_count").fadeOut("slow");
return false;
});

//Document Click hiding the popup 
$(document).click(function()
{
$("#notificationContainer").hide();
});

//Popup on click
$("#notificationContainer").click(function()
{
return false;
});

            });
            
            function addRequest(str)
            {
                var xmlhttp;
                if (str.length==0)
                { 
                        window.alert("Error");
                        return;
                }
                var result = confirm("Wanna To Request For The Book?");
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
                                            alert("Successfully Requested.. ThankYou!!!");
                                            window.location.reload();
                                        }
                                        else
                                        {
                                            alert("Fail To Complete Your Request");
                                        }
                            }
                        };
                        xmlhttp.open("GET","addRequest.php?bookid="+str,true);
                        xmlhttp.send();
                }
                else
                {
                    return;
                }
            }
            function searchBooks()
            {
                var xmlhttp;
                var doc=window.document;
                var str1=doc.getElementById("author").value;
                var str2=doc.getElementById("cat").value;
                var str3=doc.getElementById("pub").value;
                window.window.alert(str3);
                if (str1.length==0 || str2.length==0 || str3.length==0)
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
                xmlhttp.open("GET","searchBooks.php?author="+str1+"&cat="+str2+"&pub="+str3,true);
                xmlhttp.send();
        }
        </script>
    </head>
    <body onload="searchBooks()">
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
                        <li id="notification_li">
    <a href="#" id="notificationLink">
        <?php 
                    
                    require_once '../pack/DataManager.php';
                $rs11 = executeQuery("select * from notification where mid='$mid' and status='unread' order by ntime desc");
                $n11= mysql_num_rows($rs11);
                    ?>Notifications&nbsp;<span id="notification_count" class="label label-primary"><?php if($n11!=0)
    {echo $n11;} ?></span></a>
    <div id="notificationContainer">
    <div id="notificationTitle">Notifications<span class="glyphicon glyphicon-envelope"></span></div>
    <div id="notificationsBody" class="notifications">
        <?php 
                
                if($n11>0)
                {
                    while(($row33=mysql_fetch_array($rs11))!=null)
                    {
                        $bid22=$row33['bid'];
                        $rss=executeQuery("select * from book where bid='$bid22'");
                        $arr=mysql_fetch_array($rss);
                        $bname = $arr['title'];
                        $author = $arr['author'];
        ?>
        <?php 
        $nid=$row33['nid'];
        require_once '../pack/DataManager.php';
        executeQuery("update notification set status='read' where nid='$nid'");
            if($row33['bstatus']=='issued')
            {
                ?>
        <div class="alert alert-info">
            <strong>Successful!!</strong> <span class="glyphicon glyphicon-book"></span>&nbsp;<?php echo $bname; ?> <small><i>by <?php echo $author; ?></i></small> is issued
            to you on <span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo date('d:m:Y H:m:i',$row33['ntime']); ?>.
        </div><?php
            }
            else
            {
                ?>
        <div class="alert alert-warning">
            <strong>Successful!!</strong> <span class="glyphicon glyphicon-book"></span>&nbsp;<?php echo $bname; ?> <small><i>by <?php echo $author; ?></i></small> is Returned
            By you on <span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo date('d:m:Y H:m:i',$row33['ntime']); ?>.
        </div><?php
            }
        ?>
        <?php
                    }
                }
                else
                {
                    ?>
        <div class="alert alert-danger">
            <strong>No New Notification <span class="glyphicon glyphicon-envelope"></span></strong>
        </div>
        <?php
                }
        ?>
    </div>
    
</div>

</li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                                My Account<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a href="editProfile.jsp" tabindex="-1" role="menuitem"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Profile</a></li>
                                    <li role="presentation"><a href="chngPic.jsp" tabindex="-1" role="menuitem"><span class="glyphicon glyphicon-user"></span>&nbsp;Change Profile Pic</a></li>
                                    <li role="presentation"><a href="chngPwd.jsp" tabindex="-1" role="menuitem"><span class="glyphicon glyphicon-lock"></span>&nbsp;Change Password</a></li>
                                </ul>   
                        </li>
                        <li><a href="myStatus.php">My Status</a></li>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3 bg-success" >
                       <h2 class="page-header text-primary">Search Options</h2>
                       
                       <p class="lead page-header text-warning">
                           Author
                       </p>
                           <?php
                                       $rs1=executeQuery("select distinct author from book");
                                       $n1=mysql_num_rows($rs1);
                                       if($n1>0)
                                       {
                            ?>
                                    <select  class="form-control" name="author" id="author">
                                        <option>All</option>
                            <?php
                                           while(($row=mysql_fetch_array($rs1))!=null)
                                           {
                            ?>
                                        <option><?php echo $row['author']; ?></option>
                            <?php            
                                           }
                            ?>
                                    </select> 
                       
                            <?php            
                                       }
                                       else
                                       {
                            ?>
                           <h3>No Book</h3>
                           <?php
                                       }   
                           ?>
                           
                       
                           
                           
                       <p class="lead page-header text-warning">
                           Category
                       </p>
                           <?php
                                       $rs2=executeQuery("select distinct category from book");
                                       $n2=mysql_num_rows($rs2);
                                       if($n2>0)
                                       {
                            ?>
                                    <select class="form-control" name="cat" id="cat">
                                        <option>All</option>
                            <?php
                                           while(($row=mysql_fetch_array($rs2))!=null)
                                           {
                            ?>
                                        <option><?php echo $row['category']; ?></option>
                            <?php            
                                           }
                            ?>
                                    </select> 
                       
                            <?php            
                                       }
                                       else
                                       {
                            ?>
                           <h3>No Book</h3>
                           <?php
                                       }   
                           ?>
                  
                           <p class="lead page-header text-warning">
                           Publication
                       </p>
                           <?php
                                       $rs3=executeQuery("select distinct publication from book");
                                       $n3=mysql_num_rows($rs3);
                                       if($n3>0)
                                       {
                            ?>
                                    <select class="form-control" name="cat" id="pub">
                            <option>All</option>
                                        <?php
                                           while(($row=mysql_fetch_array($rs3))!=null)
                                           {
                            ?>
                                        <option><?php echo $row['publication']; ?></option>
                            <?php            
                                           }
                            ?>
                                    </select> 
                       
                            <?php            
                                       }
                                       else
                                       {
                            ?>
                           <h3>No Book</h3>
                           <?php
                                       }   
                           ?>
                           <br/>
                           <button onclick="searchBooks()" class="btn btn-lg btn-warning">Search Book</button>
                  </div>
                       <div class="col-sm-9">
                            <div class="col-sm-8 pull-right">
                                <input class="form-control" id="myInput" type="text" placeholder="Search Book In ShortListed Book">
                            </div>
                           <br/><br/><br/>
                           <div id="s1" class="col-sm-12">
                               
                           </div>
                       </div>
                   </div>
            </div>
        
        </div>
       <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script> 
    </body>
</html>
