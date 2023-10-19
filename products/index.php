<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous"
	/>
    <link href="../styles/treks.css" rel="stylesheet" type="text/css">
    <title>Products</title>
</head>
<body>
    <?php include "../navbar.php" ?>
    <div class="container-fluid p-3" >
    <h1 class="mb-5">Products to explore</h1>


        <?php
        include "../utils/productsDB.php";
        $products=fetchAllProducts();
        
        $count=0;
        foreach ($products as $product) {
            if ($count % 4 == 0) {
                echo '<div class="row">';
            }
            echo '<div class="col-md-3">
                    <a href="product.php?id=' . $product['PID'] . '" class="card mb-4 p-3">
                        <img src="../uploads/' . $product['Photo'] . '" class="trek-image">
                        <div class="card-body">
                            <h2 class="card-title">' . $product['Title'] . '</h2>
                            <p class="card-text">' . $product['description'] . '</p>
                            <h4 class="card-text">₹' . $product['price'] . '</h4>
                        </div>
                    </a>
                </div>';
            if ($count % 4 == 3 || $count == count($product) - 1) {
                echo '</div>';
            }
            $count++;
            }
        ?>
        </div>
        <script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
			integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
			crossorigin="anonymous"
		></script>
</body>
</html>