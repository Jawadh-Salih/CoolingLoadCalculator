<?php
$stmt = "";
require_once '../config/DB.php';


try{

    $votage = $_POST['votage'];
    $uf = $_POST['uf'];
    $bf = $_POST['bf'];

    $stmt = $DB->prepare("INSERT INTO tbl_lighting
                      (votage,uf,bf) VALUES
                      (:votage,:uf,bf)");


    $stmt->bindParam(":votage",$votage);
    $stmt->bindParam(":uf",$uf);
    $stmt->bindParam(":bf",$bf);


    $stmt->execute();

    $url = "../index.html";
    header("Location: $url");
    echo "sdsdsad";
}catch (PDOException $e){
    echo $e->getMessage();
}



?>