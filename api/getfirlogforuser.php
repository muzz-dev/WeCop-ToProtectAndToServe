<?php

include '../admin/connection.php';
$result=mysqli_query($conn,"select * from fir_log where fir_id='".$_POST["fir_id"]."'");

$response=array();
while($row=mysqli_fetch_assoc($result))
{
	$response[]=$row;
}
echo json_encode($response);
?>