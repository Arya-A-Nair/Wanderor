<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous"
	/>
    <link href="../styles/cart.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <?php include "../navbar.php";
        include "../utils/userDB.php";
    
        $treks=getPreviouslyOrderedTreks();

        $products=getPreviouslyOrderedProducts();
    ?>
    <div class="row p-5">
        <div class="card p-5 my-4">
            <div class="d-flex justify-content-between">
                <div >
                    
                    <h1>Previously ordered treks</h1>
                </div>
                <div>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".trek" aria-expanded="false" aria-controls="collapseExample">
                        Show/Hide
                    </button>
                </div>
            </div>

        <div class="collapse trek">
    <?php
        foreach($treks as $trek){
            echo "<a href='../treks/trek.php?id=".$trek['tId']."'>
            <div class='card my-4 p-4'>
            <div class='row'>
                <div class='col-4'>
                    <img src='../uploads/".$trek['photo']."' class='trek-image'/>
                </div>
                <div class='col-8'>
                    <h1 class='mt-4'>".$trek['title']."</h1>
                    <p>".$trek['description']."</p>
                    <p>".$trek['location']."</p>
                    <h4>₹".$trek['price']."</h4>
                    <h5>Date of Purchase: ". $trek['DOP']."</h5>
                </div>
            </div></div></a>";}
    ?>
    </div>


        </div>
        <div class="card my-4 p-4">
        <div class="d-flex justify-content-between">
                <div >
                    
                    <h1>Previously ordered Products</h1>
                </div>
                <div >
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".product" aria-expanded="false" aria-controls="collapseExample">
                        Show/Hide
                    </button>
                </div>
            </div>

        <div class="collapse product">
    <?php
    foreach($products as $product){
        echo "<a href='../products/product.php?id=".$product['PID']."'>
        <div class='card my-4 p-4'>
        <div class='row'>
            <div class='col-4'>
                <img src='../uploads/".$product['Photo']."' class='trek-image'/>
            </div>
            <div class='col-8'>
                <h1 class='mt-4'>".$product['Title']."</h1>
                <p>".$product['description']."</p>
                <h4>₹".$product['price']."</h4>
                <h5>Date of Purchase: ". $product['DOP']."</h5>

            </div>
        </div></div></a>";}
?>
</div>
        </div>
    
    <div>
    




    <script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
		integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
		crossorigin="anonymous"
	></script>
</body>
</html>