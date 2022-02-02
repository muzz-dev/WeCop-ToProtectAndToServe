<?php

include '../admin/connection.php';
$result=mysqli_query($conn,"select f.*,p.policestation_name from tbl_fir as f left join tbl_policestation as p on f.policestation_id=p.policestation_id where user_id='".$_POST["userid"]."'");

$response=array();
while($row=mysqli_fetch_assoc($result))
{
	$response[]=$row;
}

echo json_encode($response);
?>