<?php
include 'connection.php';
$result=mysqli_query($conn,"select * from tbl_state where state_name='".$_POST["statename"]."'");
if(mysqli_num_rows($result)<=0)
{
	echo "no";
}
else
{
	echo "yes";
}
?>