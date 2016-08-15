<?php
/**
 * Created by PhpStorm.
 * User: Jawadh Salih
 * Date: 2016-08-16
 * Time: AM 1.54
 */


    require_once '../config/DB.php';
    //var_dump($_POST['btn-roof']);
try{

    $roof_id = $_POST['roof_id'];
    $roof_type= $_POST['roof_type'];
    $height = $_POST['height'];
    $length = $_POST['length'];
    $thickness = $_POST['thickness'];
    //  $door_frame_val = $_POST['frame_val'];
    //  $int_temp  = $_POST['int_temp'];
    //  $ext_temp = $_POST['ext_temp'];
    //  $door_k_value = $_POST['k_val'];

    $stmt = $DB->prepare("INSERT INTO tbl_roof
                          (roof_id,roof_type,height,width,thickness) VALUES
                          (:roof_id,:roof_type,:height,:length,:thickness)");
    $stmt->bindParam(":roof_id",$roof_id);
    $stmt->bindParam(":roof_type",$roof_type);
    $stmt->bindParam(":thickness",$thickness);
    $stmt->bindParam(":length",$length);
    $stmt->bindParam(":height",$height);
    //  $stmt->bindParam(":int_temp",$int_temp);
    //  $stmt->bindParam(":ext_temp",$ext_temp);
    //  $stmt->bindParam(":k_val",$k_value);

    $stmt->execute();

    $url = "../index.html";
    header("Location: $url");
    echo "sdsdsad";

}catch (PDOException $e) {

    echo $e->getMessage();
}


?>