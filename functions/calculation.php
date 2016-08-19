<?php

require_once '../config/DB.php';

$sensible_load = array(0,0,0,0,0,0,0,0,0,0);
$latent_load = (double)0;

$final_sensible_load = (double)0;
$final_latent_load = (double)0;

$final_result = (double)0;

//$wall varibles

$wall_area = (double)0; //Will be the 'a' parameter
$wall_u_value = (double)0;

$wall_id;
$wall_width = (double)0;
$wall_height = (double)0;
$wall_thickness = (double)0;
$wall_type;
$wall_direction;
$wall_int_tem = (double)0;
$wall_ext_tem = (double)0;
$wall_k_val = (double)0;

//$window variables
$window_area = (double)0;
$window_u_value = (double)0;

$window_id;
$win_wall_id;
$window_width = (double)0;
$window_height = (double)0;
$window_thickness = (double)0;
$window_int_tem = (double)0;
$window_ext_tem = (double)0;
$window_k_val = (double)0;

//$door variables
$door_area = (double)0;
$door_u_value = (double)0;

$door_id;
$door_wall_id;
$door_width = (double)0;
$door_height = (double)0;
$door_thickness = (double)0;
$door_int_tem = (double)0;
$door_ext_tem = (double)0;
$door_k_val = (double)0;


//$floor variables
$floor_area = (double)0;
$floor_u_value = (double)0;

$floor_id;
$floor_width = (double)0;
$floor_height = (double)0;
$floor_thickness = (double)0;
$floor_int_tem = (double)0;
$floor_ext_tem = (double)0;
$floor_k_val = (double)0;

//$roof variables
$roof_area = (double)0;
$roof_u_value = (double)0;

$roof_id;
$roof_type;
$roof_width = (double)0;
$roof_height = (double)0;
$roof_thickness = (double)0;
$roof_k_val = (double)0;

//$ventilation values
$ven_sensible = (double)0;
$ven_latent = (double)0;

$ven_volume_floor_rate = (double)0;
$ven_int_temp = (double)0;
$ven_ext_temp = (double)0;
$ven_inside_mois = (double)0;
$ven_outside_mois = (double)0;

//$occupance values
$occupance_sensible = (double)0;
$occupance_latent = (double)0;

$num_of_occupance = (double)0;

//$Lighting values
$lit_sensible = (double)0;

$lit_votage = (double)0;
$lit_BF = (double)0;
$lit_UF = (double)0;

//Equipment values
$eq_sensible = (double)0;

$eq_votage = (double)0;
$eq_UF = (double)0;

//$constants
$h0 = (double)15;
$h1 = (double)10;
$bpf = (double)1;
$ro = (double)1.225;
$cp = (double)1.005;
$hpg = (double)1;
$shgpp = (double)75;
$lhgpp = (double)45;
$CLF = 1;
$convesion = 3.156;
$con = 0.55556;

//CLTB Values change this value and array elements
$num_cltb = 10;


// Check connection

//Sensible load calculation - wall - start
//To find out how many number of wall details are entered
$sql = "SELECT * FROM tbl_wall";
$result = $DB->prepare($sql);

