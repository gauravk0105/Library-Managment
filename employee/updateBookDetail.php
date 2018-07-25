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
        <title>Update Book</title>
    </head>
    <body>
        <?php
                if(filter_input(INPUT_POST,'editbook')!=null)
                {
                    $bid=filter_input(INPUT_POST, 'bid');
                    $qty= filter_input(INPUT_POST,'qty');
                    $title=filter_input(INPUT_POST, 'title');
                    $author= filter_input(INPUT_POST,'author');
                    $pub= filter_input(INPUT_POST,'pub');
                    $edition= filter_input(INPUT_POST,'edition');
                    $price= filter_input(INPUT_POST,'price');
                    $cat= filter_input(INPUT_POST,'cat');
                    require_once '../pack/DataManager.php';
                    $n=executeUpdate("update book set title='$title',author='$author',publication='$pub',edition='$edition',price=$price,category='$cat',qty=$qty where bid='$bid'");
                    if($n==1)
                    {
        ?>
        <h1>Successfull</h1>
        <a href='booksector.php'>Book Sector</a>
        <?php
                    }
                    else
                    {
        ?>
        <h1>Fail either no update</h1>
        <a href="booksector.php">Book Sector</a>
        <?php
                    }
                }
        ?>
    </body>
</html>

