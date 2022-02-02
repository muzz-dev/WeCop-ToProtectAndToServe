<?php
include '../admin/connection.php';

$result=mysqli_query($conn,"select v.*,p.policestation_name,p.contactnumber from tbl_vehicles as v left join tbl_policestation as p on v.policestation_id=p.policestation_id where vid='".$_POST["id"]."'");
$response=array();
while($row=mysqli_fetch_assoc($result))
{
	$response[]=$row;
}
echo json_encode($response);
?>