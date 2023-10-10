<?php 
    $projectDB=null;
    include "db.php";

    function fetchAllTreks(){
        global $projectDB;
        connectProjectDB();
        $query="SELECT * FROM treks";

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

    function fetchTrekByID($id){
        global $projectDB;
        connectProjectDB();
        try{

            $query="SELECT * FROM treks WHERE tid=:id";
            $statement=$projectDB->prepare($query);
            $statement->bindValue(":id",$id);
            $statement->execute();
            $result=$statement->fetch(PDO::FETCH_ASSOC);
            $projectDB=null;
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }

    function insertTrek($title, $description, $date, $location, $capacity, $occupied, $photo, $price) {
        global $projectDB;
        connectProjectDB();
        $query = "INSERT INTO treks (title, description, date, location, capacity, occupied, photo,price) VALUES (:title, :description, :date, :location, :capacity, :occupied, :photo, :price)";
        try {
            $statement = $projectDB->prepare($query);
            $statement->bindParam(":title", $title);
            $statement->bindParam(":description", $description);
            $statement->bindParam(":date", $date);
            $statement->bindParam(":location", $location);
            $statement->bindParam(":capacity", $capacity);
            $statement->bindParam(":occupied", $occupied);
            $statement->bindParam(":photo", $photo);
            $statement->bindParam(":price", $price);
            $statement->execute();
            return true; 
        } catch (PDOException $e) {
            return false; 
        }
    }

    function editTrek($id, $title, $description, $date, $location, $capacity, $occupied, $photo){
        global $projectDB;
        connectProjectDB();
        $query="UPDATE treks SET title=:title, description=:description, date=:date, location=:location, capacity=:capacity, occupied=:occupied, photo=:photo WHERE tid=:id";
        try{
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":id",$id);
            $statement->bindParam(":title",$title);
            $statement->bindParam(":description",$description);
            $statement->bindParam(":date",$date);
            $statement->bindParam(":location",$location);
            $statement->bindParam(":capacity",$capacity);
            $statement->bindParam(":occupied",$occupied);
            $statement->bindParam(":photo",$photo);
            $statement->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    function addTrekToCart($TID){
        global $projectDB;
        connectProjectDB();
        $query="INSERT INTO trekcart (UID,TID) VALUES (:UID,:TID)";
        try{
            session_start();
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":UID",$_SESSION['UID']);
            $statement->bindParam(":TID",$TID);
            $statement->execute();
            echo "Trek added to cart";
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

?>
