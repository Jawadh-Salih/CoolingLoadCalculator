<?php
$stmt = "";
require_once '../config/DB.php';


try{

    $door_id = $_POST['door_id'];
    $wall_id= $_POST['wall_id'];
    $door_length = $_POST['width'];
    $door_height = $_POST['height'];
    $door_thickness = $_POST['thickness'];
    $int_temp  = $_POST['int_temp'];
    $ext_temp = $_POST['ext_temp'];
    $k_value = $_POST['k_val'];

    $stmt = $DB->prepare("INSERT INTO tbl_door
                      (door_id,height,width,thickness,wall_id,int_temp,ext_temp,k_val) VALUES
                      (:door_id,:height,:length,:thickness,:wall_id,:int_temp,:ext_temp,:k_val)");


    $stmt->bindParam(":door_id",$door_id);
    $stmt->bindParam(":wall_id",$wall_id);
    $stmt->bindParam(":thickness",$door_thickness);
    $stmt->bindParam(":length",$door_length);
    $stmt->bindParam(":height",$door_height);
    $stmt->bindParam(":int_temp",$int_temp);
    $stmt->bindParam(":ext_temp",$ext_temp);
    $stmt->bindParam(":k_val",$k_value);

    $stmt->execute();

    $url = "../index.html";
    header("Location: $url");
    echo "sdsdsad";
}catch (PDOException $e){
    echo $e->getMessage();
}



?>