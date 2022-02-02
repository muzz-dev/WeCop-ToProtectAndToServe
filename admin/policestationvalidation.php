<?php
include 'connection.php';
$result=mysqli_query($conn,"select * from tbl_policestation where policestation_name='".$_POST["policestationname"]."'");
if(mysqli_num_rows($result)<=0)
{
	echo "no";
}
else
{
	echo "yes";
}
?>