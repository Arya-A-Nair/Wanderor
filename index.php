<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@600&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        /* Reset default margin and padding for the body */
        body {
            margin: 0;
            padding: 0;
        }

        /* Style for the navbar */
        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: space-between; /* Push elements to the edges */
            align-items: center;
            padding: 20px;
        }

        /* Style for the navbar elements */
        .navbar a {
            text-decoration: none;
            font-family: 'Lexend Deca';
            font-size: 12px;
            color: white;
            margin: 0 10px;
        }

        /* Style for the logout button */
        .logout-btn {
            background-color: white;
            color: black;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Lexend Deca', sans-serif;
        }

        .container2 {
            position: relative;
        }

        .image {
            width: 100%;
            height: auto;
        }

        .text {
            position: absolute;
            top: 50%;
            left: 10%;
            transform: translate(0%, -50%);
            color: white;
            text-align: left;
            font-size: 80px;
            font-family: 'Lexend Deca', sans-serif;
            font-weight: 300;
        }

        .belowtext {
            position: absolute;
            top: 80%;
            left: 10%;
            transform: translate(0%, -50%); 
            color: white;
            text-align: left;
            font-size: 20px;
            font-family: 'Lexend Deca', sans-serif;
            font-weight: 300;
        }

     
        .logo {
            margin-left: 20px; 
        }

        .right-section {
            display: flex;
        }

		.written{
			color: #000;
			font-family: 'Lexend Deca';
			font-size: 1.3rem;
			font-style: normal;
			font-weight: 500;
			margin: 1rem;
			display: flex;
			width: 20rem;
			height: 6.3125rem;
			flex-direction: column;
			justify-content: center;
			flex-shrink: 0;
		}

		.cimg-container {
			display: flex;
			flex-direction: row;
			align-items: center;
			overflow-x: auto; /* Allow horizontal scrolling if the content exceeds the screen width */
		}

		.cimg {
			width: 15rem;
			height: 12rem;
			border-radius: 5rem;
			margin: 1.5rem;
		}
    </style>
</head>
<body>
    <div class="navbar">
        <!-- Logo with a link to the home page -->
        <a class="logo" href="./">
            <img src="uploads/logo.png" alt="Your Logo" width="150" height="50">
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
                    if (isset($_POST['logout'])) {
                        logout();
                    }
                ?>
                <input hidden="true" name "logout" value="true" />
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <div class="container2">
        <img class="image" src="uploads/backgroundimg.png" alt="Your Image">
        <div class="text">Discover.<br>Trek.<br>Inspire.<br></div>
        <div class="belowtext">"Explore, Connect, and Trek the World's Wonders"</div>
    </div>

    
    
    <div class="cimg-container">
	    <div class="written">Top destinations suggested by expert guides</div>
        <img class="cimg" src="uploads/image5.png" alt="Image 1">
        <img class="cimg" src="uploads/image6.png" alt="Image 2">
        <img class="cimg" src="uploads/image7.png" alt="Image 3">
    </div>
</body>
</html>
