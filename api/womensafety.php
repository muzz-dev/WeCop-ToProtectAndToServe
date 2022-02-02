<?php
include '../admin/connection.php';
$result=mysqli_query($conn,"select policestation_id,contactnumber,
	111.111*
      DEGREES(ACOS(LEAST(1.0, COS(RADIANS(p.`latitude`))
   	* COS(RADIANS(".$_POST["lat"]."))
   	* COS(RADIANS(p.`longitude` - ".$_POST["long"]."))
  	+ SIN(RADIANS(p.`latitude`))
   	* SIN(RADIANS(".$_POST["lat"]."))))) AS distance_in_km
	  FROM tbl_policestation as p HAVING distance_in_km <= 30.0 ORDER BY distance_in_km ASC LIMIT 1"
	);
$response=array();
while($row = mysqli_fetch_assoc($result))
{
   $response["contactnumber"] = $row["contactnumber"];
}

echo json_encode($response);
?>