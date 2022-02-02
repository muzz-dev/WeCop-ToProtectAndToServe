<?php
include 'connection.php';
$result=mysqli_query($conn,"select * from tbl_zone where zone_code='".$_POST["zonecode"]."'");
if(mysqli_num_rows($result)<=0)
{
	echo "no";
}
else
{
	echo "yes";
}
?>