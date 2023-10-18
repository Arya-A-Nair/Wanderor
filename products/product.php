<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Trek</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous"
	/>
    <link href="../styles/trek.css" rel="stylesheet" type="text/css">
    
</head>
<body>
    <?php
        include "../navbar.php";
        include "../utils/productsDB.php";
        $trek=null;
        $error=null;

        if(isset($_GET['id'])){
            $trek = fetchProductByID($_GET['id']);
        }
        if(isset($_POST['id'])){
            $trek = fetchProductByID($_POST['id']);
        }

        if($_SERVER['REQUEST_METHOD'] == "POST" ){
            $status=addProductToCart($_POST['id']);
            if($status==true){
                $error="Trek added to cart";
            }

        }
    ?>
    <div class="container-fluid my-4">
        <div class="row justify-content-between mx-4">
        <div class="col-7 card p-4 ">
            <img src="../uploads/<?php echo $trek['Photo'] ?>" class="trek-image"/>
            <h1 class="mt-4"><?php echo $trek['Title'] ?></h1>
            <p><?php echo $trek['description'] ?></p>
        </div>
        <div class="col-4 card">
            <h1 class="mt-4"><?php echo $trek['Title'] ?></h1>
            <p><?php echo $trek['description'] ?></p>
            <h4>₹<?php echo $trek['price'] ?></h4>
            <form method="POST">
                <input type="number" name="id" value="<?php echo $trek['PID'] ?>" hidden/>
                <input type="submit" value="Add to Cart" class="btn btn-primary"></input>
                <p><?php
                if($error=="Trek added to cart"){
                    echo "<div class='alert alert-success' role='alert'>
                    Item added to cart successfully
                    </div>";
                }
                
                ?></p>
            </form>
        </div>
        </div>
    </div>

    <script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
			integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
			crossorigin="anonymous"
		></script>
</body>
</html>