$result->execute();
$result = $result->fetchAll(PDO::FETCH_ASSOC);
$i=0;
while($i<sizeof($result)){

    $wall_id = $result[$i]['wall_id'];
    $wall_height = $result[$i]['height'];
    $wall_width = $result[$i]['width'];
    $wall_int_tem = $result[$i]['int_temp'];
    $wall_ext_tem = $result[$i]['ext_temp'];
    $wall_type = $result[$i]['is_sunlit'];
    $wall_thickness = $result[$i]['thickness'];
    $wall_direction = $result[$i]['direction'];
    $wall_k_val = $result[$i]['k_val'];
//    print($wall_id);

    //calculate the wall area.
    $wall_area = $wall_height*$wall_width;

    $sql_window = "SELECT height, width  FROM tbl_window WHERE wall_id = :wall_id";

    $stmt = $DB->prepare($sql_window);
    $stmt->bindParam(':wall_id', $wall_id);
    $stmt->execute();

    $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $stmt;
    $j=0;
    while($j < sizeof($result)) {
        $window_width = $result[$j]['width'];
        $window_height = $result[$j]['height'];
        $window_area += $window_height*$window_width;

        $j++;
    }
    $sql_door= "SELECT height, width  FROM tbl_door WHERE wall_id = :wall_id";

    $stmt = $DB->prepare($sql_door);
    $stmt->bindParam(':wall_id', $wall_id);
    $stmt->execute();
    $result = $stmt;
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    $j=0;
    while($j < sizeof($result)) {
        $door_width = $result[$j]['width'];
        $door_height = $result[$j]['height'];
        $door_area += $door_height*$door_width;

        $j++;
    }
    $wall_area -= ($door_area+$window_area);
    $wall_u_value = (1/$h0) + ($wall_thickness/$wall_k_val) + (1/$h1);
    $wall_u_value = 1/$wall_u_value;

    if($wall_type == "Sunlit-YES"){
        //Obtain the CLTD values using a loop and do the calculation for each time value
        $sql_cltb_wall= "SELECT * FROM tbl_cltd_wall WHERE Direction = :wall_direction";
        $stmt = $DB->prepare($sql_cltb_wall);
        $stmt->bindParam(':wall_direction', $wall_direction);
        $stmt->execute();

        //Obtain all the values with respect to the passed direction and insert in the $sensible_load array
        $result = $stmt->fetch(PDO::FETCH);
        $j=1;
        while ($j<sizeof($result)){
            $sensible_load[$j] += ($wall_u_value * $wall_area * $result[$j] * $con);
            $j++;
        }

    }

    else{

        for($x = 0; $x < $num_cltb; $x++) {
           $sensible_load[$x] += ($wall_u_value * $wall_area * abs(($wall_ext_tem-$wall_int_tem)));
        }
    }

    $i++;
}


//Sensible load calculation - wall - done

//Sensible load calculation - window - start

$sql = "SELECT * FROM tbl_window";
$result = $DB->prepare($sql);

$result->execute();
$result = $result->fetchAll(PDO::FETCH_ASSOC);

print_r(sizeof($result));
$var = sizeof($result);
for($ii=0; $ii < $var ;$ii++){
//Foreign key eka tiyana nisa $win_wall_id mehema ganna puluwanda kiyala chk karapan machan
        
        echo $ii;
    $window_id = $result[$ii]['window_id'];
    $win_wall_id = $result[$ii]['wall_id'];
    $window_height = $result[$ii]['height'];
    $window_width = $result[$ii]['width'];
    $window_int_tem = $result[$ii]['int_temp'];
    $window_ext_tem = $result[$ii]['ext_temp'];
    $window_thickness = $result[$ii]['thickness'];
    $window_k_val = $result[$ii]['k_val'];
//    print($window_id);

    $window_area = $window_height * $window_width;

    $window_u_value = (1/$h0) + ($window_thickness/$window_k_val) + (1/$h1);
    $window_u_value = 1/$window_u_value;
    

    //Temperature difference calculation for sensible load window
    for($x = 0; $x < $num_cltb; $x++) {
           $sensible_load[$x] += ($window_u_value * $window_area * abs(($window_ext_tem-$window_int_tem)));
        }

    //CLTB calc for sensible load window calculation
        //Need to get the direction of the window - for that look in which wall is this and obtained its direction
        $sql_win_dir= "SELECT Direction FROM tbl_wall WHERE wall_id = :wall_id";
        $stmt = $DB->prepare($sql_win_dir);
        $stmt->bindParam(':wall_id', $win_wall_id);
        $stmt->execute();

        // provide the wall direction from the result of this stmt->execute() to the below querry
        // salih add

        $dir = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($dir);
        $wall_direction = $dir['Direction'];


        $sql_cltb_wall= "SELECT * FROM tbl_shgf_window WHERE Direction = :wall_direction";
        $shgf = $DB->prepare($sql_cltb_wall);
        $shgf->bindParam(':wall_direction', $wall_direction);
        $shgf->execute();


        //Using the result of this loop through the CLTB values and add the results to the $sensible_load array
        //salih add
        $result = $shgf->fetch(PDO::FETCH_ASSOC);
        $time = array();
        $time1 = $result['0900'];
        $time2 = $result['1000'];
        $time3 = $result['1100'];
        $time4 = $result['1200'];
        $time5 = $result['1300'];
        $time6 = $result['1400'];
        $time7 = $result['1500'];
        $time8 = $result['1600'];
        $time9 = $result['1700'];
        $time10 = $result['1800'];

        $time = array($time1,$time2,$time3,$time4,$time5,$time6,$time7,$time8,$time9,$time10);
        $size_time = sizeof($time);
        for ($j=0;$j< $size_time;$j++){
            $sensible_load[$j] += ($window_u_value * $window_area * $convesion*$time[$j]);
        }

        //Do this again and again for all the windows of the table

}
//Sensible load calculation - window - done


