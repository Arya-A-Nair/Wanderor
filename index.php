<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Leckerli+One" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Document</title>
</head>
<body>
    <div class="navbar">
        
        <a class="logo" href="./">
            <img src="images/logo.png" alt="Your Logo" width="150" height="50">
        </a>
        <div class="right-section">
            <a href="./treks">Treks</a>
            <a href="./products">Products</a>
            <a href="./cart">Cart</a>
            <a href="./pastOrders">Past Orders</a>
            <?php
            session_start();
            $_SESSION['username'] = "admin";
            if ($_SESSION['username'] == "admin") {
                echo '<a href="./admin">Admin</a>';
            }
            ?>
            <form method="POST">
				<?php 
					include "utils/logoutindex.php";
					if(isset($_POST['logout'])){
						logout();
					}
				?>
				<input hidden="true" name="logout" value="true"/>
				<button type="submit" class="logout-btn">Logout</button>
				</form>
        </div>
    </div>

    <div class="container2">
        <img class="image" src="images/backgroundimg.png" alt="Your Image">
        <div class="text">Discover.<br>Trek.<br>Inspire.<br></div>
        <div class="belowtext">"Explore, Connect, and Trek the World's Wonders"</div>
    </div>

    <div class="cimg-container">
	    <div class="written">Top destinations suggested by expert guides</div>
        <img class="cimg" src="images/image5.png" alt="Image 1">
        <img class="cimg" src="images/image6.png" alt="Image 2">
        <img class="cimg" src="images/image7.png" alt="Image 3">
    </div>
	
    <div class="centered-container">
    <img src="images/image9.png">
    <div class="smalltext">Best trek operations</div>
    <div class="text2">Excellence in the<br>trekking industry</div>
    <div class="explore-buttons">
        <a href="treks/index.php"><button class="explore-button">Explore our treks</button></a>
        <a href="treks/index.php"><button class="explore-button">Trekking products</button></a>
        <a href="treks/index.php"><button class="explore-button">Blogs and articles</button></a>
    </div>
</div>

    <div class="centered-container">
            <div class="img"><img src="images/image9.png"></div>
            <div class="smalltext">Make more memories!</div>
        <div class="text2">Recommended treks</div>
        <div class="para">From the towering peaks of the Himalayas to the lush rainforests of South America, these destinations beckon with pristine trails and breathtaking vistas.Each destination has its own story to tell, and as you traverse its paths, you become a part of that story, creating memories that will last a lifetime. 
        <br><br>Explore our curated list of trekking destinations and embark on a journey that promises to be both physically invigorating and spiritually enriching.</div>
    </div>

    <div class="wrapper">
        <a href="treks/index.php">
            <div class="image2">
                <img class="image3" src="images/image10.png">
                <div class="content">
                    <h1>Uttarakhand</h1>
                    <p>Explore the beauty of Uttarakhand</p>
                </div>
            </div>
        </a>

        <a href="treks/index.php">
            <div class="image2">
                <img class="image3" src="images/image11.png">
                <div class="content">
                    <h1>Camino de Santiago</h1>
                    <p>Explore the beauty of Camino de Santiago</p>
                </div>
            </div>
        </a>

        <a href="treks/index.php">
            <div class="image2">
                <img class="image3" src="images/image12.png">
                <div class="content">
                    <h1>Haute Route</h1>
                    <p>Explore the beauty of Haute Route</p>
                </div>
            </div>
        </a>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2023 Your Website Name</p>
            <ul class="footer-nav">
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </div>
    </footer>


</body>
</html>
