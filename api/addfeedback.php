<?php
include '../admin/connection.php';

// $userid=$_POST["userid"];
$name=$_POST["name"];
$email=$_POST["email"];
$feedback=$_POST["feedback"];

$result=mysqli_query($conn,"insert into tbl_feedback(fname,femail,feedback_text) values('".$name."','".$email."','".$feedback."')");

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