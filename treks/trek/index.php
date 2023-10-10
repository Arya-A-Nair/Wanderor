<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Trek</title>
    <link href="../../styles/trek.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
        include "../../utils/trekDB.php";
        $trek=null;
        $error=null;

        if(isset($_GET['id'])){
            $trek = fetchTrekByID($_GET['id']);
        }
        if(isset($_POST['id'])){
            $trek = fetchTrekByID($_POST['id']);
        }

        if($_SERVER['REQUEST_METHOD'] == "POST" ){
            $status=addTrekToCart($_POST['id']);
            if($status==true){
                $error="Trek added to cart";
            }else if($status==false){
                $error="Trek already in cart";
            }

        }
    ?>
    <div class="container">
        <div>
            <img src="../../uploads/<?php echo $trek['photo'] ?>" class="trek-image"/>
            
                <h1><?php echo $trek['title'] ?></h1>
                <p><?php echo $trek['description'] ?></p>
                <p><?php echo $trek['location'] ?></p>
                <h4>₹<?php echo $trek['price'] ?></h4>
            
        </div>
        <div>
            <form method="POST">
                <input type="number" name="id" value="<?php echo $trek['tId'] ?>" hidden/>
                <input type="submit" value="Add to Cart"></input>
                <p><?php echo $error ?></p>
            </form>
        </div>
    </div>


</body>
</html>