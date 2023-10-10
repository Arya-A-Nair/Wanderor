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
                session_start();
                $_SESSION['username']=$username;
                $_SESSION['UID']=$result['UID'];
                $_SESSION['email']=$result['email'];
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            return false;
        }
    }

    function logout(){
        session_destroy();
        header("Location: ../index.php");
    }

    function getTrekCart(){
        global $projectDB;
        connectProjectDB();
        $query="SELECT * FROM treks,trekcart where treks.tId=trekcart.TID AND UID=:UID";
        try{
            session_start();    
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":UID",$_SESSION['UID']);
            $statement->execute();
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            return null;
        }
    } 
    
    function orderTreksInCart(){
        global $projectDB;
        connectProjectDB();
        $query="SELECT * FROM treks,trekcart where treks.tId=trekcart.TID AND UID=:UID";
        try{
            session_start();    
            $statement=$projectDB->prepare($query);
            $statement->bindParam(":UID",$_SESSION['UID']);
            $statement->execute();
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);

            $table="<table border='1'>";
            $table.="<tr><th>Title</th><th>Description</th><th>Date</th><th>Location</th><th>Capacity</th><th>Occupied</th><th>Photo</th><th>Price</th></tr>";
            foreach($result as $row){
                $table.="<tr>";
                $table.="<td>".$row['title']."</td>";
                $table.="<td>".$row['description']."</td>";
                $table.="<td>".$row['date']."</td>";
                $table.="<td>".$row['location']."</td>";
                $table.="<td>".$row['capacity']."</td>";
                $table.="<td>".$row['occupied']."</td>";
                $table.="<td>".$row['photo']."</td>";
                $table.="<td>".$row['price']."</td>";
                $table.="</tr>";
            }
            $table.="</table>";

            $to=$_SESSION['email'];
            $subject="List of Items purchased";
            $content=$table;
            sendMail($to,$subject,$content);
            return $result;
        }catch(PDOException $e){
            return null;
        }
    }
?>