<?php
$stmt = "";
require_once '../config/DB.php';


try{

    $door_id = $_POST['door_id'];
    $wall_id= $_POST['wall_id'];
    $door_length = $_POST['length'];
    $door_height = $_POST['height'];
    $door_thickness = $_POST['thickness'];
    $door_frame_val = $_POST['frame_val'];
//  $window_int_temp  = $_POST['int_temp'];
//  $window_ext_temp = $_POST['ext_temp'];
//    $door_k_value = $_POST['k_val'];

    $stmt = $DB->prepare("INSERT INTO tbl_door
                      (door_id,height,width,thickness,frame_thickness,wall_id) VALUES
                      (:door_id,:height,:length,:thickness,:frame_val,:wall_id)");


    $stmt->bindParam(":door_id",$door_id);
    $stmt->bindParam(":wall_id",$wall_id);
    $stmt->bindParam(":frame_val",$door_frame_val);
    $stmt->bindParam(":thickness",$door_thickness);
    $stmt->bindParam(":length",$door_length);
    $stmt->bindParam(":height",$door_height);
//  $stmt->bindParam(":int_temp",$int_temp);
//  $stmt->bindParam(":ext_temp",$ext_temp);
//  $stmt->bindParam(":k_val",$k_value);

    $stmt->execute();

    $url = "../index.html";
    header("Location: $url");
    echo "sdsdsad";
}catch (PDOException $e){
    echo $e->getMessage();
}



?>