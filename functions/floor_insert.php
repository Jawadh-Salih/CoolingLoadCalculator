<?php

require_once '../config/DB.php';
try{

    $floor_id = $_POST['floor_id'];
    $floor_width= $_POST['width'];
    $floor_height = $_POST['height'];
    $floor_thickness = $_POST['thickness'];
//  $door_frame_val = $_POST['frame_val'];
    $int_temp  = $_POST['int_temp'];
    $ext_temp = $_POST['ext_temp'];
//  $door_k_value = $_POST['k_val'];

    $stmt = $DB->prepare("INSERT INTO tbl_floor
                      (floor_id,height,width,thickness,int_temp,ext_temp) VALUES
                      (:floor_id,:height,:width,:thickness,:int_temp,:ext_temp)");
    $stmt->bindParam(":floor_id",$floor_id);
    $stmt->bindParam(":thickness",$floor_thickness);
    $stmt->bindParam(":width",$floor_width);
    $stmt->bindParam(":height",$floor_height);
    $stmt->bindParam(":int_temp",$int_temp);
    $stmt->bindParam(":ext_temp",$ext_temp);
//  $stmt->bindParam(":k_val",$k_value);

    $stmt->execute();

    $url = "../index.html";
    header("Location: $url");
    echo "sdsdsad";
}catch (PDOException $e){
    echo $e->getMessage();
}



?>