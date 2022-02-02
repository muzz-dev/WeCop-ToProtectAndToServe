<?php

include '../admin/connection.php';

$policestationid="";
$userid=$_POST["userid"];
$remark=$_POST["remark"];
$lat=$_POST["lat"];
$long=$_POST["long"];
$address=$_POST["address"];
$landmark=$_POST["landmark"];
$pincode=$_POST["pincode"];
$startdate = date('Y-m-d',strtotime($_POST["startdate"]));
$enddate = date('Y-m-d',strtotime($_POST["enddate"]));
$data=$_POST["image"];

$newname = time().rand(1111,9999).time().".jpg";
$image = base64_decode($data);

$final = '../police/uploads/home/'.$newname;
file_put_contents($final, $image);


$result1=mysqli_query($conn,"select policestation_id,
	111.111*
      DEGREES(ACOS(LEAST(1.0, COS(RADIANS(p.`latitude`))
   	* COS(RADIANS(".$_POST["lat"]."))
   	* COS(RADIANS(p.`longitude` - ".$_POST["long"]."))
  	+ SIN(RADIANS(p.`latitude`))
   	* SIN(RADIANS(".$_POST["lat"]."))))) AS distance_in_km
	  FROM tbl_policestation as p HAVING distance_in_km <= 30.0 ORDER BY distance_in_km ASC"
	);
while($rs=mysqli_fetch_assoc($result1))
{
	$policestationid=$rs["policestation_id"];
}

$result=mysqli_query($conn,"insert into tbl_home(policestation_id,userid,remark,start_date,end_date,homelatitude,homelongtitude,homeaddressline1,homelandmark,homepincode,homephotourl) values('".$policestationid."','".$userid."','".$remark."','".$startdate."','".$enddate."','".$lat."','".$long."','".$address."','".$landmark."','".$pincode."','".$newname."')")or die(mysqli_error($conn));

$response=array();

if($result)
{
	$response["status"]="yes";
}
else
{
	$response["status"]="no";
}
echo json_encode($response);
?>