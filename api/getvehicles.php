<?php
include '../admin/connection.php';

$result=mysqli_query($conn,"select v.*,p.policestation_name from tbl_vehicles as v left join tbl_policestation as p on v.policestation_id=p.policestation_id");
$response=array();
while($row=mysqli_fetch_assoc($result))
{
	$response[]=$row;
}
echo json_encode($response);
?>