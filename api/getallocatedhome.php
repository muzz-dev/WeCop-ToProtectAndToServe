<?php

include '../admin/connection.php';
$result=mysqli_query($conn,"select * from tbl_home as h left join tbl_policestation_subuser as s on h.policestation_id=s.policestation_id where p_userid='".$_POST["pid"]."' AND isapprove='Y' ORDER BY end_date");

$response=array();
while($row=mysqli_fetch_assoc($result))
{
	$response[]=$row;
}
echo json_encode($response);
?>