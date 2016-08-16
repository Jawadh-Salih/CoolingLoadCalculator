<?php

require_once '../config/DB.php';
try{

    $window_id = $_POST['win_id'];
    $wall_id= $_POST['wall_id'];
    $length = $_POST['length'];
    $height = $_POST['height'];
    $thickness = $_POST['thickness'];
    $frame_val = $_POST['frame_val'];
//  $window_int_temp  = $_POST['int_temp'];
//  $window_ext_temp = $_POST['ext_temp'];
    $k_value = $_POST['k_val'];

    $stmt = $DB->prepare("INSERT INTO tbl_window
                      (window_id,height,length,thickness,frame_thickness,k_val,wall_id) VALUES
                      (:window_id,:height,:length,:thickness,:frame_val,:k_val,:wall_id)");
    $stmt->bindParam(":window_id",$window_id);
    $stmt->bindParam(":height",$height);
    $stmt->bindParam(":length",$length);
    $stmt->bindParam(":thickness",$thickness);
    $stmt->bindParam(":frame_val",$frame_val);
//  $stmt->bindParam(":int_temp",$int_temp);
//  $stmt->bindParam(":ext_temp",$ext_temp);
    $stmt->bindParam(":k_val",$k_value);
    $stmt->bindParam(":wall_id",$wall_id);

    $stmt->execute();

    $url = "../index.html";
    header("Location: $url");
    echo "sdsdsad";


}catch (PDOException $e){
    echo $e->getMessage();
}


?>