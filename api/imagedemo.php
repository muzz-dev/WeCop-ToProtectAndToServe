<?php

include '../admin/connection.php';

$data=$_POST["data"];
$newname = time().rand(1111,9999).time().".jpg";

$image = base64_decode($data);

$final = '../police/uploads/home/'.$newname;
file_put_contents($final, $image);

$result=mysqli_query($conn,"insert into tbl_demo (image) values ('".$newname."')");


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