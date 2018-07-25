<!DOCTYPE html>
<html>
    <head>
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
        <title>Login</title>
        <style>
            ul.breadcrumb 
            {
                padding: 10px 16px;
                list-style: none;
                background-color: #eee;
            }
            ul.breadcrumb li
            {
                display: inline;
                font-size: 18px;
            }
            ul.breadcrumb li+li:before
            {
                padding: 8px;
                color: black;
                content: ">>\00a0";
            }
            ul.breadcrumb li a 
            {
                color: #0275d8;
                text-decoration: none;
            }
            ul.breadcrumb li a:hover 
            {
                color: #01447e;
                text-decoration: underline;
            }
        </style>
      
    </head>
    <body>
        <ul class="breadcrumb">
            <li style="font-size: 20px"><a href="index.jsp">Home</a></li>
            <li style="font-size: 20px" class="active">Login</li>
        </ul>
        <div style="margin-top: 80px" class="container">    
        <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title"><span class="glyphicon glyphicon-lock"></span>&nbsp;Login</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" action="CheckLogin.php" method="post" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" name="email" type="email" class="form-control" value="" placeholder="Email">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" name="pwd" type="password" class="form-control" placeholder="Password">
                            </div> 
                            <label class="radio-inline">
                                <input type="radio" value="mem" checked="true" name="userT"><strong>Member</strong>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="emp" name="userT"><strong>Employee</strong>
                            </label>
    


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <input type="submit" id="btn-login"  name="login" class="btn btn-success" value="Login">
                                      <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>

                                    </div>
                                </div>
                            </form>     
                        </div>                     
                    </div>  
            <div class="panel-footer">
                <p class="lead text-center">Develop By Gaurav Khandelwal&nbsp;<label class="label label-primary">AD</label></p>
            </div>
        </div>
        </div>
    </body>
</html>
