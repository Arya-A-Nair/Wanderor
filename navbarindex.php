<!DOCTYPE html>
<html>
<head>
    <style>
        /* Set background to transparent for html and body elements */
        /* html, body {
            background: transparent;
            margin: 0;
            padding: 0;
        } */

        .navbar {
            display: block;
            transition: 0.5s;
            position: fixed;
            width: 100%;
            text-align: center;
            z-index: 1;
            transition: 0.5s;
        }

        .navbar ul {
            text-align: center;
            padding: 0;
        }

        .navbar li {
            display: block;
            margin: 10px 0;
            color: #ffffff;
        }

        .navbar li a {
            text-decoration: none;
        }

        .image-container {
            position: absolute;
        }

        .image-container img {
            width: 100%;
            height: auto;
        }


        /* Style for the logout button */
        .logout-btn {
            background-color: white;
            color: black;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="image-container"><img src="uploads/backgroundimg.png" alt=""></div>
    <div class="navbar">
        <ul>
            <a href="./">Home</a>
            <a href="./treks">Treks</a>
            <a href="./products">Products</a>
            <a href="./cart">Cart</a>
            <a href="./pastOrders">Past Orders</a>
            <?php
            session_start();
            $_SESSION['username'] = "admin";
            if($_SESSION['username']=="admin"){
                echo '<li>
                <a href="./admin">Admin</a>
            </li>';
            }
        ?>
        </ul>
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

    
</body>
</html>
