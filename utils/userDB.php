<?php
    include "db.php";
    include "mailing.php";
    function register($username,$email,$password){
        global $projectDB;
        connectProjectDB();
        $query="INSERT INTO users (username,email,password) VALUES (:username,:email,:password)";
        try{
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":username",$username);
            $statement->bindParam(":email",$email);
            $statement->bindParam(":password",$password);
            $statement->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    function login($username,$password){
        global $projectDB;
        connectProjectDB();
        $query="SELECT * FROM users WHERE username=:username AND password=:password";

        try{
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":username",$username);
            $statement->bindParam(":password",$password);
            $statement->execute();
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            if($result){
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['username']=$username;
                $_SESSION['UID']=$result['UID'];
                $_SESSION['email']=$result['email'];
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    

    function getTrekCart(){
        global $projectDB;
        connectProjectDB();
        $query="SELECT *,COUNT(*) as quantity FROM treks,trekcart where treks.tId=trekcart.TID AND UID=:UID GROUP BY UID,treks.tId";
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":UID",$_SESSION['UID']);
            $statement->execute();
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            return null;
        }
    } 

    function removeTrekFromCart($TID){
        global $projectDB;
        connectProjectDB();
        $query="DELETE FROM trekcart WHERE UID=:UID AND TID=:TID";
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":UID",$_SESSION['UID']);
            $statement->bindParam(":TID",$TID);
            $statement->execute();

            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    
    function orderTreksInCart(){
        global $projectDB;
        connectProjectDB();
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $query="SELECT *,COUNT(*) as quantity FROM treks,trekcart where treks.tId=trekcart.TID AND UID=:UID GROUP BY UID,treks.tId";
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":UID",$_SESSION['UID']);
            $statement->execute();
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            $table="<h1>Treks</h1>";
            $table.="<table border='1'>";
            $table.="<tr><th>Title</th><th>Description</th><th>Date</th><th>Location</th><th>Photo</th><th>Price</th><th>Quantity</th></tr>";
            foreach($result as $row){
                $table.="<tr>";
                $table.="<td>".$row['title']."</td>";
                $table.="<td>".$row['description']."</td>";
                $table.="<td>".$row['date']."</td>";
                $table.="<td>".$row['location']."</td>";
                $table.="<td>".$row['photo']."</td>";
                $table.="<td>".$row['price']."</td>";
                $table.="<td>".$row['quantity']."</td>";
                $table.="</tr>";
            }
            $table.="</table>";

            $query2="INSERT INTO trekordered (UID, TID, DOP) SELECT UID, TID, NOW() FROM trekCart WHERE UID = :UID";
            $statement2=$projectDB->prepare($query2);
            $statement2->bindParam(":UID",$_SESSION['UID']);
            $statement2->execute();

            $query3="DELETE FROM trekCart WHERE UID = :UID";
            $statement3=$projectDB->prepare($query3);
            $statement3->bindParam(":UID",$_SESSION['UID']);
            $statement3->execute();

            $query4="UPDATE treks AS t
            LEFT JOIN (
                SELECT TID, COUNT(*) AS count_occupied
                FROM trekordered
                GROUP BY TID
            ) AS to_occupied
            ON t.TID = to_occupied.TID
            SET t.occupied = COALESCE(to_occupied.count_occupied, 0)";
            $statement4=$projectDB->prepare($query4);
            $statement4->execute();
            return $table;
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }

    function getPreviouslyOrderedTreks(){
        global $projectDB;
        connectProjectDB();
        $query="SELECT * FROM treks,trekordered where treks.tId=trekordered.TID AND UID=:UID ORDER BY DOP DESC";
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }  
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":UID",$_SESSION['UID']);
            $statement->execute();
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            return null;
        }
    }

    function getProductCart(){
        global $projectDB;
        connectProjectDB();
        $query1="SELECT *,COUNT(*) as quantity from products,productcart where products.PID=productcart.PID AND UID=:UID GROUP BY UID,products.PID";
        try{
            $statement=$projectDB->prepare($query1);
            $statement->bindParam(":UID",$_SESSION['UID']);
            $statement->execute();
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            return null;
        }
    }

    function removeProductFromCart($PID){
        global $projectDB;
        connectProjectDB();
        $query="DELETE FROM productcart WHERE UID=:UID AND PID=:PID";
        try{if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":UID",$_SESSION['UID']);
            $statement->bindParam(":PID",$PID);
            $statement->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function orderProductInCart(){
        global $projectDB;
        connectProjectDB();
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }   
            $query="SELECT *,COUNT(*) as quantity FROM productcart,products where products.PID=productcart.PID AND UID=:UID GROUP BY UID,products.PID";
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":UID",$_SESSION['UID']);
            $statement->execute();
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);

            
            $table="<h1>Products</h1>";
            $table.="<table border='1'>";
            $table.="<tr><th>Title</th><th>Description</th><th>Price</th><th>Photo</th><th>Quantity</th></tr>";
            foreach($result as $row){
                $table.="<tr>";
                $table.="<td>".$row['Title']."</td>";
                $table.="<td>".$row['description']."</td>";
                $table.="<td>".$row['price']."</td>";
                $table.="<td>".$row['Photo']."</td>";
                $table.="<td>".$row['quantity']."</td>";
                $table.="</tr>";
            }
            $table.="</table>";

            $query2="INSERT INTO productordered (UID, PID, DOP) SELECT UID, PID, NOW() FROM productCart WHERE UID = :UID";
            $statement2=$projectDB->prepare($query2);
            $statement2->bindParam(":UID",$_SESSION['UID']);
            $statement2->execute();

            $query3="DELETE FROM productCart WHERE UID = :UID";
            $statement3=$projectDB->prepare($query3);
            $statement3->bindParam(":UID",$_SESSION['UID']);
            $statement3->execute();

            return $table;
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }

    function getPreviouslyOrderedProducts(){
        global $projectDB;
        connectProjectDB();
        $query="SELECT * FROM products,productordered where products.PID=productordered.PID AND UID=:UID ORDER BY DOP DESC";
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }   
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":UID",$_SESSION['UID']);
            $statement->execute();
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            return null;
        }
    }

    function cartTotal(){
        global $projectDB;
        connectProjectDB();
        try{
            $query="SELECT SUM(price) FROM treks,trekcart where treks.tId=trekcart.TID AND UID=:UID";
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            } 
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":UID",$_SESSION['UID']);
            $statement->execute();

            $query2="SELECT SUM(price) FROM products,productcart where products.PID=productcart.PID AND UID=:UID";
            $statement2=$projectDB->prepare($query2);
            $statement2->bindParam(":UID",$_SESSION['UID']);
            $statement2->execute();

            $result=$statement->fetch(PDO::FETCH_ASSOC);
            $result2=$statement2->fetch(PDO::FETCH_ASSOC);

            return $result['SUM(price)']+$result2['SUM(price)'];
        }catch(PDOException $e){
            return null;
        }
    }


    function fetchAllUsers(){
        global $projectDB;
        connectProjectDB();
        $query="SELECT DISTINCT email FROM users;";
        echo $query;
        try{
            $statement=$projectDB->prepare($query);
            $statement->execute();
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            echo print_r($result);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }
    // echo print_r(getTrekCart());
    // orderTreksInCart();
    // print_r(getPreviouslyOrdered());
    // echo cartTotal();
    function checkout(){
        try{
            $product=orderProductInCart();
            $trek=orderTreksInCart();  
            $to=$_SESSION['email'];
            $subject="List of Items purchased";
            $content=$product.$trek;
            sendMail($to,$subject,$content);
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }
?>