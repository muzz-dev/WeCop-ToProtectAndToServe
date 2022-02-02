<?php

include '../admin/connection.php';

$id=$_POST["id"];

$result=mysqli_query($conn,"update tbl_user set isverify='Y' where userid='".$id."'");


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