//Sensible load calculation - door - start

$sql = "SELECT * FROM tbl_door";
$result = $DB->prepare($sql);

$result->execute();
$result = $result->fetchAll(PDO::FETCH_ASSOC);
$i=0;
while($i<sizeof($result)){
//Foreign key eka tiyana nisa $win_wall_id mehema ganna puluwanda kiyala chk karapan machan 
    $door_id = $result[$i]['door_id'];
    $door_wall_id = $result[$i]['wall_id'];
    $door_height = $result[$i]['height'];
    $door_width = $result[$i]['width'];
    $door_int_tem = $result[$i]['int_temp'];
    $door_ext_tem = $result[$i]['ext_temp'];
    $door_thickness = $result[$i]['thickness'];
    $door_k_val = $result[$i]['k_val'];
//    print($door_id);
    
    $door_area = $door_height * $door_width;
    $door_u_value = (1/$h0) + ($door_thickness/$door_k_val) + (1/$h1);
    $door_u_value = 1/$door_u_value;
    
    //Temperature difference calculation for sensible load door
    for($x = 0; $x < $num_cltb; $x++) {
           $sensible_load[$x] += ($door_u_value * $door_area * abs(($door_ext_tem-$door_int_tem)));
        }

    $i++;
}

//Sensible load calculation - door - done

//Sensible load calculation - floor - start

$sql = "SELECT * FROM tbl_floor";
$result = $DB->prepare($sql);

$result->execute();
$result = $result->fetchAll(PDO::FETCH_ASSOC);
$i=0;
while($i<sizeof($result)){
//Foreign key eka tiyana nisa $win_wall_id mehema ganna puluwanda kiyala chk karapan machan 
    $floor_id = $result[$i]['floor_id'];
    $floor_height = $result[$i]['height'];
    $floor_width = $result[$i]['width'];
    $floor_int_tem = $result[$i]['int_temp'];
    $floor_ext_tem = $result[$i]['ext_temp'];
    $floor_thickness = $result[$i]['thickness'];
    $floor_k_val = $result[$i]['k_val'];
//    print($floor_id);


    $floor_area = $floor_height * $floor_width;
    $floor_u_value = (1/$h0) + ($floor_thickness/$floor_k_val) + (1/$h1);


    $floor_u_value = 1/$floor_u_value;
    
    //Temperature difference calculation for sensible load door
    for($x = 0; $x < $num_cltb; $x++) {
           $sensible_load[$x] += ($floor_u_value * $floor_area * abs(($floor_ext_tem-$floor_int_tem)));
        }

    $i++;
}

//Sensible load calculation - floor - done

//Sensible load calculation - roof - start

$sql = "SELECT * FROM tbl_roof";
$result = $DB->prepare($sql);

$result->execute();
$result = $result->fetchAll(PDO::FETCH_ASSOC);

$i=0;

$var = sizeof($result);
while($i<$var){

//Foreign key eka tiyana nisa $win_wall_id mehema ganna puluwanda kiyala chk karapan machan 
    $roof_id = $result[$i]['roof_id'];
    $roof_type = $result[$i]['roof_type'];
    $roof_height = $result[$i]['height'];
    $roof_width = $result[$i]['width'];
    $roof_thickness = $result[$i]['thickness'];
    $roof_k_val = $result[$i]['k_val'];
    echo  $roof_thickness/$roof_k_val."roof k avla \n";


//    print($roof_id);
    
    $roof_area = $roof_height * $roof_width;
    $roof_u_value = (1/$h0) + ($roof_thickness/($roof_k_val+1)) + (1/$h1);

//    echo  $roof_k_val;
    $roof_u_value = 1/$roof_u_value;

    //Obtained the cltb-roof values based on the type and iterate through that
    $sql_cltb_roof= "SELECT * FROM tbl_cltd_roof WHERE type = :roof_type";

       $stmt = $DB->prepare($sql_cltb_roof);

       $stmt->bindParam(':roof_type', $roof_type);

    $stmt->execute();

    //Obtain the array from the above query result and calc the value for each time and sum up with $sensible_load
        //salih ad
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $time = array();
        $time1 = $result['0900'];
        $time2 = $result['1000'];
        $time3 = $result['1100'];
        $time4 = $result['1200'];
        $time5 = $result['1300'];
        $time6 = $result['1400'];
        $time7 = $result['1500'];
        $time8 = $result['1600'];
        $time9 = $result['1700'];
        $time10 = $result['1800'];

        $time = array($time1,$time2,$time3,$time4,$time5,$time6,$time7,$time8,$time9,$time10);
        $size_time = sizeof($time);
        $j=0;
        while ($j<$size_time){
            $sensible_load[$j] += ($roof_u_value * $roof_area * $size_time[$j] * $con);
            $j++;

        }
    $i++;

}

