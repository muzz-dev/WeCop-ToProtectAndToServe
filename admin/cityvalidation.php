<?php
include 'connection.php';
$result=mysqli_query($conn,"select * from tbl_city where city_name='".$_POST["cityname"]."'");
if(mysqli_num_rows($result)<=0)
{
	echo "no";
}
else
{
	echo "yes";
}
?>