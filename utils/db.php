<?php
    function connectProjectDB(){
        global $projectDB;
        $projectDB= new PDO("mysql:host=localhost;dbname=project","root");
        $projectDB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
?>