<?php

require_once '../config/DB.php';
try{

    $wall_id = $_POST['wall_id'];
    $wall_type = $_POST['wall_type'];
    $window_count = $_POST['num_of_windows'];
    $door_count = $_POST['num_of_doors'];
    $direction = $_POST['direction'];
    $length = $_POST['length'];
    $height = $_POST['height'];
    $thickness = $_POST['thickness'];
    $int_temp  = $_POST['int_temp'];
    $ext_temp = $_POST['ext_temp'];
    $k_value = $_POST['k_val'];

    $stmt = $DB->prepare("INSERT INTO tbl_wall
                      (wall_id,is_sunlit,window_count,door_count,direction,thickness,length,height,int_temp,ext_temp,k_val) VALUES
                      (:wall_id,:is_sunlit,:window_count,:door_count,:direction,:thickness,:length,:height,:int_temp,:ext_temp,:k_val)");
    $stmt->bindParam(":wall_id",$wall_id);
    $stmt->bindParam(":is_sunlit",$wall_type);
    $stmt->bindParam(":window_count",$window_count);
    $stmt->bindParam(":door_count",$door_count);
    $stmt->bindParam(":direction",$direction);
    $stmt->bindParam(":thickness",$thickness);
    $stmt->bindParam(":length",$length);
    $stmt->bindParam(":height",$height);
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