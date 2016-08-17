<?php
$stmt = "";
require_once '../config/DB.php';


try{

    $volume_flowrate = $_POST['volume_flow_rate'];
    $int_temp= $_POST['int_temp'];
    $ext_temp = $_POST['ext_temp'];
    $inside_mois = $_POST['in_mois_lvl'];
    $outside_mois = $_POST['out_mois_lvl'];


    $stmt = $DB->prepare("INSERT INTO tbl_ventilation
                      (volume_flowrate,int_temp,ext_temp,inside_mois,outside_mois) VALUES
                      (:volume_flowrate,:int_temp,:ext_temp,:inside_mois,:outside_mois)");


    $stmt->bindParam(":volume_flowrate",$volume_flowrate);
    $stmt->bindParam(":int_temp",$int_temp);
    $stmt->bindParam(":ext_temp",$ext_temp);
    $stmt->bindParam(":inside_mois",$inside_mois);
    $stmt->bindParam(":outside_mois",$outside_mois);



    $stmt->execute();

    $url = "../index.html";
    header("Location: $url");
    echo "sdsdsad";
}catch (PDOException $e){
    echo $e->getMessage();
}



?>