<?php
    function getAllPreviouslyOrdered(){
        global $projectDB;
        connectProjectDB();
        $query="SELECT * FROM productordered";
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

    function getAllPreviouslyOrderedTreks(){
        global $projectDB;
        connectProjectDB();
        $query="SELECT * FROM trekordered";
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

    function getAllCartProducts(){
        global $projectDB;
        connectProjectDB();
        $query="SELECT * FROM productcart";
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
    function getAllCartTreks(){
        global $projectDB;
        connectProjectDB();
        $query="SELECT * FROM trekcart";
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

?>