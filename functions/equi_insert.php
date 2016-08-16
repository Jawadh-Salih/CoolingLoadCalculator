<?php
$stmt = "";
require_once '../config/DB.php';


try{

    $votage = $_POST['votage'];
    $uf = $_POST['uf'];


    $stmt = $DB->prepare("INSERT INTO tbl_equipment
                      (votage,uf) VALUES
                      (:votage,:uf)");


    $stmt->bindParam(":votage",$votage);
    $stmt->bindParam(":uf",$uf);


    $stmt->execute();

    $url = "../index.html";
    header("Location: $url");
    echo "sdsdsad";
}catch (PDOException $e){
    echo $e->getMessage();
}



?>