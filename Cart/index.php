<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous"
	/>
    <link href="../styles/cart.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <?php include "../navbar.php" ;
        include "../utils/userDB.php";
        if($_SERVER['REQUEST_METHOD'] == "POST" ){
            if(isset($_POST['cart'])){
                    $status=orderProductInCart();
                    if($status== 1){
                        echo "<div class='alert alert-success' role='alert'>
                        Products checked out successfully
                        </div>";
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>
                        Products checkout failed
                        </div>";
                    }
                    $status=orderTreksInCart();
                    if($status==1){
                        echo "<div class='alert alert-success' role='alert'>
                        Treks checked out successfully
                        </div>";
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>
                        Trek checkout failed
                        </div>";
                    }
                
            }else{
                if($_POST['item']=="trek"){
                    removeTrekFromCart($_POST['id']);
                }else if($_POST['item']=="product"){
                    removeProductFromCart($_POST['id']);
                }
            }
        }


        $treks=getTrekCart();
        $products=getProductCart();


    ?>
    <div class="container-fluid px-5 py-5 ">
        <h1>Your cart</h1>
        <div class="row">
            <div class="col-8 ">
                <h3>Treks</h3>
                <?php
                    if(count($treks)==0){
                        echo '<div class="alert alert-danger" role="alert">
                        No treks in cart
                        </div>';
                    }else{

                    foreach ($treks as $item) {
                        echo '<a href="../treks/trek.php?id=' . $item['tId'] . '">
                                <div class="card cardrow p-4 mb-4">
                                    <div class="cardrow2">
                                        <img src="../uploads/' . $item['photo'] . '" class="image " alt="Trek Image">
                                        <div class="cardrow1">
                                            <h5 >' . $item['title'] . '</h5>
                                            <p >' . $item['description'] . '</p>
                                            <p >Date: ' . $item['date'] . '</p>
                                            <p >Location: ' . $item['location'] . '</p>
                                            <p >Price: ₹' . $item['price'] . '</p>
                                            <p> Quantity:' . $item['quantity'] . '</p>
                                        </div>
                                    </div>
                                    <div class="button">
                                        <form method="POST">
                                            <input hidden name="item" value="trek">
                                            <input hidden name="id" value="' . $item['tId'] . '">
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </a>'
                            ;
                    }
                }

                ?>
            <h3>Products</h3>
            <?php
                    if(count($products)==0){
                        echo '<div class="alert alert-danger" role="alert">
                        No products in cart
                        </div>';
                    }else{

                        foreach ($products as $item) {
                            echo '
                            <a href="../products/product.php?id=' . $item['PID'] . '">
                            <div class="card cardrow p-4 mb-4">
                            <div class="cardrow2">
                                <img src="../uploads/' . $item['Photo'] . '" class="image " alt="Trek Image">
                                    <div class="cardrow1">
                                        <h5 >' . $item['Title'] . '</h5>
                                        <p >' . $item['description'] . '</p>
                                        <p >Price: ₹' . $item['price'] . '</p>
                                        <p> Quantity:' . $item['quantity'] . '</p>
                                    </div>
                                </div>
                                    <div class="button">
                                        <form method="POST">
                                        <input hidden name="item" value="product">
                                        
                                        <input hidden name="id" value="' . $item['PID'] . '">
                                        <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </a>'
                            ;
                        }
                    }
                ?>
            </div>
            <div class="col-4 card p-4">
                <h3>Cart Summary</h3>
                <p>Total Items: <?php 
                    $count=0;
                    foreach ($treks as $item) {
                        $count+=$item['quantity'];
                    }
                    foreach($products as $item){
                        $count+=$item['quantity'];
                    }
                    echo $count;
                ?></p>
                <p>Total Price: ₹<?php echo cartTotal() ?></p>
                <form method="POST">
                    <input hidden name="cart" value="true">
                    <button type="submit" class="btn btn-primary">Checkout</button>
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