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
        <title>Book Update</title>
    </head>
    <body>
        <div class="container-fluid">
            <h2 class="page-header text-uppercase text-warning">Edit Book Information</h2>
            <?php
                if(filter_input(INPUT_GET,'curBid')!=null)
                {
                    $bid=filter_input(INPUT_GET,'curBid');
                    require_once '../pack/DataManager.php';
                    $rs=executeQuery("select * from book where bid=$bid");
                    $n=mysql_num_rows($rs);
                    if($n>0)
                    {
                        $row = mysql_fetch_array($rs);
                        $bid = $row['bid'];
                        $title = $row['title'];
                        $author = $row['author'];
                        $pub = $row['publication'];
                        $edition = $row['edition'];
                        $price=$row['price'];
                        $cat=$row['category'];
                        $qty=$row['qty'];
            ?>
                <form class="form-horizontal" method="post" action="updateBookDetail.php">
                        
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="bid">Book ID:</label>
                          <div class="col-sm-8">
                              <input type="text" value='<?php echo $bid; ?>' name="bid" class="form-control disabled" id="bid" readonly="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="title">Book Title:</label>
                          <div class="col-sm-8">
                              <input type="text" value='<?php echo $title; ?>' name="title" class="form-control" id="title" placeholder="Enter Title" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="author">Book Author:</label>
                          <div class="col-sm-8">
                            <input type="text" value='<?php echo $author; ?>' name="author" class="form-control" id="author" placeholder="Enter Author">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="pub">Book Publication:</label>
                          <div class="col-sm-8">
                            <input type="text" value='<?php echo $pub; ?>' name="pub" class="form-control" id="pub" placeholder="Enter Publication">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="edition">Book Edition:</label>
                          <div class="col-sm-2">
                              <input type="text" value='<?php echo $edition; ?>' name="edition" class="form-control disabled" readonly="" id="edition" >
                          </div>
                          <div class="col-sm-6">
                              <select class="form-control" name="edition" id="edition">
                                <option>Ist</option>
                                <option>IInd</option>
                                <option>IIIrd</option>
                                <option>IVth</option>
                              </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="price">Book Price:</label>
                          <div class="col-sm-8">
                              <input type="number"value='<?php echo $price; ?>' name="price" class="form-control" id="price" placeholder="Price">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="cat">Book Category:</label>
                          <div class="col-sm-2">
                              <input type="text" value='<?php echo $cat; ?>' name="cat" class="form-control disabled" readonly="" id="cat" >
                          </div>
                          <div class="col-sm-6">
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
                              </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="text-info control-label col-sm-2" for="qty">Book Quantity:</label>
                          <div class="col-sm-8">
                              <input type="number" value='<?php echo $qty; ?>' name="qty" value="1" class="form-control" id="qty" placeholder="Quantity">
                          </div>
                        </div>
                        <div class="form-group"> 
                          <div class="col-sm-offset-2 col-sm-10">
                              <input type="submit" value="Update Detail" name="editbook" class="btn btn-info btn-lg"/>
                          </div>
                        </div>
                </form> 
            <?php
                    }
                    
                }
            ?>
        </div>
    </body>
</html>
