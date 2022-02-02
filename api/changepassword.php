<?php

include '../admin/connection.php';

$result=mysqli_query($conn,"update tbl_user set password='".$_POST["password"]."' where userid='".$_POST["userid"]."'");

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