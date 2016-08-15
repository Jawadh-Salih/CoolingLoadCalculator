<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coolingload";

//$wall varibles
$wall_area = (double)0; //Will be the 'a' parameter
$wall_u_value = (double)0;
$wall_resulst = (double)0;

$wall_id;
$wall_length = (double)0;
$wall_height = (double)0;
$wall_thickness = (double)0;
$wall_type;
$wall_direction;
$wall_int_tem = (double)0;
$wall_ext_tem = (double)0;
$wall_k_val = (double)0;

//$window and $door
$window_area = (double)0;
$door_area = (double)0;

//$constants
$h0 = (double)1;
$h1 = (double)1;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//To find out how many number of wall details are entered
$sql = "SELECT * FROM wall";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //////////////
        //Assign values to all the $wall varibles defined
        ////////////////////
        
        //Window area calculation
        $sql_window = "SELECT length, width  FROM window WHERE wall_id = :wall-id";
        $sql_window->bindParam(':wall-id', $wall_id);
        $result_window = $conn->query($sql);
        //$result_window will have multiple rows so take row by row and calculate the respective window areas       
        $window_area = (double)$window_area + $row["length"]*$row["width"]; 
        
        //Door area calculation
        $sql_door = "SELECT length, width  FROM door WHERE wall_id = :wall-id";
        $sql_door->bindParam(':wall-id', $wall_id);
        $result_door = $conn->query($sql);
        //$result_door will have multiple rows so take row by row and calculate the respective door areas       
        $door_area = (double)$door_area + $row["length"]*$row["width"]; 
        
        //Calculating the effective wall area
        $wall_area = $wall_area - ($window_area + $door_area);  
        
        //Calculating the effective wall u value
        $wall_u_value = (1/$h0) + ($wall_thickness/$wall_k_val) + (1/$h1);
        
        if($wall_type == "Sunlit-YES"){
            //Obtain the CLTB values using a loop and do the calculation for each time value
        }
        
        else{
            $wall_resulst = $wall_area * $wall_u_value * ($wall_int_tem*$wall_ext_tem);   
        }
        
    }
} else {
    echo "0 results";
}
$conn->close();
?>