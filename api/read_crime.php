<?php
include '../admin/connection.php';

$result=mysqli_query($conn,"select f.*,s.subcat_name from tbl_fir as f left join tbl_subcategory as s on f.subcat_id=s.subcat_id ORDER BY fir_id");
$response=array();
$count=0;
while($row=mysqli_fetch_assoc($result))
{
	$response[$count]["id"]=$row["fir_id"];
	$response[$count]["catname"]=$row["subcat_name"];
	$response[$count]["lat"]=$row["latitude"];
	$response[$count]["long"]=$row["longtitude"];
	$count++;
}
echo json_encode($response);
?>