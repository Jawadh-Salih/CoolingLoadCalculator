<?php
$stmt = "";
require_once '../config/DB.php';


try{

    $occupance_count = $_POST['occupance_count'];


    $stmt = $DB->prepare("INSERT INTO tbl_occupance
                      (occupance_count) VALUES
                      (:occupance_count)");


    $stmt->bindParam(":occupance_count",$occupance_count);


    $stmt->execute();

    $url = "../index.html";
    header("Location: $url");
    echo "sdsdsad";
}catch (PDOException $e){
    echo $e->getMessage();
}



?>