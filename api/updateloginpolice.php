<?php

include '../admin/connection.php';

$id=$_POST["id"];

$result=mysqli_query($conn,"update tbl_policestation_subuser set isverify='Y' where p_userid='".$id."'");


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