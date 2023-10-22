<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
			integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
			crossorigin="anonymous"
		/>
</head>
<body>
    <?php include "./adminnavbar.php" ?>
    <div class="container-fluid p-5">
        <h1 class="mb-5">Admin</h1>
        <div class="row g-5">
            <div class="col-5 p-5 m-5 card text-center">
                <h4>Products</h4>
                <?php 
                    include "../utils/productsDB.php";
                    $products=fetchAllProducts();
                    echo "<h5>Total Products: ".count($products)."</h5>";
                ?>
                <a href="./products.php" class="btn btn-primary">View</a>
            </div>
            <div class="col-5 p-5 m-5 card text-center">
                <h4>Treks</h4>
                <?php
                    include "../utils/trekDB.php";
                    $treks=fetchAllTreks();
                    echo "<h5>Total Treks: ".count($treks)."</h5>";
                ?>
                <a href="./treks.php" class="btn btn-primary">View</a>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-5 p-5 m-5 card text-center">
                <h4>Products and treks ordered</h4>
                <?php
                    include "./utils.php";
                    $products=getAllPreviouslyOrdered();
                    $treks=getAllPreviouslyOrderedTreks();
                    echo "<h5>Total Products and treks ordered: ".count($products)+count($treks)."</h5>";
                ?>
                <a href="./users.php" class="btn btn-primary">View user wise</a>
            </div>
            <div class="col-5 p-5 m-5 card text-center">
                <h4>Products and treks in cart</h4>
                <?php
                    $products=getAllCartProducts();
                    $treks=getAllCartTreks();
                    echo "<h5>Total Products and treks in cart: ".count($products)+count($treks)."</h5>";
                ?>
                <a href="./users.php" class="btn btn-primary">View user wise</a>
            </div>
        </div>
    </div>
</body>
</html>