<?php
include 'connection.php';
$result=mysqli_query($conn,"select * from tbl_city where city_code='".$_POST["citycode"]."'");
if(mysqli_num_rows($result)<=0)
{
	echo "no";
}
else
{
	echo "yes";
}
?>