//Sensible load calculation - roof - done

//Sensible load and Latent Load calculation - ventilation - start

$sql = "SELECT * FROM tbl_ventilation LIMIT 1";
$result = $DB->prepare($sql);

//Assign each into variables
$ven_volume_floor_rate = (double)0;
$ven_int_temp = (double)0;
$ven_ext_temp = (double)0;
$ven_inside_mois = (double)0;
$ven_outside_mois = (double)0;

$result->execute();

$result = $result->fetchAll(PDO::FETCH_ASSOC);
$i=0;
$var = sizeof($result);
while ($i<$var){
    $ven_volume_floor_rate = $result[$i]['volume_flowrate'];
    $ven_int_temp = $result[$i]['int_temp'];
    $ven_ext_temp = $result[$i]['ext_temp'];
    $ven_inside_mois = $result[$i]['inside_mois'];
    $ven_outside_mois = $result[$i]['outside_mois'];
    $i++;
}

$ven_sensible = $ven_volume_floor_rate * abs($ven_ext_temp-$ven_int_temp) * abs(1-$bpf) * $ro * $cp; 
$ven_latent = $ven_volume_floor_rate * abs($ven_outside_mois-$ven_inside_mois) * abs(1-$bpf) * $ro * $hpg;

for($x = 0; $x < $num_cltb; $x++) {
           $sensible_load[$x] += $ven_sensible;
}
        
$latent_load += $ven_latent;

//$result->execute();

//Sensible load and Latent Load calculation - ventilation - done

//Sensible load and Latent Load calculation - occupance - start

$sql = "SELECT * FROM tbl_occupance";
$result = $DB->prepare($sql);
//Assign values from DB
$result->execute();

$result = $result->fetchAll(PDO::FETCH_ASSOC);
$i=0;
while ($i<sizeof($result)){
    $num_of_occupance = $result[$i]['occupance_count'];
    $i++;
}
$occupance_sensible = $num_of_occupance * $shgpp * $CLF;
$occupance_latent = $num_of_occupance * $lhgpp;

for($x = 0; $x < $num_cltb; $x++) {
           $sensible_load[$x] += $occupance_sensible;
}

$latent_load += $occupance_latent;


//Sensible load and Latent Load calculation - occupance - done

//Sensible load and Latent Load calculation - Lighting - start

$sql = "SELECT * FROM tbl_lighting LIMIT 1";
$result = $DB->prepare($sql);
//Assign values from DB
$result = $result->fetchAll(PDO::FETCH_ASSOC);
$i=0;
while ($i<sizeof($result)){
    $lit_votage = $result[$i]['votage'];
    $lit_BF = $result[$i]['bf'];
    $lit_UF = $result[$i]['uf'];
    $i++;
}
$lit_sensible = $lit_votage * $lit_BF * $lit_UF * $CLF;

for($x = 0; $x < $num_cltb; $x++) {
           $sensible_load[$x] += $lit_sensible;
}

//Sensible load and Latent Load calculation - Lighting - done

//Sensible load and Latent Load calculation - equipment - start

$sql = "SELECT * FROM tbl_equipment LIMIT 1";
$result = $DB->prepare($sql);
//Assign values from DB
$result = $result->fetchAll(PDO::FETCH_ASSOC);
$i=0;
while ($i<sizeof($result)){
    $eq_votage = $result[$i]['votage'];
    $eq_UF = $result[$i]['uf'];
    $i++;
}
$eq_sensible = $eq_votage * $eq_UF * $CLF;

for($x = 0; $x < $num_cltb; $x++) {
           $sensible_load[$x] += $eq_sensible;
}

//Sensible load and Latent Load calculation - equipment - done

//Final Values - results
$final_sensible_load = max($sensible_load); //Asign the maximunm of $sensible_load array
$final_latent_load = $latent_load;

$final_result = $final_sensible_load + $final_latent_load;

//print($final_latent_load);
//Render these three to result.php
//Need to transfer variables to result.php
echo  $final_result;

//print_r($sensible_load);

$url = "../results.php?out1=".$final_sensible_load."&out2=".$final_latent_load."&out3=".$final_result;

header("Location: $url");
