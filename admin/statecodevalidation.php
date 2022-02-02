<?php
include 'connection.php';
$result=mysqli_query($conn,"select * from tbl_state where state_code='".$_POST["statecode"]."'");
if(mysqli_num_rows($result)<=0)
{
	echo "no";
}
else
{
	echo "yes";
}
?>