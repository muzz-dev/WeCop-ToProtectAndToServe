<?php
include '../admin/connection.php';

$pid=$_POST["pid"];

// $result=mysqli_query($conn,"select f.*,s.subcat_name from tbl_fir as f left join tbl_subcategory as s on f.subcat_id=s.subcat_id ORDER BY fir_id");
$result=mysqli_query($conn,"select * from tbl_home where policestation_id in (select policestation_id  from tbl_policestation_subuser where p_userid='".$pid."') and isapprove='Y'");
$response=array();
$count=0;
while($row=mysqli_fetch_assoc($result))
{
	$response[$count]["id"]=$row["home_id"];
	$response[$count]["address"]=$row["homeaddressline1"];
	$response[$count]["lat"]=$row["homelatitude"];
	$response[$count]["long"]=$row["homelongtitude"];
	$count++;
}
echo json_encode($response);
?>