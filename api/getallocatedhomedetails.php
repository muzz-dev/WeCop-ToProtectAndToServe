<?php

include '../admin/connection.php';
$result=mysqli_query($conn,"select * from tbl_home as h left join tbl_user as u on h.userid=u.userid where home_id='".$_POST["home_id"]."'");

$response=array();
while($row=mysqli_fetch_assoc($result))
{
	$response[]=$row;
}
echo json_encode($response);
?>