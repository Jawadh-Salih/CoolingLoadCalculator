<?php

require_once '../config/DB.php';
try{

    $window_id = $_POST['win_id'];
    $wall_id= $_POST['wall_id'];
    $length = $_POST['width'];
    $height = $_POST['height'];
    $thickness = $_POST['thickness'];
  $window_int_temp  = $_POST['int_temp'];
  $window_ext_temp = $_POST['ext_temp'];
    $k_value = $_POST['k_val'];

    $stmt = $DB->prepare("INSERT INTO tbl_window
                      (window_id,height,width,thickness,k_val,wall_id,int_temp,ext_temp) VALUES
                      (:window_id,:height,:length,:thickness,:k_val,:wall_id,:int_temp,:ext_temp)");
    $stmt->bindParam(":window_id",$window_id);
    $stmt->bindParam(":height",$height);
    $stmt->bindParam(":length",$length);
    $stmt->bindParam(":thickness",$thickness);
  $stmt->bindParam(":int_temp",$window_int_temp);
  $stmt->bindParam(":ext_temp",$window_ext_temp);
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