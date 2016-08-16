<?php
$stmt = "";
require_once '../config/DB.php';


try{

    $occupance_count = $_POST['occupance_count'];
    $shgpp = 0;//$_POST['shgpp'];


    $stmt = $DB->prepare("INSERT INTO tbl_occupance
                      (occupance_count,shgpp) VALUES
                      (:occupance_count,:shgpp)");


    $stmt->bindParam(":shgpp",$shgpp);
    $stmt->bindParam(":occupance_count",$occupance_count);


    $stmt->execute();

    $url = "../index.html";
    header("Location: $url");
    echo "sdsdsad";
}catch (PDOException $e){
    echo $e->getMessage();
}



?>