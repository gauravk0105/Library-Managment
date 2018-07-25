<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Book</title>
    </head>
    <body>
        <?php 
            if(filter_input(INPUT_POST, 'addbook')!=null)
            {
                require_once '../pack/DataManager.php';
                $id=getNextBid();
                $bid = "BID".$id;
                echo $bid;
                $qty= filter_input(INPUT_POST,'qty');
                $title=filter_input(INPUT_POST, 'title');
                $author= filter_input(INPUT_POST,'author');
                $pub= filter_input(INPUT_POST,'pub');
                $edition= filter_input(INPUT_POST,'edition');
                $price= filter_input(INPUT_POST,'price');
                $cat= filter_input(INPUT_POST,'cat');
                $n=executeUpdate("insert into book values ('$bid','$title','$author','$pub','$edition',$price,'$cat',$qty)");
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
        <a href="booksector.php">Add More Member</a>
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
