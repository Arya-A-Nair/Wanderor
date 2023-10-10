<?php
    include "db.php";
    function fetchAllProducts(){
        global $projectDB;
        connectProjectDB();
        $query="SELECT * FROM products";
        try{
            $statement=$projectDB->prepare($query);
            $statement->execute();
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            $projectDB=null;
            return $result;
        }catch (PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }

    function fetchProductByID($PID){
        global $projectDB;
        connectProjectDB();
        try{
            $query="SELECT * FROM products WHERE PID=:PID";
            $statement=$projectDB->prepare($query);
            $statement->bindValue(":PID",$PID);
            $statement->execute();
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            $projectDB=null;
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }

    function insertProduct($title,$photo,$description,$price){
        global $projectDB;
        connectProjectDB();
        $query="INSERT INTO products (title,photo,description,price) VALUES (:title,:photo,:description,:price)";
        try{
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":title",$title);
            $statement->bindParam(":photo",$photo);
            $statement->bindParam(":description",$description);
            $statement->bindParam(":price",$price);
            $statement->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    function editProduct($PID,$title,$photo,$description,$price){
        global $projectDB;
        connectProjectDB();
        $query="UPDATE products SET title=:title,photo=:photo,description=:description,price=:price WHERE PID=:PID";
        try{
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":PID",$PID);
            $statement->bindParam(":title",$title);
            $statement->bindParam(":photo",$photo);
            $statement->bindParam(":description",$description);
            $statement->bindParam(":price",$price);
            $statement->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    function addProductToCart($PID){
        global $projectDB;
        connectProjectDB();
        $query="INSERT INTO productcart (UID,PID) VALUES (:UID,:PID)";
        try{
            session_start();    
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

    // addProductToCart(1);
?>