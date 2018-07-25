<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if(filter_input(INPUT_POST, 'addmem')!=null)
            {
                require_once '../pack/DataManager.php';
                $id=getNextMid();
                $mname = filter_input(INPUT_POST,'mname');
                $memail = filter_input(INPUT_POST,'memail');
                $gender = filter_input(INPUT_POST,"gender");
                $addr = filter_input(INPUT_POST,'addr');
                $cno = filter_input(INPUT_POST,'cno');
                $pwd = filter_input(INPUT_POST,'pwd');
                $mid = "MID".$id;
                $status="enable";
                $n=executeUpdate("insert into member values ('$mid','$mname','$cno','$memail','$addr','$gender','$pwd','$status')");
                if($n==0)
                {
        ?>
        <h2>Sorry .... fail to add member</h2>
        <a href="employeeconsole.php">Home</a>
        <?php
                }
                else
                {
        ?>
        <h2>Successfully inserted</h2>
        <a href="membersector.php">Add More Member</a>
        <?php            
                }
                
            }
            else
            {
                echo " adas";
                ?> <a href="employeeconsole.php">Home</a> <?php
            }
        ?>
    </body>
</html>
