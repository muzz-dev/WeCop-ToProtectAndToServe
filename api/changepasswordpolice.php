<?php

include '../admin/connection.php';

$result=mysqli_query($conn,"update tbl_policestation_subuser set password='".$_POST["password"]."' where p_userid='".$_POST["userid"]."'");

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